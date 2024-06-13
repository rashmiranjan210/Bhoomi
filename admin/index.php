<?php
    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>

<?php
 $admin_session=$_SESSION['admin_email'];
 $qry="select * from admin where admin_email='$admin_session'";
 $res=$conn->query($qry);
 $row=mysqli_fetch_array($res);
 $admin_id=$row['admin_id'];
 $admin_name=$row['admin_name'];
 $admin_email=$row['admin_email'];
 $admin_image=$row['admin_image'];
 $admin_country=$row['admin_country'];
 $admin_contact=$row['admin_contact'];
 $admin_job=$row['admin_job'];
 $admin_about=$row['admin_about'];
 
 $get_pro="select * from products";
 $run_pro=$conn->query($get_pro);
 $count_pro=mysqli_num_rows($run_pro);


 $get_cust="select * from user";
 $run_cust=$conn->query($get_cust);
 $count_cust=mysqli_num_rows($run_cust);


 $get_cat="select * from catagory";
 $run_cat=$conn->query($get_cat);
 $count_cat=mysqli_num_rows($run_cat);


 $get_ord="select * from orders";
 $run_ord=$conn->query($get_ord);
 $count_ord=mysqli_num_rows($run_ord);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<style>
    a{
        text-decoration:none;
        color:black;
    }
    .hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    li{
        list-style: none;
    }
    #wrapper{
        padding-left:0;
    }
    #page-wrapper{
        width:100%;
        padding:0;
        background-color:#F9F9F9;

    }
    @media (min-width:768px){
        #wrapper{
            padding-left:0;
        }
        #page-wrapper{
        padding:10px;

    }
    }
    .top-nav{
        padding:0 15px;
    }
    .top-nav>li{
        display:inline-block;
        float:left;
    }
    .top-nav>li>a{
        padding-top:15px;
        padding-bottom:15px;
        line-height:20px;
    }
    .top-nav>li>a:hover{
        color:green;

    }
    .nav-item>a:hover{
        color:green;
        background-color:#eae2b7;
        border-radius:70px;
       
    }
.nav-drop{
    background-color:#415a77;
    padding:10px;
    border-radius:30px;
    color:white;
}

</style>
<body>
    <div class="container-fluid">
        <?php include 'includes/navbar.php' ?>
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-2" style="">
                    <!-- Sidebar content -->
                    <?php include 'includes/sidebar.php'; ?>
                </div>
                
                <!-- Main Content -->
                <div class="col-md-10" style="background-color: #F9F9F9;">
                    <!-- Content -->
                    <?php
                    if(isset($_GET['dashboard'])){
                        include 'dashboard.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['insert_product'])){
                        include 'product.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['view_product'])){
                        include 'includes/viewproduct.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['pid'])){
                        $pid=$_GET['pid'];
                        include 'includes/edit_product.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['insert_product_categories'])){
                        include 'includes/insert_product_categories.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['view_product_categories'])){
                        include 'includes/view_product_categories.php';
                    }
                    ?>
                    
                    <?php
                    if(isset($_GET['view_customer'])){
                        include 'includes/view_customer.php';
                    }
                    ?>
                     <?php
                    if(isset($_GET['view_payment'])){
                        include 'includes/view_payment.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['view_order'])){
                        include 'includes/view_order.php';
                    }
                    ?>
                    
                    <?php
                    if(isset($_GET['view_blog'])){
                        include 'includes/view_blog.php';
                    }
                    ?>
                    <?php
                    if(isset($_GET['admin_profile'])){
                        include 'includes/admin_profile.php';
                    }
                    ?>
                    
            
                </div>
            </div>
        </div>

<script></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<?php } ?>