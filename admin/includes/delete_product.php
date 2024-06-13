 <?php
//  if(!isset($_GET['id'])){
//  header('location:viewproduct.php');
//  }
 include ("./db.php");
 $pid = $_GET['id'];
 $qry = "DELETE FROM products WHERE pid=$pid";
 // echo $qry;
 if($conn->query($qry)){
    echo "<script>window.open('../index.php?view_product','_self') </script>";
 } else {
   
 header("location:viewproduct.php?status=error");
 }
 ?>