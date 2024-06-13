<?php
 include ("./db.php");
 $bid = $_GET['bid'];
 $qry = "DELETE FROM blog WHERE bid=$bid";
 // echo $qry;
 if($conn->query($qry)){
    echo "<script>window.open('../index.php?view_blog','_self') </script>";
 } else {
    echo '<script>';
    echo 'alert("Error")';
    echo '</script>';
   echo "<script>window.open('../index.php?view_blog','_self') </script>";
 }
 ?>