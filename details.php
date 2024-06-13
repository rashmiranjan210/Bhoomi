<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .box{
        padding: 4px 15px;
        margin-bottom:5px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
    }
    .detalcontainer .container{
        margin-bottom:5px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        box-sizing:border-box;
    }
    .bi-star {
        cursor: pointer;
        font-size: 30px;
    }
  </style>
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
    $user_mail=$_SESSION['user_mail'];
    $is_in_cart = false;
    $is_in_wish=false;
    ?>
    <div class="productdetail mt-2">
        <div class="container">  
    
      <?php
       require("connect.php");
       if(isset($_GET['id']))
       {
          $pro_id=$_GET['id'];
          $qry="select * from products where pid=$pro_id";
          $run=mysqli_query($conn,$qry);
          $row=mysqli_fetch_array($run);
                $pid=$row['pid'];
                $brand=$row['brand'];
                $img=$row['img1'];
                $img1=$row['img2'];
                $img2=$row['img3'];
                $rate=$row['stars'];
                $price=$row['price'];
                $title=$row['title'];
                $stock=$row['stocks'];
                $benefit=$row['benefit'];
                $how=$row['howuse'];
                $dsc=$row['product_dsc'];
                $size=$row['size'];
       }
    $qry="SELECT * FROM wishlist WHERE product_id=$pro_id and usermail='$user_mail'";
        $res=$conn->query($qry); 
        if(mysqli_num_rows($res)>0){
          $is_in_wish=true;
        }
    
    $qry="SELECT * FROM cart WHERE pid=$pro_id and usermail='$user_mail'";
      $res=$conn->query($qry); 
      if(mysqli_num_rows($res)>0){
        $is_in_cart = true;
      }
    
    // if(isset($_POST['cart']))
    // {
    //   $usermail=$_POST['usermail'];
    //   $product_id=$_POST['pid'];
    //   echo $product_id;
    //   $price=$_POST['price'];
    //   $quantity=$_POST['qua'];
    //   $size=$_POST['size'];
    //   $total=$quantity*$price;
    //     $qry = "INSERT INTO cart(pid,usermail,quantity,size,totprice,price) VALUES($product_id,'$usermail',$quantity,'$size',$total,$price)";
    //     $res = $conn->query($qry);
    //     if($res){
    //       echo "<script>window.open('cartcheck.php?id=$product_id','_self')</script>";
    //     } else { 
    //     echo "Error: ".$conn->error;
    //     }
       
    //   }
      if(isset($_POST['wish']))
    {
      $usermail=$_POST['usermail'];
      $pid=$_POST['pid'];
       $insert_wish = "INSERT INTO wishlist(usermail,product_id) VALUES('$usermail',$pid)";
            $res = $conn->query($insert_wish);
            if($res){
              echo "<script>window.open('details.php?id=$pid','_self')</script>";
            } else { 
            echo "Error: ".$conn->error;
            }
    
      }
      if(isset( $_GET['status'])){
        $status=$_GET['status'];
        if($status==='ok')
        {
            $hlw="review added successfully";
            notification($hlw);
        }
        else
        {
            $hlw="something is wrong, kindly check your details";
            notification($hlw); 
        }
        

    }
    ?>
       <?php
      include"includes/filter.html";
      
      ?>
        <div class="row mt-4">
                <div class="col-md-4 productimg">
                    <!-- image -->
                    <img src="admin/images/<?php echo $img;?>" class="img-fluid" alt="...">
                </div>
                <!-- image end -->
                <!-- similar image div -->
    
                <div class="col-md-1 producimage d-flex flex-column justify-content-center  align-items-center">
                    <!-- image -->
                    <img src="admin/images/<?php echo $img1;?>" class="img-fluid mt-2" alt="image">
                    <img src="admin/images/<?php echo $img2;?>" class="img-fluid mt-2" alt="image">
                </div>
                <!-- similar image div end -->
                <!-- dec div start -->
                <div class="col-md-7">
                    <div class="box">
                        <h4 class="text-center"> <?php echo "$title";?></h4>
                        <p class="sellername text-center">By <?php echo "$brand";?> </p>
                        <p class="rating text-center"> <?php echo "$rate";?>🌟</p>
                        <div class="detailform w-50 mx-auto">
                            <form action="cartcheck.php" method="post" class="form">
                            <input type="hidden" name="pid" value="<?php echo $pid ?>">
                            <input type="hidden" name="usermail" value="<?php echo $user_mail ?>">
                            <input type="hidden" name="price" value="<?php echo $price ?>">
                            <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Product quantity</label>
                            <input type="text" name="qua" class="form-control" id="formGroupExampleInput"value=1> 
                            </div>
                            <label for="sizeinput" class="form-label">Product size: <strong><?php echo "$size";?></strong></label>
                            <input type="hidden" id="disabledTextInput" name="size" class="form-control" value="<?php echo "$size";?>"> 
                            <p class="price h5 text-center my-2 me-2">PRICE:<?php echo "$price";?>INR || <span><?php echo "$stock";?> items in stock</span></p>
                            <div class="text-center mt-1">
                            <?php if ($is_in_wish): ?>
                                  <button class="btn btn-danger d-inline" disabled><i class="bi bi-heart-fill"></i> Added</button>
                              <?php else: ?>
                                  <button class="btn btn-primary d-inline" type="submit" name="wish" ><i class="bi bi-heart-fill"></i>Add</button>
                              <?php endif; ?>
                              <div class="text-center d-inline">
                              <?php if ($is_in_cart): ?>
                                  <button class="btn btn-danger d-inline" disabled><i class="bi bi-cart-fill"></i> Added</button>
                              <?php else: ?>
                                  <button class="btn btn-primary d-inline" type="submit" name="cart"><i class="bi bi-cart"></i> Add</button>
                              <?php endif; ?>
                          </div>
                          </div>
                            </form>
                        </div>
                        <!-- form div end -->
                    </div>
                </div>
                <!-- dec div end -->
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
        <!-- second container start -->
        </div>
    
    <div class="detalcontainer ">
          <div class="container mt-2 pt-3 pb-2">
      <div class="heading row">
      <div class="col-md-6 d-flex justify-content-evenly align-items-center flex-wrap">
      <button class="btn btn-outline-dark btn-lg mt-2" onclick="toggletext(1)">Description</button>   
        <button class="btn btn-outline-dark btn-lg mt-2" id="btn2" onclick="toggletext(2)">How to use</button>   
        <button class="btn btn-outline-dark btn-lg mt-2" id="btn3" onclick="toggletext(3)">Benifts</button>   
        <button class="btn btn-outline-dark btn-lg mt-2" id="btn4" onclick="toggletext(4)">Review</button>   
      </div>  
      </div>
      <!-- firstbutton -->
        <div id="buttoncontent">
        <p class="deatilpara mt-3 mb-1"><?php echo "$dsc";?></p>         
        </div>
    <!-- firstbutton -->
    <!-- secondbutton -->
        <div id="buttoncontent2" class="d-none">
            <p class="deatilpara mt-3 mb-1"><?php echo "$how";?></p>
        </div>
    <!-- secondbutton -->
        <div id="buttoncontent3" class="d-none">
            <p class="deatilpara mt-3 mb-1"><?php echo "$benefit";?></p>
        </div>
    <!-- secondbutton -->
        <div id="buttoncontent4" class="d-none">
            <p class="deatilpara mt-3 mb-1">
              <div class="review p-1">
                <div class="add">
                <div id="stars">
                  <i class="bi bi-star" onclick="countrating(this)"></i>
                  <i class="bi bi-star" onclick="countrating(this)"></i>
                  <i class="bi bi-star" onclick="countrating(this)"></i>
                  <i class="bi bi-star" onclick="countrating(this)"></i>
                  <i class="bi bi-star" onclick="countrating(this)"></i>
                  </div>
                <form action="addreview.php" method="post" onsubmit="reviewform(event)" class="w-50">
                  <input type="hidden" name="usermail" value="<?php echo $user_mail?>">
                  <input type="hidden" name="productid" value="<?php echo $pid?>">
                   Enter your name
                  <input type="text" name="username" value="">
                  <input type="hidden" name="rating" id="prating" value=""> <!-- Hidden input field for rating -->
                  <br>
                  <label for="">Add Your Review</label><br>
                  <textarea name="review" id="review" class="form-control"></textarea><br>
                  <button type="submit" class="btn btn-outline-primary">Add</button>
              </form>
                </div>
                <div class="old mt-2">
                 <?php
                 require("connect.php");
                 $sql = "SELECT * FROM review WHERE productid = $pid";
                 $result = $conn->query($sql);
                 
                 if ($result->num_rows > 0) {
                    $count=mysqli_num_rows($result);
                    echo"<h2 class='text-daek fs-5'>Total reviews:$count</h2>";
                     // Output table header
                     // Output data of each row
                     while($row = $result->fetch_assoc()) {
                      $current_date = date("Y-m-d", strtotime($row["reviewtime"]));
                         echo "<div class='box fs-6'>";
                         echo "<p> username:" . $row["username"] . "</p>";
                         echo "<p> rating🌟" . $row["rating"] . "</p>";
                         echo "<p>" . $row["message"] . "</p>";
                         echo "<p>review on " .  $current_date. "</p>";
                         echo "</div>";
                     }
                 } else {
                     echo "No reviews found for product";
                 }
                 ?>
                </div>
              </div>
            </p>
        </div>
    <!-- secondbutton -->
             </div >
            <!-- second container end -->
        </div>

<?php

  }
?>
<?php
include"includes/footer.html";
?>  
<script src="mainjs/detail.js"></script> 
</body>
</html>