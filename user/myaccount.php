<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost:8888/bhoomicopy/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
         .accountcontent a{
            text-decoration:none;
            color:black;
            font-weight:300;
            font-family:cursive;
            font-size:15px;
        }
        .accountcontent a:hover{
            color:rgba(255,0,0,0.8);
        }
        .accountcontent{
    
        padding: 2px 5px;
        margin-bottom:5px;
        box-shadow: 0 1px 5px rgba(255, 0, 0, 0.5);
        box-sizing:border-box;
        background-color:white;
        }
        .profileimg img{
            border-radius:50%;
        }
    </style> 
</head>
<body>
<?php
include_once"../nav.php";
include_once"../function.php";
?>
<?php
     if(!isset($_SESSION['user_mail']))
     {
   
    echo "<script>window.open('user/login.php', '_self');</script>";

       exit;
     }
     else{
           
            if(isset( $_GET['update_address'])){
                $status=$_GET['update_address'];
                if($status==='ok')
                {
                    $hlw="address updated successfully";
                    notification($hlw);
                }
                else
                {
                    $hlw="something is wrong, kindly check your details";
                    notification($hlw); 
                }
                
        
            }
            if(isset( $_GET['change'])){
                $status=$_GET['change'];
                if($status==='ok')
                {
                    $hlw="your password updated successfully";
                    notification($hlw);
                }
                else
                {
                    $hlw="something is wrong, kindly check your details";
                    notification($hlw); 
                }
                
        
            }
            if(isset( $_GET['confirm'])){
                $status=$_GET['confirm'];
                if($status==='ok')
                {
                    $hlw="Congo.your order has been confirmed.";
                    notification($hlw);
                }
                else
                {
                    $hlw="something is wrong, kindly check your details";
                    notification($hlw); 
                }
                
        
            }
            if(isset( $_GET['update_acc'])){
                $status=$_GET['update_acc'];
                if($status==='ok')
                {
                    $hlw="Congo.your profile has updated.";
                    notification($hlw);
                }
                else
                {
                    $hlw="something is wrong, kindly check your details";
                    notification($hlw); 
                }
                
        
            }


        
    $user_mail=$_SESSION['user_mail'];
         
    ?>
    <div class="filter">
        <div class="container">
            <div class="row">
            <?php
            require"../connect.php";
            $qry="SELECT * FROM user WHERE email='$user_mail'";
            $res=$conn->query($qry);
            $row=mysqli_fetch_array($res);
            $name=$row['name'];
            $avt=$row['userimage'];
            ?>  
            </div>
        </div>
    </div>
    <div class="myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- profilesection -->
            <div class="profile d-flex align-items-center justify-content-center flex-column mt-5 p-3 w-100 mx-auto">
            <div class="profileimg">
            <img src="user/images/<?php echo $avt;?>" class=" mx-auto d-block" alt="..." width="200" >
            </div>
            <h5 class="text-center "><span class=" text-danger">Name:</span><?php echo $name;?> </h5>
            <h5 class="text-center"><span class=" text-danger">Mail:</span><?php echo $user_mail;?></h5>
            <div class="profiledetails w-100  fs-5 fw-bold">
            <div class="accountcontent <?php if (isset($_GET["my_order"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_order">My Orders</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["my_blog"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_blog">My Blogs</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["my_wish"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_wish">My wishlist</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["my_address"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_address&order=2">My Address</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["my_edit"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_edit">Edit Profile</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["my_change"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_change">Change Password</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["my_message"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?my_message">Notifications</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["log_out"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?log_out">Log Out</a>
            </div>
            <div class="accountcontent <?php if (isset($_GET["delate"])){echo"bg-danger";}?>">
                <a href="user/myaccount.php?delate">Delete</a>
            </div>
    
            </div>
        </div>             
    </div>
      <!-- profilesection -->
      <div class="col-md-9">
        <div class="mt-5 p-3">
        <?php
        if(isset($_GET['my_order'])){
            include"includes/myorder.php";
        }
        if(isset($_GET['my_blog'])){
            include"includes/myblog.php";
        }
        if(isset($_GET['my_wish'])){
            include"includes/wishlist.php";
        }
        if(isset($_GET['my_address'])){
            include"includes/myaddress.php";
        }
        if(isset($_GET['my_edit'])){
            include"includes/edit.php";
        }
        if(isset($_GET['my_change'])){
            include"includes/changepass.php";   
        }
        if(isset($_GET['my_message'])){
            include"includes/message.php";   
        }
        if(isset($_GET['log_out'])){
            session_destroy();
            echo "<script>window.open('index.php','_self')</script>";
            
        }
        if(isset($_GET['delate'])){
            include"includes/delete.php"; 
            
        }
    ?>
        </div>
      </div>
            </div>
        </div>
    </div>
    <?php

     }
?>

<?php
include_once("../includes/footer.html");
?>
</body>
</html>