<?php
    //OOP databse connection
    $DB_SERVERNAME = "eu-cdbr-west-01.cleardb.com";
    $DB_USERNAME = "ba654019ac899e";
    $DB_PASSWORD = "4918bb12";
    $DB_DBNAME = "heroku_219e38f6ea4f6f0";

    $conn = new mysqli($DB_SERVERNAME, $DB_USERNAME, $DB_PASSWORD, $DB_DBNAME);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?>