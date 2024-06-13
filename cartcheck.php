<?php
// if(isset($_GET['id']))
// {
//    $pro_id=$_GET['id'];
//     echo $pro_id;

// }
if(isset($_POST['cart']))
    {
    include('connect.php');
      $usermail=$_POST['usermail'];
      $product_id=$_POST['pid'];
      echo $product_id;
      $price=$_POST['price'];
      $quantity=$_POST['qua'];
      $size=$_POST['size'];
      $total=$quantity*$price;
        $qry = "INSERT INTO cart(pid,usermail,quantity,size,totprice,price) VALUES($product_id,'$usermail',$quantity,'$size',$total,$price)";
        $res = $conn->query($qry);
        if($res){
         echo "<script>window.open('details.php?id=$product_id','_self')</script>";
        } else { 
        echo "Error: ".$conn->error;
        }
       
      }


?>