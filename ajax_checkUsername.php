<?php
    require_once 'connect.php';
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"];

        //select all user with this username
        $sqlGetUser = "SELECT * FROM users WHERE username='{$username}'";
        $result = $conn->query($sqlGetUser);
        
        if($result->num_rows > 0){
            // username is unavailable
            echo false;
        }else{
            // username is available
            echo true;
        }

    }else{
        echo "Error!";
    }
?>