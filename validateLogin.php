<?php

    require_once 'connectPDO.php';
    session_start();

    if( $_SERVER["REQUEST_METHOD"] === "POST" ){
        // get data from POST request
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        
        // encrypt password with MD5
        $pwdmd5 = md5($password);
        
        //dohvaćanje upis korisnika iz bazu
        $sql = <<<EOSQL
        SELECT * FROM users WHERE username='{$username}' AND userpassword='{$pwdmd5}'
        EOSQL;

        $query = $conn->prepare($sql);
        $query->execute();


            if($query->rowCount() == 0){
                echo("No such user");
            }else{
                // convert from object to associative field
                $query->setFetchMode(PDO::FETCH_ASSOC);
                
                foreach($query as $row){
                    // store userdata in session for mainPage.php
                    $_SESSION["userrole"] = $row["userrole"];
                    $_SESSION["username"] = $username;
                }
                
                echo("Login successful");
                unset($conn);
            }

    }else{
        echo ("Error!");
    }
?>