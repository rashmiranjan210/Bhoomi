<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    html {
            scroll-behavior: smooth;
        }

@media (max-width: 768px) {

  .maincontent .card{
      width:70%;
      margin:0 auto;
    }

  }
  @media (max-width: 550px) {

.maincontent .card{
    width:95%;
    margin:0 auto;
  }

}
  .maincontent .card a{
    text-decoration:none;
    }  
    .brand h3{
      color:red;
      font-weight:bolder;
      text-transform:uppercase;
      text-decoration:2px underline black;
    }
    .product .card:hover{
    box-shadow: 0 0 10px rgba(255, 0, 0, 0.5); /* Red box shadow on hover */
}
  </style>
</head>
<body>
<?php
include_once("nav.php");
?>
<!-- breadscum -->

<div class="content">
    <div class="container">
    <?php
include_once("includes/filter.html");
?>    
</div>
</div>
<!-- breadscum -->
<div class="maincontent container mt-3">
  <!-- first row starts -->
  <div class="row">
    <div class="col-md-2 ">
<?php
include("includes/sidebar.php");
?>
    </div>
    <!-- main shop -->
    <div class="col-md-9 ms-5">
     <div class="row ps-4">
    <?php
    if(isset($_GET['cat_id']))
    {
      ?>
          <div class="brand  m-2">
          <h3 class="ms-5" style="color:#354f52"><?php echo $_GET['cat_id'];?></h3>
          </div>
          <?php

    }
    elseif(isset($_GET['brand_id']))
    {
          ?>
          <div class="brand  m-2">
          <h3 class="ms-3"><?php echo $_GET['brand_id'];?></h3>
          </div>
          <?php
      }
      else
      {
        ?>
      <div class="brand m-2">
          <h3 class="ms-3">shop</h3>
          </div>

      <?php
      } 
    ?>
    <!-- works on cards -->
    <?php
    if(isset($_GET['cat_id']))
    {
      
        require_once("connect.php");  
         $p_cat=$_GET['cat_id'];
         $get_product="select * from products where catagory='$p_cat'";
         $run_products=mysqli_query($conn,$get_product);
         $count=mysqli_num_rows($run_products);
         if($count>0)
         {
          while($row=mysqli_fetch_array($run_products))
          {
            $pid=$row['pid'];
            $brand=$row['brand'];
            $img=$row['img1'];
            $rate=$row['stars'];
            $price=$row['price'];
            $title=$row['title'];
            ?>
            <div class="col-md-4 col-sm-12 mt-2 product">
            <div class="card" style="width: 17rem; height:27rem;">
            <img src="admin/images/<?php echo $img;?>" class="card-img-top" alt="..." style="height:12rem;">
            <div class="card-body">
            <h6 class="text-center">By <?php echo "$brand";?></h6>
            <h5 class="card-title"><?php echo "$title";?></h5>
            <p class="card-text">RS: <?php echo "$price";?></p>
            <a href="details.php?id=<?php echo $pid?>" class="btn btn-outline-danger d-block mx-auto w-50">datails</a>
          </div>
          </div>
          </div>
            <?php

          }
         }
         else{
          ?>
          <div class="m-75 d-block mx-auto">
            <h4>No Product is avalable in this catagory</h4>
          </div>
          <?php
         }

    }
    elseif(isset($_GET['brand_id']))
    {
         $p_brand=$_GET['brand_id'];
         $get_product="select * from products where brand='$p_brand'";
         $run_products=mysqli_query($conn,$get_product);
         $count=mysqli_num_rows($run_products);   
         if($count>0)
         {
          while($row=mysqli_fetch_array($run_products))
          {
            $pid=$row['pid'];
            $brand=$row['brand'];
            $img=$row['img1'];
            $rate=$row['stars'];
            $price=$row['price'];
            $title=$row['title'];
            ?>
        <div class="col-md-4 col-sm-12 mt-2 product">
            <div class="card" style="width: 17rem;height:27rem;">
            <img src="admin/images/<?php echo $img;?>" class="card-img-top" alt="..." style="height:12rem;">
            <div class="card-body">
            <h6 class="text-center">By <?php echo "$brand";?></h6>
            <h5 class="card-title"><?php echo "$title";?></h5>
            <p class="card-text">RS: <?php echo "$price";?></p>
            <a href="details.php?id=<?php echo $pid?>" class="btn btn-outline-danger d-block mx-auto w-50">datails</a>
          </div>
          </div>
          </div>
            <?php

          }
        }
        else{
         ?>
         <div class="m-75 d-block mx-auto">
           <h4>No Product is avalable in this brand</h4>
         </div>
         <?php
        }

      
      }
      else
      {
      
        $per_page=3;
      if(isset($_GET['page']))
      {
        $page=$_GET['page'];
      }
      else{
        $page=1;
      }
      $start_form=($page-1)*$per_page;
      
      $get_cards="select * from products order by 1 DESC LIMIT $start_form,$per_page";
        $run_cards=mysqli_query($conn,$get_cards);
        while($row=mysqli_fetch_array($run_cards))
        {
          $pid=$row['pid'];
          $brand=$row['brand'];
          $img=$row['img1'];
          $rate=$row['stars'];
          $price=$row['price'];
          $title=$row['title'];


          ?>
        <div class="col-md-4 col-sm-12 mt-2 product">
        <div class="card" style="width: 17rem;height:27rem;">
        <img src="admin/images/<?php echo $img;?>" class="card-img-top" alt="products" style="height:12rem;">
        <div class="card-body">
        <h6 class="text-center">By <?php echo "$brand";?></h6>
        <h5 class="card-title"><?php echo "$title";?></h5>
        <p class="card-text">RS: <?php echo "$price";?></p>
        <a href="details.php?id=<?php echo $pid?>" class="btn btn-outline-danger d-block mx-auto w-50">datails</a>
      </div>
      </div>
      </div>

          <?php
        }

      ?>
      </div>
      <!-- 1st row ends -->
      <!-- pagination -->
      <div class="pagination d-flex justify-content-center mt-3">
      <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php
    $qry="select * from products";
    $result=mysqli_query($conn,$qry);
    $total_record=mysqli_num_rows($result);
    $total_pages=ceil($total_record/$per_page);
    echo"<li class='page-item'><a href='shop.php?page=1' class='page-link'>".'1'."</a></li>";
    for ($i=2; $i <=$total_pages; $i++) { 
      echo"<li class='page-item'><a href='shop.php?page=".$i."' class='page-link'>".$i."</a></li>";  


    }
    echo"<li class='page-item'><a href='shop.php?page=$total_pages' class='page-link'>".'last'."</a></li>";
    ?>
    </ul>
    </nav>
    </div>
    
    <?php
 }   
?>   
 <!-- pagination ends -->
<!-- maincontent -->
    </div>
    <!-- main shop -->
  </div>
</div>
<?php
include("includes/footer.html");
?>
</body>
</html>