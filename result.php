<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  include_once("nav.php");
?>
  <div class="result">
    <div class="container">
        <div class="row">
<?php
if(isset($_POST['search']))
{
  $userquery=$_POST['userquery'];
  require_once("connect.php");
  $qry="SELECT * 
  FROM products 
  WHERE title LIKE '%$userquery%'";
   $get_res=mysqli_query($conn,$qry);
 if(mysqli_num_rows($get_res)>0)
 {
    while($row=mysqli_fetch_array($get_res))
   {
     $pid=$row['pid'];
     $brand=$row['brand'];
     $img=$row['img1'];
     $rate=$row['stars'];
     $price=$row['price'];
     $title=$row['title'];

   ?>
   <div class="col-md-4 col-sm-12 mt-2">
        <div class="card" style="width: 17rem;">
        <img src="admin/images/<?php echo $img;?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h4 class="text-center">By <?php echo "$brand";?></h4>
        <h5 class="card-title"><?php echo "$title";?></h5>
        <p class="card-text"><?php echo "$rate";?>🌟</p>
        <p class="card-text"><?php echo "$price";?></p>
        <a href="details.php?id=<?php echo $pid?>" class="btn btn-outline-primary d-inline">datails</a>
        <a href="details.php?id=<?php echo $pid?>" class="btn btn-primary d-inline"><i class="bi bi-cart"></i>Add to cart</a>
      </div>
      </div>
      </div>
    <?php
   }
   
 }else{
    echo"<h2 class='text-center text-primary fs-5'>NO product is found</h2>";
 }
}
?>
 </div>
</div>
</div>
</body>
</html>