<?php
    require_once 'connectPDO.php';
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $uid = $_POST["userid"];
        
        $sql = "DELETE FROM books WHERE ID='{$uid}'";        

        $query = $conn->prepare($sql);
        $query->execute();
        
        unset($conn);
        echo "Success!"; 
    }else{
        echo "Error!";
    }
?>