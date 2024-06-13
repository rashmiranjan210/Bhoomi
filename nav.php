<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style/nav.css">
</head>
<body>
  <?php
  session_start();
  ?><nav class="navbar navbar-expand-lg" style="background-color:#f5dfbb;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img id="logo" src="./logo.jpeg" alt="" height="50px" weidth="50px"></a>
      <!-- small scrin -->
      <!-- <form class="d-flex d-block d-sm-none" method="post" action="result.php" id="searchForm">
          <input class="form-control d-none d-md-block" type="text" aria-label="Search" name="userquery" id="searchInput" placeholder="Search here" required>
          <span class="input-group-btn">
              <button type="submit" name="search" class="btn btn-dark btn-sm">Search</button>
          </span>
         </form> -->
          <form class="d-flex d-block d-sm-none" method="post" action="result.php" id="searchForm">
                <input class="form-control-sm" type="text" aria-label="Search" name="userquery" placeholder="search here" required><span class="input-group-btn"><button type="submit" name="search" class="btn btn-dark btn-sm">search</button></span>
          </form>
      <a href="cart.php" class="btn cart ms-3 cartlogo bg-light d-block d-sm-none"><i class="bi bi-cart"></i>0</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 " >
              <li class="nav-item">
                <a class="nav-link" href="index.php" style="color:black;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php" style="color:black;">Shop</a>
              <li class="nav-item">
                <a class="nav-link" href="blog.php" style="color:black;">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php" style="color:black;">About Us</a>
              </li>
              <li class="nav-item" id="myprofile">
                <a class="nav-link" href="user/myaccount.php?my_order" style="color:black;">Profile</a>
              </li>
            </ul>
            
      <div> 
       </div>
            <form class="d-flex" method="post" action="result.php" id="searchForm">
          <input class="form-control d-none d-md-block" type="text" aria-label="Search" name="userquery" id="searchInput" placeholder="Search here" required>
          <span class="input-group-btn d-none d-md-block">
              <button type="submit" name="search" class="btn btn-dark">Search</button>
          </span>
         </form>
            <a href="cart.php" class="btn cart ms-3 cartlogo bg-light d-none d-md-block"><i class="bi bi-cart"></i>
            <?php
              if(isset($_SESSION['user_mail']))
              {
                $email=$_SESSION['user_mail'];
              require_once("connect.php");
              $qry="select * from cart where usermail='$email'";
              $res=mysqli_query($conn,$qry);
              $count=mysqli_num_rows($res);
               echo "$count" ;
              $_SESSION['cart_count']=$count;
              
              }else
              {
                $_SESSION['cart_count']=0;
                echo "0" ;
              }

              ?>
            </a>
          </div>
      
        </div>
      </nav>
    <script> 
    </script>
 <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>