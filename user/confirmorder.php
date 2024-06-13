<?php
if(isset($_POST['confirm']))
{
  session_start();
  $mail=$_SESSION['user_mail'];
    require_once "../connect.php";
    $invoice_no=$_POST['order'];
    $amount=$_POST['amount'];
    $method=$_POST['payment'];
    $qry="INSERT INTO payment(invoice_no,net,mode,date)VALUES($invoice_no,$amount,'$method',NOW())";
    $inset_payment=$conn->query($qry);
    if($inset_payment){
            echo"insert successful";
          } else {
          echo "Error: ".$conn->error;
          }
    if($method==='COD')
    {
        $status="placed"; 
    }else
    {
        $status='processing';
    }
    $qry="UPDATE orders
    SET order_status = '$status'
    WHERE invoice=$invoice_no";
    $update_order=$conn->query($qry);
    if($update_order){
        echo"update order successful";
      } else {
      echo "Error: ".$conn->error;
      }
      $qry="UPDATE pending_order
    SET order_status = '$status'
    WHERE invoice_no=$invoice_no";
    $update_pending=$conn->query($qry);
    if($update_pending){
        echo"update order successful";
      } else {
      echo "Error: ".$conn->error;
      }
    // --------------------------------------
      $tamount=$amount+60;
      $msg="Thank you for your order. Your order has been confirmed and total amount is ₹" . number_format($tamount, 2);
      $msg = $conn->real_escape_string($msg);
      $sql = "INSERT INTO message (usermail, message, time) VALUES ('$mail', '$msg', NOW())";
      if ($conn->query($sql) === TRUE) {
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      unset($_SESSION['invoice']);
      header("location:myaccount.php?my_order&confirm=ok");
  
}

?>