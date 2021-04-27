<?php

    function loadList($table){

        echo "Choose which " . $table . " to edit: <br>";

        $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
        if(!$conn || $conn->connect_error)
        {
            die("Connection failed:" . $conn->connect_error);
        }

        $sql = "SELECT * FROM $table"; // DATA NEED TO BE MODIFIED (1 LEVEL UP)
        $result = $conn->query($sql);

        echo "<select id = \"item_chosen\" name = \"item_chosen\" onchange=\"showLoad()\">";
        echo "<option selected disabled hidden></option>";

        $newindex;
        if($result->num_rows > 0)
        {
            while($row = $result-> fetch_row())
            {
                echo "<option value=\"" . $row[0] . "\">" . $row[1] . ", ". $row[2] . "</option>";
                $newindex = $row[0] + 1;
            }
        }
        $newnewindex = -1 * $newindex;
        echo "<option value=\"". $newnewindex ."\"> Add New Item </option>";
        echo "</select><br>";

        $conn -> close();
    }

    function loadEditor($table, $id){
        $conn = mysqli_connect("localhost","cs307-group23","pyjHPQCUbdkBWFT4","cs307-group23-DB");
        if(!$conn || $conn->connect_error)
        {
            die("Connection failed:" . $conn->connect_error);
        }

        $mysql_data_type_hash = array(
            1=> 'number" step="1', //'tinyint',
            2=> 'number" step="1', //'smallint',
            3=> 'number" step="1', // 'int',
            4=> 'number', // 'float',
            5=> 'number', //'double',
            7=> 'time', //'timestamp',
            8=> 'number', // 'bigint',
            9=> 'number', // 'mediumint',
            10=>'date',
            11=>'time',
            12=>'datetime-local',//'datetime',
            13=>'year',
            // 16=>'bit',
            252=>'text', //'text/blob',
            253=>'text',//'varchar',
            254=>'text', // char, enum
            246=>'number' //'decimal'
        );
        
        echo $table;
        $selected = $conn->query("SELECT * FROM $table WHERE ID=$id");
        $new = false;

        if($selected->num_rows == 0) {
            $new = true;
            $selected = $conn->query("SELECT * FROM $table WHERE ID='0'");
        }

        $row = $selected ->fetch_assoc();

        if($new) {
            echo "<form id=\"ItemInsertForm\" method = \"POST\" action = \"insertrecord.php\" ";
        }
        else {
            echo "<form id=\"ItemUpdateForm\" method = \"POST\" action = \"updaterecord.php\" ";
        }

        echo "enctype=\"multipart/form-data\">";
        echo "<input type=\"hidden\" id=\"table\" name=\"table\" value=\"". $table ."\"></input>";
        echo "<input type=\"hidden\" id=\"ID\" name=\"ID\" value =\"" . $id . "\"></input>";


        while($col = $selected -> fetch_field()){

            $input_name = $col->name;
            $default_value;

            if($new) {
                $default_value = "";
            }
            else {
                $default_value = $row[$input_name];
            }

            if($input_name != "Image" && $input_name != "Category" && $input_name != "ID"){
                $input_type = $mysql_data_type_hash[$col->type];
                echo "<div class = \"shown\">";

                echo "<label for=\"" . $input_name . "\">". $input_name . "</label><br>";
                echo "<input type=\"" . $input_type . "\" id = \"" . $input_name . "\" name=\"" . $input_name . "\" value =\"" . $default_value. "\"> </input><br>";
                
                echo "</div>";
            }
            else if($input_name == "Image"){
                // edge case (blob)
                echo "<input type=\"file\" name=\"" . $input_name . "\" id=\"" . $input_name . "\"></input>";
            }
            else if($input_name == "Category"){
                // edge case (enum)
                echo "<div class=\"shown\">";
                echo "<label for=\"" . $input_name . "\">" . $input_name . "</label><br>";
                echo "<select id =\"" . $input_name . "\" name =\"" . $input_name. "\">";

                $sql = "SHOW COLUMNS FROM $table LIKE '$input_name'";
                $value = $conn->query($sql);

                if($value) {
                    $enum = $value->fetch_row();
                    $enum = substr($enum[1], 6, -2);
                    $values = explode("','", $enum);
                    foreach($values as $value)
                        // echo $value;
                        // echo "<br>";
                        echo "<option value=\"$value\">$value</option>";
                }

                echo "</select>";
                echo "</div>";
            }
        }

        if($new){
            // have insert and discard buttons
            echo "<button id = \"INSERT\" onclick=\"return processSubmit(this)\">Add record</button>";
            echo "<input type = \"reset\"></input>";
        }
        else{
            // have update and reset buttons
            echo "<button id = \"UPDATE\" onclick=\"return processSubmit(this)\">Update record</button>";
            echo "<input type = \"reset\"></input>";
        }
        echo "</form>";

        $conn -> close();
    }

    function tableToLoad($edit, $info, $page){
        if($edit == "infos") return $info;
        else return $page;
    }

    $table = tableToLoad($_POST['edit_type'], $_POST['info_type'], $_POST['page_type']);
    if($_POST['function'] == "loadList()") loadList($table);
    else if($_POST['function'] == "loadEditor()") loadEditor($table, $_POST['item_id']);

?>