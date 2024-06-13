<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .product .card{
    box-shadow: 0 0 10px rgba(255, 0, 0, 0.5); /* Red box shadow on hover */
}
    </style>
</head>
<body>
<h1>MY WISHLIST</h1>
   <div class="container">
    <div class="row">
<!-- ...................... -->
<?php
require("../connect.php");
$user_mail=$_SESSION['user_mail'];
$get_wishlist=" SELECT p.*
FROM products AS p
INNER JOIN wishlist AS w ON p.pid = w.product_id
WHERE w.usermail = '$user_mail';";
$run_wishlist=mysqli_query($conn,$get_wishlist);
while($row=mysqli_fetch_array($run_wishlist))
 {
   $pid=$row['pid'];
   $brand=$row['brand'];
   $img=$row['img1'];
   $rate=$row['stars'];
   $price=$row['price'];
   $title=$row['title'];
   ?>
    <div class="col-md-4 mt-2 product">
    <div class="card" style="width: 17rem;height:25rem;">
  <img src="admin/images/<?php echo $img;?>" class="card-img-top" alt="products" style="height:12rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo "$title";?></h5>
    <p class="card-text">RS: <?php echo "$price";?></p>
    <a href="user/remove.php?id=<?php echo $pid?>" class="btn btn-outline-danger d-inline"><i class="bi bi-heart-fill"></i>remove</a>
    <a href="details.php?id=<?php echo $pid?>" class="btn btn-outline-danger d-inline"><i class="bi bi-cart"></i>Add to cart</a>
  </div>
</div>
</div>
   <?php
 }

?>
      <!-- ........................... -->
    </div>
   </div> 
</body>
</html>