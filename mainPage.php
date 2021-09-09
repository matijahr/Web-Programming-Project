<?php
require_once 'connectPDO.php';
session_start();

if(isset($_SESSION['currentGenre'])){
  unset($_SESSION['currentGenre']);
}

$sql = <<<EOSQL
SELECT * FROM books
EOSQL;

$query = $conn->prepare($sql);

$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style_mainpage.css">
  <script src="jQuerry.min.js"></script>
  <title>eLibrary</title>
</head>

<body>
  <!--Navbar-->
  <div class="navbar">
    <div class="container flex text-main">
      <h1 class="logo">eLibrary</h1>
      <nav>
        <ul>
          <li><p>Welcome  <i><?php echo($_SESSION["username"]); ?></i> </p> </li>
          <li><a href="mainpage.php" class="fas fa-home fa-2x"></a></li>
          <li><a href="contacts.php" class="fas fa-user fa-2x"></a></li>
          <li><a href="index.php" class="fas fa-sign-out-alt fa-2x"></a></li>
        </ul>
      </nav>
    </div>
  </div>

  <!--Head-->
  <section class="page-head bg-primary py-3">
    <div class=" container grid">
      <div>
        <h1 class="xl text-light">eLibrary</h1>
        <p class="lead md text-light thick">
          Best place to find new books.
        </p>
      </div>

    </div>
  </section>


  <!-- PRODUCTS -->
  <section class="section container products">
    <!--Categories-->
    <div class="products-layout container">
      <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Categories</h3>
          </div>

          <ul class="block-content">

            <li>

              <label for="">
                <a href="#" id="genre-fantasy">Fantasy</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-mystery">Mystery</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-philosophy">Philosophy</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-classics">Classics</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-romantic">Romantic</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-comedy">Comedy</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-selfhelp">Self Help</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-biography">Biography</a>

              </label>
            </li>

          
          </ul>
        </div>
      </div>


      <!--Sorting-->
      <div class="col-3-of-4">
        <form action="">
          <div class="item">
            <label for="sort-by">Sort By</label>
            <select name="sort-by" id="sort-by">
              <option value="Name" selected="selected">Name</option>
              <option value="Author Name">Author Name</option>
            </select>
          </div>
          <div class="item">
            <label for="order-by">Order</label>
            <select name="order-by" id="sort-by1">
              <option value="ASC" selected="selected">ASC</option>
              <option value="DESC">DESC</option>
            </select>
          </div>
          <button class="btn bg-primary applySortBtn">Apply</button>
        </form>


        <!--Books-->
        <div class="product-layout prikaz-knjiga">
          <!--
          <div class="product">
            <div class="img-container">
              <img src="./images/product-1.jpg" alt="" />
            </div>
            <div class="bottom">
              <span class="text-dark md">The Hobbit</span>
              <div class="author-name">
                <p class="text-secondary sm">J.R.R.Tolkien</p>
              </div>
            </div>
          </div> 
          -->

          <?php
          
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
          ?>
          


        </div>
      </div>
    </div>
  </section>


  <!--Footer-->
  <footer class="footer bg-primary py-5">
    <div class="container grid grid-3">
      <div>
        <h1>eLibrary</h1>
        <p>Copyright &copy; 2021</p>
      </div>
      <nav>
        <ul>
          <li><a href="mainpage.php">Home</a></li>
          <li><a href="contacts.php">Contacts</a></li>

        </ul>
      </nav>

    </div>
  </footer>

<script>

  $("#genre-fantasy").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Fantasy"
    });
  });

  $("#genre-mystery").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Mystery"
    });
  });

  $("#genre-philosophy").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Philosophy"
    });
  });

  $("#genre-classics").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Classic"
    });
  });

  $(".applySortBtn").click(function(){
    event.preventDefault();
    sortingBy = $("#sort-by").val();
    orderOfSorting = $("#sort-by1").val();
    
    $(".prikaz-knjiga").load("ucitajSortirano.php", {
      sort: sortingBy,
      order: orderOfSorting
    });
  });

</script>

</body>
</html>