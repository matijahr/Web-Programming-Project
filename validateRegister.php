<?php
    if( $_SERVER["REQUEST_METHOD"] === "POST" ){

        require_once 'validationFunctions.php';
        require_once 'connect.php';
        
        // get data from POST request
        $user = $_POST["user"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];


        if(emptyUser($user) === true){
            //user not just spacebars
            echo("emptyUser");
        }
        elseif(checkUsername($username) === true){
            //check if username is empty and is it at least 6 characters long
            echo("wrongUsername");
        }
        elseif(checkEmail($email) !== false){
            //check if email is valid
            echo("wrongEmail");
        }elseif(checkPassword($password1,$password2) === "password1 is short"){
            //check if password1 is at least 8 characters
            echo("shortPassword");
        }elseif(checkPassword($password1,$password2) === "passwords do not match"){
            //check if password1 is at least 8 characters
            echo("matchingPassword");
        }else{
            //Add user to database
            
            //password encryption
            $pwdmd5 = md5($password1);

            // sanitize (remove HTML from string and illegal characters from email)
            $san_username = filter_var($username, FILTER_SANITIZE_STRING);
            $san_user = filter_var($user, FILTER_SANITIZE_STRING);
            $san_email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // check if there is a user with same username
            //$sqlCheckUser = "SELECT * FROM users WHERE username='{$san_username}'";

            $result = $conn->query($sqlCheckUser);

            /*if ($result->num_rows > 0) {
                echo("Username taken");
            } else {*/

                // storing to database
                $sqlInsertUser = "INSERT INTO users (username,userpassword,user,email) 
                    VALUES ('{$san_username}','{$pwdmd5}','{$san_user}','{$san_email}')";

                $conn->query($sqlInsertUser);
                $conn->insert_id;
                echo("User added");
            //}
        }
    }else{
        echo("Error");
    }

?>