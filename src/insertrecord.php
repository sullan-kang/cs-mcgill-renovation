<?php
    // get table type
    $table = $_POST["table"];
    $id = $_POST["ID"];
    echo $id;
    $id = 0 - (int)$id;
    echo $id;

    // get column types
    $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
    if(!$conn || $conn->connect_error)
    {
        die("Connection failed:" . $conn->connect_error);
    }
    $sql = "SHOW COLUMNS FROM $table";
    $result = $conn->query($sql);

    $insertcol = array();
    $insertval = array();
    $hasimage = false;
    $file;

    if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){  
            $colname = $row["Field"];
            // load input value for each column and update field by field
            if($colname != "Image" && $colname != "ID"){
                if(isset($_POST[$colname])){
                    array_push($insertcol, $colname);
                    array_push($insertval, "'" . $_POST[$colname] . "'");
                } else {
                    echo '<script type = "text/javascript"> alert("input is not complete")</script>';
                    break;
                } // should not process.
            }
            else if($colname == "Image"){
                $hasimage=true;
                if($_FILES[$colname]["tmp_name"]!=''){
                    // array_push($insertcol, $colname);
                    $file = addslashes(file_get_contents($_FILES["$colname"]["tmp_name"]));
                    // array_push($insertval, $file);
                    
                } else{
                    echo '<script type = "text/javascript"> alert("image is not complete")</script>';
                    break;
                } // should not process.
            }
        }    

        $sql = "INSERT INTO $table (" . join(", ", $insertcol) . ") VALUES (" . join(", ", $insertval) . ")";
        echo $sql;
        $query_run = $conn->query($sql);

        if($query_run){
            echo '<script type = "text/javascript"> alert("inserted")</script>';
        } else {
            echo $conn->error;
            echo '<script type = "text/javascript"> alert("not inserted")</script>';
        }

        if($hasimage){
            
            $sql = "UPDATE $table SET Image = '$file' WHERE ID=$id"; // need to resolve id
            echo $id;
            $query_run = $conn->query($sql);
        }
      
        if($query_run){
            echo '<script type = "text/javascript"> alert("inserted")</script>';
        } else {
            echo '<script type = "text/javascript"> alert("not inserted")</script>';
        }                 
    }

?>