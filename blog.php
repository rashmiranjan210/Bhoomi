<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .particepate{
        background:url("image/cro1.jpg")no-repeat center center/cover;
       
      }
      #hotbox {
    background-color: rgba(242, 11, 26, 0.2); /* Red background with opacity */
    }

    #hotbox h3 {
        color: black; /* Black text */
        font-style: italic; /* Italic text */
    }
        .card.blog:hover{
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5); /* Red box shadow on hover */
        }
        #write{
      border: 1px solid black;
      padding: 10px 20px;
      border-radius: 25px; /* More curved corners */
      transition: background-color 0.3s ease;
      font-weight: bolder; /* Bold text */
      text-transform: uppercase; /* Capital letters */
      font-style: italic; /* Italic text */
      width:20vw;
        }
        #write:hover {
    background-color: #eadfdf ; /* Lighter fade-red color on hover */
  }
  #blogtext {
    background: linear-gradient(to right,black,red); /* Gradient from left (white) to right (black) */
    -webkit-background-clip: text; /* Clip the text to the background gradient */
    -webkit-text-fill-color: transparent; /* Hide the original text color */
}
    </style>
</head>
<body>
    <?php
  include_once("nav.php");
  ?>
  <div class="blogimg">
    <div class="mt-1">
    <img src="image/cro3.jpg" class="img-fluid w-100 mx-auto" alt="blog_image">
    </div>
  </div>
<!-- banner div -->
<div class="mt-3" >
  <div class="bannerimg p-1 bg-light" onmouseover="toggleText()">
    <h1 class="text-center text-danger fw-bolder" id="banner">BREAKING TABOOS</h1>
  </div>
</div>
<!-- banner div ends -->
<!-- participation div starts -->
<div class="particepate">
    <div class="mt-4 part p-4 part">
     <h1 class="text-center fw-bolder p-2" id="blogtext">Share Your Story<br>and save others like you from facing the same problem</h1>
     <a href="user/writeblog.php"  style="text-decoration:none">
     <button class=" btn btn-outline-dark d-block mx-auto bg-light fw-bold" id="write">Click To Write</button>
     </a>
    </div>
  </div>
<!-- participation div ends -->
<!-- blogging section starts -->
<div class="hotbox mt-3" id="hotbox">
  <div class="row p-3 border border-2-dark">
    <div class="col-md-12">
      <h3 class="text-center">Explore The Top Blogs</h3>
    </div>
  </div>
</div>
<!-- blog -->
<div class="blogsection mt-3 mb-4">
  <div class="container">
    <div class="row">
      <!-- 1blog -->
      <?php
   require_once("connect.php");
 $get_blogs="select * from blog";
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
  <div class="col-md-4">
  <div class="card mt-2 p-2 blog" style="width: 20rem; height:25rem;">
  <img src="user/images/<?php echo $img;?>" class="card-img-top" alt="feature image" style="height:20rem;">
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
       <!-- 1blog -->
    </div>
  </div>
</div>
<!-- blog -->
<!-- blogging section ends -->
<?php
include_once("includes/footer.html");
?>
<script>
  let isPathbreaking = false;

function toggleText() {
  const bannerText = document.getElementById('banner');

  if (isPathbreaking) {
    bannerText.textContent = 'BREAKING TABOOS';
  } else {
    bannerText.textContent = 'WITH PATHBREAKING IDEAS';
  }

  isPathbreaking = !isPathbreaking;
}

</script>
</body>
</html>