<?php
    //require_once 'connect.php';
    require_once 'connectPDO.php';
    session_start();

    if( $_SERVER["REQUEST_METHOD"] === "POST" ){
        // get data from POST request
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // encrypt password with MD5
        $pwdmd5 = md5($password);
        
        //dohvaćanje upis korisnika iz bazu
        $sql = <<<EOSQL
        SELECT * FROM users WHERE username='{$username}' AND userpassword='{$pwdmd5}'
        EOSQL;

        //$result = $conn->query($sql);
        $query = $conn->prepare($sql);
        $query->execute();


            if($query->rowCount() == 0){
                echo("No such user");
            }else{
                // convert from object to associative field
                //$row = $result->fetch_assoc();
                $query->setFetchMode(PDO::FETCH_ASSOC);
                
                // store userdata in session for mainPage.php
                $_SESSION["user"] = $row["user"];
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $row["email"];

                echo("Login successful");
                unset($conn);
            }

    }else{
        echo ("Error!");
    }
?>