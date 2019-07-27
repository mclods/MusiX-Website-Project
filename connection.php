<?php

    $server="localhost";
    $username="root";
    $password="";
    $db="ccl_project_database";

    //Create a connection
    $conn=mysqli_connect($server, $username, $password, $db);

    //Check Connection
    if(!$conn){
        die("Connection failed:".mysqli_connect_error());
    }
    
    //echo "Connected Successfully!<br><br>";

?>