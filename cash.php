<?php
session_start();
$usermail=$_SESSION['user_mail'];
$unique = false;
$existing_numbers = array();
require("connect.php");
$sql = "SELECT invoice FROM orders";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($existing_numbers, $row['invoice']);
    }
} else {
    echo "No invoices found in the database.";
}
// var_dump($existing_numbers);
while (!$unique) {
    $invoice = mt_rand(10, 10000); 
     
    if (!in_array($invoice, $existing_numbers)) {
        $unique = true; 
    }
}
$_SESSION['invoice']=$invoice;
$status='placed';
$qry="select * from cart where usermail='$usermail'";
$run_cart=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($run_cart))
{
                    $pid=$row['pid'];
                    $quantity=$row['quantity'];
                    $size=$row['size'];
                    $cid=$row['id'];
                    $price=$row['price'];
                    $tot=$price*$quantity;
                    $insert_order="insert into orders (usermail,invoice,quantity,size,amount,order_date,order_status)values('$usermail',$invoice,$quantity,'$size',$tot,NOW(),'$status')";
                    $res = $conn->query($insert_order);
                    if($res){
                    echo "inserted successfully in order";
                    } else { 
                    echo "Error: ".$conn->error;
                    }
                    $insert_pending="insert into pending_order(user_mail,invoice_no,product_id,qty,size,order_status)values('$usermail',$invoice,$pid,$quantity,'$size','$status')";
                    $done = $conn->query($insert_pending);
                    if($done){
                    echo "inserted successfully in pending";
                    } else { 
                    echo "Error: ".$conn->error;
                    }
                    // ----------------------------------------------
                    $update_stock="UPDATE products
                    SET stocks = (SELECT stocks FROM products WHERE pid = $pid) -$quantity 
                    WHERE pid = $pid;
                    ";
                    $stock=$conn->query($update_stock);
                    if($stock){
                        echo "stock updated successfully";
                        } else { 
                        echo "Error: ".$conn->error;
                        }
                    
 }
 $deletecart="DELETE FROM cart WHERE usermail = '$usermail'";
 $res = $conn->query($deletecart);
 if($res){
 header("location:checkout.php?invoice=$invoice");
 } else { 
 echo "Error: ".$conn->error;
 }
 $conn->close();
?>
