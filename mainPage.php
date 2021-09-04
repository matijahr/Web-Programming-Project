<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
    <title>Library.</title>
</head>

<body>
    <!--Navbar-->
    <div class="navbar">
        <div class="container flex text-main">
            <h1 class="logo">Library.</h1>
            <nav>
                <ul>
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
               <h1 class="xl text-light">Library</h1>
               <p class="lead md text-light thick" >
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
                <a href="#">Biography</a>
            
              </label>
            </li>

            <li>
             
              <label for="">
                <a href="#">Business</a> 
            
              </label>
            </li>

            <li>
             
              <label for="">
               <a href="#">Cookbooks</a>  
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Health & Fitness</a> 
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">History</a>  
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Mystery</a>
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Inspiration</a> 
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Romance</a>
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Fiction/Fantasy</a>
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Self-Improvement</a>
            
              </label>
            </li>

            <li>
              
              <label for="">
                <a href="#">Humor</a>
            
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
              <option value="title" selected="selected">Name</option>
              <option value="author-name">Author Name</option>
            </select>
          </div>
          <div class="item">
            <label for="order-by">Order</label>
            <select name="order-by" id="sort -by">
              <option value="ASC" selected="selected">ASC</option>
              <option value="DESC">DESC</option>
            </select>
          </div>
          <button class="btn bg-primary">Apply</button>
        </form>


        <!--Books-->
        <div class="product-layout">

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


</body>
</html>