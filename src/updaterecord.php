<?php

    // get table type
    $table = $_POST["table"];
    $id = $_POST["ID"];

    // get column types
    $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
    if(!$conn || $conn->connect_error)
    {
        die("Connection failed:" . $conn->connect_error);
    }
    $sql = "SHOW COLUMNS FROM $table";
    $result = $conn->query($sql);

    if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){  
            $colname = $row["Field"];

            // load input value for each column and update field by field
            if($colname != "Image" && $colname != "ID"){
                if(isset($_POST[$colname])){
                    $sql = "UPDATE $table SET $colname = '$_POST[$colname]' WHERE ID=$id";
                    $query_run = $conn->query($sql);
                }
            }
            else if($colname == "Image"){
                if($_FILES[$colname]["tmp_name"]!=''){
                    $file = addslashes(file_get_contents($_FILES["$colname"]["tmp_name"]));
                    $sql = "UPDATE $table SET $colname = '$file' WHERE ID=$id";
                    $query_run = $conn->query($sql);
                }
            }
        }                     
    }
?>  