<?php
    //OOP databse connection
    $DB_SERVERNAME = "db";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "test";
    $DB_DBNAME = "WebProject";

    $conn = new mysqli($DB_SERVERNAME, $DB_USERNAME, $DB_PASSWORD, $DB_DBNAME);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?>