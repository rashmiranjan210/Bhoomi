<?php
if(isset($_POST['submit'])){
    include "./db.php";
    $pid = $_POST['pid'];
    $catagory = $_POST['catagory'];
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $howuse = $_POST['howuse'];
    $product_dsc = $_POST['product_dsc'];
    $size = $_POST['size'];

    $qry = "UPDATE products SET catagory ='$catagory ', title='$title', brand='$brand', price=$price, howuse='$howuse',product_dsc='$product_dsc',size='$size' WHERE pid=$pid";
    if($conn->query($qry)){    
            echo "<script>window.open('../index.php?view_product','_self') </script>";
    } else {
    // header("location:../myaccount.php?update_acc=error");
    echo $conn->error;
    }
 }
 $conn->close();
 ?>