<?php

 include ("./db.php");
 $cid = $_GET['id'];
 $qry = "DELETE FROM catagory WHERE cid=$cid";
 // echo $qry;
 if($conn->query($qry)){
    echo "<script>window.open('../index.php?view_product_categories','_self') </script>";
 } else {
 header("location:viewproduct.php?status=error");
 }
 ?>