<?php

    // identify table and id
    $table;
    if($_POST['edit_type'] == "infos") $table = $POST_['info_type'];
    else $table = $POST_['page_type'];
    $id = $_POST['item_chosen'];

    // connect to database
    $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
    if(!$conn || $conn->connect_error)
    {
        die("Connection failed:" . $conn->connect_error);
    }
    echo '<script type = "text/javascript"> alert("' . $table . $id. '")</script>';

    // access table
    $query = "DELETE FROM $table WHERE ID=$id"; // DATA NEED TO BE MODIFIED (1 LEVEL UP)
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo '<script type = "text/javascript"> alert("deleted' .$id. '")</script>';
    }
    else{
        echo '<script type = "text/javascript"> alert("failed' .$id . '")</script>';
    }

    $conn -> close();

?>