<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>
<body>
    <!-- Testni ispis može se obrisati - Kosiću do you magic -->
    <?php
        echo $_SESSION["user"];
        echo $_SESSION["username"];
        echo $_SESSION["email"];
    ?>
</body>
</html>