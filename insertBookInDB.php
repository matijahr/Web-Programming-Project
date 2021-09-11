<?php

require_once 'connectPDO.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bookName = $_POST["bName"];
    $authorName = $_POST["aName"];
    $genre = $_POST["bookGenre"];
    $imgURL = $_POST["bookImgURL"];


    $sql = "INSERT INTO books (book_name,author_name,genre,image_url) VALUES ('{$bookName}', '{$authorName}', '{$genre}', '{$imgURL}');";

    $query = $conn->prepare($sql);

    $query->execute();

    

    unset($conn);
    //$_SESSION['updateOrDeleteFinished'] = TRUE;
    header("location: mainPage.php");
} else {
    // Prevent going to this page without login
    header("location: mainPage.php");
}