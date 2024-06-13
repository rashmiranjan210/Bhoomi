<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost:8888/bhoomicopy/">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="user/style/login.css">
</head>
<style>
 .login{
    background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.6)),url("./imge.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
    
    z-index:-1;
    
  }
  .box{
    background-color: rgba(255, 255, 255, 0.4);
    -webkit-backdrop-filter: blur(5px);
    backdrop-filter: blur(5px); 
    width:35vw;
  }
</style>
<body>
<?php
session_start();
include_once"../function.php";
?>
      

<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#f5dfbb">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img id="logo" src="./logo.jpeg" alt="" height="50px" weidth="50px"></a>
      <!-- small scrin -->
      <!-- <form class="d-flex" method="post" action="../result.php" id="searchForm">
          <input class="form-control d-none d-md-block" type="text" aria-label="Search" name="userquery" id="searchInput" placeholder="Search here" required>
          <span class="input-group-btn d-none d-md-block">
              <button type="submit" name="search" class="btn btn-dark">Search</button>
          </span>
         </form> -->
      <a href="cart.php" class="btn cart ms-3 cartlogo bg-light d-block d-sm-none"><i class="bi bi-cart"></i>2</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link text-light active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="shop.php">Shop</a>
              <li class="nav-item">
                <a class="nav-link text-light" href="blog.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="aboutus.php">About Us</a>
              </li>
              <li class="nav-item" id="myprofile">
                <a class="nav-link text-light" href="user/myaccount.php?my_order">Profile</a>
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
                require"../connect.php";
              $email=$_SESSION['user_mail'];
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
      <?php
        if(isset($_POST['submit'])){
            require"../connect.php";
            $email=$_POST['email'];
            $password=$_POST['password'];
            $qry="SELECT * FROM user WHERE email='$email' AND password = '$password'";
            $res=$conn->query($qry);
            if($res->num_rows>0){
                $_SESSION['user_mail']=$email;
                echo "<script>window.open('user/myaccount.php?my_order', '_self');</script>";
                // header("location:myaccount.php?my_order");

            }else{
                $msg="invalid credencials, kindly check once";
                notification($msg);
            }
        }

        ?>
<!-- navbar -->
 <div class="login pt-3">
     <div class="d-flex justify-content-center align-item-center">
      <div class="box p-3">
        <form action="user/login.php" method="POST" class="form text-dark fw-bold py-2 px-4">
         <label class="form-label">Enter Your Email:</label><br>
         <input class="form-control" required type="email" name="email">
         <label class="form-label">Enter Your Password:</label><br>
         <input class="form-control" required  type="password" name="password"><br>
         <input class="btn btn-outline-dark d-block mx-auto fs-5 " style="width:150px" type="submit" value="Log_In" name="submit">
        </form>
        <p class="text-dark">Don't have an account? <a href="user/signup.php" style="text-decoration:none" class="fw-bolder text-light">Sign up</a></p>
      </div>
     </div>
    </div>
    <?php
include_once("../includes/footer.html");
?>
<script src="../bootstrap.bundle.min.js"></script>
</body>
</html>

