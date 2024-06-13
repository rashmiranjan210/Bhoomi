<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .card.blog{
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5); /* Red box shadow on hover */
        }
    </style>
</head>
<body>
<h1>MY BLOGS</h1>
    <div class="container">
        <div class="row">
        <?php
 require("../connect.php");
 $mail= $_SESSION['user_mail'];
 $get_blogs="select * from blog where email='$mail'";
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
   <div class="col-md-4 blogsec mx-3">
    <div class="card mt-2 p-2 blog" style="width: 20rem; height:25rem;">
  <img src="user/images/<?php echo $img;?>" class="card-img-top" alt="feature image" style="height: 20rem;">
  <div class="card-body">
    <h5 class="card-title text-danger text-center ">By <?php echo "$auther" ?></h5>
    <a href="blogdetails.php?id=<?php echo $bid?>" style="text-decoration:none">
    <p class="card-text text-dark fw-bolder"><?php echo "$title" ?></p>
    </a> 
    <br>
   <p class="timeupload"><i class="bi bi-stopwatch"></i><?php echo "$current_date" ?></p>
  </div>
</div>
 </div>
<?php
 }
 ?>
    </div>
    </div>
</body>
</html>