<?php
require_once 'connectPDO.php';
session_start();

$genreToFind = $_POST['findGenre'];
$_SESSION['currentGenre'] = $genreToFind;

//$sql = <<<EOSQL
//SELECT * FROM books WHERE genre= :gnr;
//EOSQL;
$sql = "SELECT * FROM books WHERE genre='{$genreToFind}'";

$query = $conn->prepare($sql);
//$query->bindParam(':gnr', $genreToFind)

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
    ";

    if($_SESSION["userrole"]==1){
        echo"
                  </div>
                    <button type='button' class='delete btn bg-primary' id='deleteBook' data-delete='" . $row['ID'] . "' > Obriši </button>
                  <div>";
    }

    echo"                 
              </div>              
            </div>";
}
unset($conn);

