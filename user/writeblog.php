<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost:8888/bhoomicopy/">
    <script src="https://cdn.tiny.cloud/1/ld245u81vx5q14wu189vou8o63fqmavngcd09xncv2v1omcp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .writeform {
            width:75vw;
            background: rgba(255,0,0,0.6);
            z-index: 10;
            border-radius:7px;
            border: 2px solid rgba(255,255,255,0.8);
            backdrop-filter:blur(7px);
            box-shadow: -20px 20px 20px rgba(10,10,10,0.25);
    }
  </style>
</head>
<body>
<?php
  include_once("../nav.php");
  include_once"../function.php";
  ?>
  <div class="writeblog">
    <div class="container">
      <?php 
      if(!isset($_SESSION['user_mail']))
      {
        echo "<script>window.open('user/login.php', '_self');</script>";
        exit;
        // header("location:login.php");

      }
      else{
          if(isset($_POST['submit'])){
            $mail=$_POST['usermail'];
            $name=$_POST['name'];
            $title=$_POST['title'];
            $content=$_POST['content'];
            $featureimg=$_FILES['blogimg'];
            $imgname=$featureimg['name'];
                $path="images"."/".$imgname;
                if(move_uploaded_file($featureimg['tmp_name'],$path))
                {
                    // echo "image upload succesfully";
                  }
            require_once "../connect.php";
            $qry = "INSERT INTO blog(title,body,img,auther, 
                publish,email) VALUES('$title', '$content', '$imgname', 
                '$name', NOW(), '$mail')";
        
                $res = $conn->query($qry);
                if($res){
                       $msg="congo.Your content has been published";
                       notification($msg);
                } else {
                echo "Error: ".$conn->error;
                }
        
                }
        ?>
        <div class="row mt-4 mb-5 bg-light">
        <form action="user/writeblog.php" method="post" class="w-75 mx-auto writeform text-dark fw-bold" onsubmit="return validateForm()" enctype="multipart/form-data">
          <input type="hidden" name="usermail" value="<?php echo $_SESSION['user_mail'] ?>">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enter name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="title">
        </div>
        <div class="mb-3">
        <label>feature image</label>
          <input type="file" name="blogimg">
        </div>
        <div class="mb-3">
        <label class="form-label">Write Here</label>
        <textarea id="myTextArea" name="content"></textarea>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">I agree</label>
        </div>
        <button type="submit" class="btn btn-outline-dark d-block mx-auto mb-2 fw-bold" name="submit">Submit</button>
      </form>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <script>
        tinymce.init({
            selector: '#myTextArea'
        });
    </script>
    <?php
include_once("../includes/footer.html");
?>
<script src="user/userjs/write.js"></script>
</body>
</html>
