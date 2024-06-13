<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style/index.css">
  <title>Document</title>
</head>
<body>
  <?php
  include_once("nav.php");
  require_once("connect.php");
  ?>
<!-- crousal -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <!-- database -->
  <?php
  $get_slider="select * from slider LIMIT 0,1";
  $run_slider=mysqli_query($conn,$get_slider);
  while($row=mysqli_fetch_array($run_slider))
  {
    $slidername=$row['name'];
    $img=$row['image'];
    ?>
     <div class="carousel-item active">
      <img src="./image/<?php echo $img;?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
      <p class="display-3 fw-bold text-dark text-center text-italic">Empowering Woman</p>
      <?php
       if(!isset($_SESSION['user_mail']))
       {
         ?>
          <a href="user/login.php"><button class="btn mt-2 login-btn fw-bolder bg-dark text-light">Log In</button></a>
         <?php
       }else
       {
         echo "" ;
       }
      ?>  
      </div>
    </div>
    <?php
  }
  ?>
  <?php
    $get_slider="select * from slider LIMIT 1,3";
    $run_slider=mysqli_query($conn,$get_slider);
    while($row=mysqli_fetch_array($run_slider))
    {
      $slidername=$row['name'];
      $img=$row['image'];
      ?>
       <div class="carousel-item">
        <img src="./image/<?php echo $img;?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block">
        <?php
       if(!isset($_SESSION['user_mail']))
       {
         ?>
          <a href="user/login.php"><button class="btn mt-2 login-btn fw-bolder bg-dark text-light">Log In</button></a>
         <?php
       }else
       {
         echo "" ;
       }
      ?>  
        </div>
      </div>
      <?php
    }
    ?>
   <!-- database -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- cards -->

<div class="card-group p-2">
  <?php
  $card = array(
    'card1' => array(
        'title' => 'Best Price',
        'dsc' => 'Discover unbeatable deals on our e-commerce site, where we guarantee the best prices for a wide range of products every day'
    ),
    'card2' => array(
      'title' => 'Creating Awareness',
        'dsc' => 'Educate and empower women with insightful content, spreading awareness about health, wellness, and vital issues impacting their well-being globally.'
        
    ),
    'card3' => array(
      'title' => '24*7 support',
        'dsc' => 'Ensure peace of mind with round-the-clock customer support, spreading awareness about our commitment to assist you anytime, anywhere.'
        
    ),

);
foreach($card as $num=>$det)
{
  ?>
   <div class="card new">
    <div class="card-body offer">
    <img src="./image/heart.png" alt="">
     <h5 class="card-title"><?php echo $det["title"] ?></h5>
      <p class="card-text"><?php echo $det["dsc"]?></p>
    </div>
  </div>
  <?php
}
  ?>
</div>

<!-- hotbox -->

<div class="hotbox">
  <div class="row p-3">
    <div class="col-md-12">
      <h3 class="text-center">Latest This Week</h3>
    </div>
  </div>
</div>

<!-- product section -->
<div class="product">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      
<?php
 $get_cards="select * from products order by 1 DESC LIMIT 0,4";
 $run_cards=mysqli_query($conn,$get_cards);
 while($row=mysqli_fetch_array($run_cards))
 {
   $pid=$row['pid'];
   $brand=$row['brand'];
   $img=$row['img1'];
   $rate=$row['stars'];
   $price=$row['price'];
   $title=$row['title']

   ?>

<div class="card product" style="width: 17rem; height:27rem;">
  <img src="admin/images/<?php echo $img;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title"><?php echo "$title";?></h6>
    <p class="card-text"><?php echo "$price";?></p>
    <a href="details.php?id=<?php echo $pid?>" class="btn btn-outline-danger d-block mx-auto w-50">datails</a>
  </div>
</div>
   <?php
   }
?>
      <!-- cards end -->
    </div>
  </div>
</div>

<!-- blog headder -->
<div class="hotbox mt-3">
  <div class="row p-3">
    <div class="col-md-12">
      <h3 class="text-center" id="blog header">STAY UPDATED WITH BLOGS</h3>
    </div>
  </div>
</div>
<!-- blog header ends -->

<!-- blog section -->
<div class="blog mt-2 mb-3">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
    <?php
 $get_blogs="select * from blog LIMIT 0,3";
 $run_blogs=mysqli_query($conn,$get_blogs);
 while($row=mysqli_fetch_array($run_blogs))
 {
   $bid=$row['bid'];
   $date=$row['publish'];
   $img=$row['img'];
   $auther=$row['auther'];
   $title=$row['title'];
   $current_date = date("Y-m-d", strtotime($date));
   ?>

<div class="card mt-2 blog" style="width: 20rem; height:25rem;">
  <img src="user/images/<?php echo $img;?>" class="card-img-top" alt="feature image">
  <div class="card-body">
    <h5 class="card-title text-danger text-center">By <?php echo "$auther" ?></h5>
    <a href="blogdetails.php?id=<?php echo $bid?>">
    <p class="card-text text-dark fw-bolder"><?php echo "$title" ?></p>
    </a> 
   <p class="timeupload"><i class="bi bi-stopwatch"></i><?php echo "$current_date" ?></p>
  </div>
</div>

   <?php
 }
   ?>  
</div> 
  </div>
</div>
<!-- blog section ends -->
<div class="hotbox mt-3 mb-2">
  <div class="row p-3">
    <div class="col-md-12">
      <h3 class="text-center" id="blog header">Some frequently asked questions</h3>
    </div>
  </div>
</div>
<!-- faq section starts -->
  <?php
  include_once("includes/faq.html");
  ?>
<!-- faq section ends -->
<?php
include_once("includes/footer.html");
?>
<script>
</script>
</body>
</html>