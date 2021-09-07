<?php
require_once 'connectPDO.php';
session_start();

$sortiratiPo = $_POST['sort'];
$redSortiranja = $_POST['order'];

if($sortiratiPo == "Name"){
    $sortiratiPo = "book_name";
}

if($sortiratiPo == "Author Name"){
    $sortiratiPo = "author_name";
}

$genreToFind = $_SESSION['currentGenre'];

//$sql = <<<EOSQL
//SELECT * FROM books WHERE genre= :gnr;
//EOSQL;
if(isset($_SESSION['currentGenre'])){
    $sql = "SELECT * FROM books WHERE genre='{$genreToFind}' ORDER BY {$sortiratiPo} {$redSortiranja}";
} else{
    $sql = "SELECT * FROM books ORDER BY {$sortiratiPo} {$redSortiranja}";
}
//$sql = "SELECT * FROM books ORDER BY {$sortiratiPo} {$redSortiranja};";

$query = $conn->prepare($sql);

$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);

foreach($query as $row){
    echo "<div class='product'>
    <div class='img-container'>
      <img src='". $row['image_url'] ."' alt='' />
    </div>
    <div class='bottom'>
      <span class='text-dark md'>". $row['book_name'] ."</span>
      <div class='author-name'>
        <p class='text-secondary sm'>". $row['author_name'] ."</p>
      </div>
    </div>
  </div>";
}

unset($conn);