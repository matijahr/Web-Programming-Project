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

  <?php
        if($_SESSION["userrole"]==1){
          echo' <div id="newArticleForm" class="hiddenDisplay">
          <form action="" method="post" id="insertArticleDB">
              <div id="formNewArticle">
                  <p id="formHeader">ADD NEW BOOK</p>
                  <p>
                      <label for="bookName">Name of the book: </label><br>
                      <input type="text" name="bookName" id="bookName">
                  </p>
                  <p>
                      <label for="authorName">Name of the author: </label><br>
                      <input type="text" name="authorName" id="authorName">
                  </p>
                  <p>
                      <label for="bookGenre">One genre that best describes it: </label><br>
                      <input type="text" name="bookGenre" id="bookGenre">
                  </p>
                  <p>
                      <label for="bookImgURL">Image URL of the new book: </label><br>
                      <input type="text" name="bookImgURL" id="bookImgURL">
                  </p>
                  <p>
                  <input type="submit" value="ADD NEW BOOK" name="insertBook" class="submit btn bg-primary" id="btnAddedNewItem">
                </p>
              </div>
              
          </form>
        </div>';
        }
        ?>

  <!--Navbar-->
  <div class="navbar">
    <div class="container flex text-main">
      <h1 class="logo">eLibrary</h1>
      <nav>
        <ul>
          <li><p>Welcome  <i><?php echo($_SESSION["username"]); ?></i> </p> </li>
          <li><a href="mainPage.php" class="fas fa-home fa-2x"></a></li>
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
                <a href="#" id="genre-classics">Classic</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-romantic">Romance</a>

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

            <li>

              <label for="">
                <a href="#" id="genre-scifi">Science Fiction</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-dystopian">Dystopian</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-adventure">Adventure</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-horror">Horror</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-thriller">Thriller</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-historicalfiction">Historical fiction</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-youngadult">Young Adult</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-childrens">Children's fiction</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-cooking">Cooking</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-art">Art</a>

              </label>
            </li>

            <li>

              <label for="">
                <a href="#" id="genre-nonfiction">Nonfiction</a>

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
          <button id="addNewBookBtn" class="btn bg-primary <?php if($_SESSION["userrole"]==0){echo 'hiddenDisplay';}?> ">Add new book</button>
          
        </form>

        

        

        <!--Books-->
        <div id="booksShowcaseSection" class="product-layout prikaz-knjiga">
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
              echo "<div class='product' data-row='" . $row['ID'] . "'>
              <div class='img-container'>
                <img src='". $row['image_url'] ."' alt='' />
              </div>

              <div class='bottom'>
                <span class='text-dark md' id='bookName'>". $row['book_name'] ."</span>
                <div class='author-name'>
                  <p class='text-secondary sm' id='bookAuthor'>". $row['author_name'] ."</p>
                </div>
                ";
          
          ?>
                
          <?php
                
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
  let newArticleForm = document.querySelector("#newArticleForm");
  let booksShowcaseSection = document.querySelector("#booksShowcaseSection");

  let btnAddBook = document.querySelector("#addNewBookBtn");
  btnAddBook.addEventListener("click", toggleBookView);
  function toggleBookView(event){
    event.preventDefault();
    newArticleForm.classList.toggle('hiddenDisplay');
  }

  //delete a book from database
  const bookName = document.getElementById("bookName");
  const bookAuthor = document.getElementById("bookAuthor");

  $(document).on("click", ".delete", function() {
                let uid = parseInt($(this).data("delete"));

                //remove div element from html
                $(this).parent("div").remove();

                $.ajax({
                    url: "ajax_deleteBook.php",
                    type: "POST",
                    data: {
                        userid: uid
                    },
                    success: function(returnedData) {
                        if (returnedData == "Success!") {
                            alert("A book was deleted")
                        } else {
                            alert("There was an error deleting a user!")
                        }

                    },
                    async: false
                });                
            });

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
    console.log("kliknulo");
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Classic"
    });
  });

  $("#genre-romantic").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Romance"
    });
  });

  $("#genre-comedy").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Comedy"
    });
  });

  $("#genre-selfhelp").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Self Help"
    });
  });

  $("#genre-biography").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Biography"
    });
  });

  $("#genre-scifi").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Science Fiction"
    });
  });

  $("#genre-dystopian").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Dystopian"
    });
  });

  $("#genre-adventure").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Adventure"
    });
  });

  $("#genre-horror").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Horror"
    });
  });

  $("#genre-thriller").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Thriller"
    });
  });

  $("#genre-historicalfiction").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Historical Fiction"
    });
  });

  $("#genre-youngadult").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Young Adult"
    });
  });

  $("#genre-childrens").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Children's fiction"
    });
  });

  $("#genre-cooking").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Cooking"
    });
  });

  $("#genre-art").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Art"
    });
  });

  $("#genre-nonfiction").click(function(){
    $(".prikaz-knjiga").load("ucitajZanr.php", {
      findGenre: "Nonfiction"
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

  function isEmpty(str) {
            return (!str || str.length === 0 );
        }

  $(document).on("click", ".submit", function() {
            let bookName, authorName, genre, imgURL;
            console.log("radi");

            if(isEmpty($("#bookName").val()) || isEmpty($("#authorName").val()) || isEmpty($("#bookGenre").val()) || isEmpty($("#bookImgURL").val()) ){
                alert("Sva polja moraju biti popunjena!");
                return false;
            }

            if ($(this).attr("name") == "insertBook" && 
            !($("#bookName").val().includes('<')) && 
            !($("#bookName").val().includes('>')) && 
            !($("#bookName").val().includes('=')) &&
            !($("#authorName").val().includes('<')) && 
            !($("#authorName").val().includes('>')) && 
            !($("#authorName").val().includes('=')) &&
            !($("#bookGenre").val().includes('<')) && 
            !($("#bookGenre").val().includes('>')) && 
            !($("#bookGenre").val().includes('=')) &&
            !($("#bookImgURL").val().includes('<')) && 
            !($("#bookImgURL").val().includes('>')) && 
            !($("#bookImgURL").val().includes('=')) ) {

                // get values from input
                bookName = $("#bookName").val();
                authorName = $("#authorName").val();
                genre = $("#bookGenre").val();
                imgURL = $("#bookImgURL").val();
                

                $.ajax({
                    url: "insertBookInDB.php",
                    type: "POST",
                    data: {
                        bName: bookName,
                        aName: authorName,
                        bookGenre: genre,
                        bookImgURL: imgURL
                    },
                    success: function() {},
                    async: false
                });
            } else {
                alert("Ne smiju se upisivati sljedeci znakovi: '<', '>', '=' ");
                return false;
            }
            location.reload();
        });

</script>

</body>
</html>