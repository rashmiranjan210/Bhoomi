<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php
  include_once("nav.php");
  include_once("function.php");
  if(!isset($_SESSION['user_mail']))
  {
    // header("location:user/login.php");
    echo "<script>window.open('user/login.php', '_self');</script>";
    exit;
  }
  else{

    $usermail=$_SESSION['user_mail'];
    ?>
    <?php
     require_once("connect.php");
     if(isset($_GET['id']))
     {
        $blog_id=$_GET['id'];
        $qry="select * from blog where bid=$blog_id";
        $run=mysqli_query($conn,$qry);
        $row=mysqli_fetch_array($run);
              $bid=$row['bid'];
              $img=$row['img'];
              $title=$row['title'];
              $body=$row['body'];
              $auther=$row['auther'];
              $date=$row['publish'];
              $current_date = date("Y-m-d", strtotime($date));
              $_SESSION['blogid']=$bid;
     }
     if(isset($_POST['comment']))
     {
          $content=$_POST['blog'];
          $mail=$_POST['umail'];
          $blog_id=$_POST['bid'];
          $qry = "INSERT INTO comment(usermail,blog_id,comment) VALUES('$mail',$blog_id,'$content')";
          $res = $conn->query($qry);
          if($res){
            //   echo "<script>window.open('blogdetails.php?id=$blog_id','_self')</script>";
            echo "<script>window.open('blogdetails.php?id=$blog_id&status=ok','_self')</script>";
          } else { 
          echo "Error: ".$conn->error;
          }
     }
     if(isset($_GET['status']))
     {
        $status=$_GET['status'];
        if($status=='ok')
        {
            $msg="your comment has been added";
            notification($msg);
        }
     }
    ?>
    <div class="blogdetails">
      <div class="container">
          <div class="row p-4 mt-3 mb-3">
              <div class="tilte text-dark text-center">
                  <h1><?php echo "$title" ?></h1>
                  <p class="text-danger fw-bold">By <?php echo "$auther" ?> </p>
                  <p><i class="bi bi-stopwatch"></i> Published on: <?php echo "$current_date" ?></p>
              </div>
              <!-- title div ends here -->
              <div class="feature">
                  <img src="user/images/<?php echo $img;?>" alt="blog_image" class="img-fluid mb-4 d-block mx-auto">
              </div>
              <!-- feature div ends -->
              <div class="content fs-6 text-dark">
                  <p><?php echo "$body" ?></p>
              </div>
          </div>
          <!-- row ends here -->
          <div class="comment">
          <form action="blogdetails.php" method="post">
              <input type="hidden" name="bid" value="<?php echo $bid?>">
              <input type="hidden" name="umail" value="<?php echo $usermail?>">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Add a comment please</label>
              <textarea name="blog" id="" cols="20" rows="4" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-danger d-block mx-auto" name="comment">Submit</button>
  </form>
  </div>
  <!-- comment div ends -->
  <!-- div for old comments -->
  <button class=" btn text-danger mt-3 fs-3 d-block mx-auto fw-bold" id="old">See all comments</button>
  <div class="oldcomment">
      <div class="com mt-2">
       
  </div>
  <!-- divfor old comments end -->
      </div>
    </div>

<?php
  }
  ?>

  <?php
include"includes/footer.html";
?>
<script src="./jquery-3.7.1.js"></script>
<script>
 $(document).ready(function(){
            $("#old").click(function(){ 
                $.get("ajax/comment.php", function(data){ 
                    data = JSON.parse(data) 
                    console.log(data); 
                    let div = `<div>`;  
                    for(let i=0; i<data.length; i++){ 
                        div+=`By <p class='text-danger'>${data[i].usermail}</p>`; 
                        div+=`<p>${data[i].comment}</p>`; 
                    } 
                    div += `</div>`; 
                    $(".com").append(div); 
                });
            });
        });
</script>
</body>
</html>