<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost:8888/bhoomicopy/">
    <title>Document</title>
</head>
<body>
   <h1>MY ORDER</h1>
   <p>If you have any questions,feel free to <a href="aboutus.php#contact"  style="text-decoration:none;" class="text-danger fw-bolder">contact us</a> ,our costumer service is working for you</p>
   <div class="ordertable">
   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center text-danger">Oreder No</th>
      <th scope="col" class="text-center text-danger">Order Date</th>
      <th scope="col" class="text-center text-danger">Payment status</th>
      <th scope="col" class="text-center text-danger">order status</th>
      <th scope="col" class="text-center text-danger">Order Total</th>
    </tr>
  </thead>
  <tbody>

  <?php
  require("../connect.php");
  $mail= $_SESSION['user_mail'];
  $qry="SELECT DISTINCT invoice
  FROM orders
  WHERE usermail='$mail'";
  $res=$conn->query($qry);
  while($row=mysqli_fetch_array($res))
{
    $total=0;
    $invoice=$row['invoice'];
    $get_order="SELECT *
    FROM orders
    WHERE invoice=$invoice";
    $run_order=$conn->query($get_order);
    while($order_row=mysqli_fetch_array($run_order))
  {
    $date=$order_row['order_date'];
    $current_date = date("Y-m-d", strtotime($date));
    $order_status=$order_row['order_status'];
    $payment=$order_row['amount'];
    $total+=$payment;
  }
  if($total<=500)
  {
    $total=$total;
  }else
  {
      $discount=0.1*$total;
      $total=($total-$discount);
  }
?>
  <tr>
      <th scope="row" class="text-center"><?php echo "$invoice"?></th>
      <td class="text-center"><?php echo "$current_date"?></td>
      <td class="text-center">
      <?php
      if ($order_status==='placed') {
        echo"unpaid";
      }else
      {
        echo"paid";
      }
      ?>
      </td class="text-center">
      <td class="text-center">
      <?php
      if ($order_status==='placed') {
        echo"placed";
      }elseif($order_status==='processing')
      {
        echo"processing";
      }
      else{
        echo"delivered";
      }
      ?>
      </td>
      <td class="text-center"><?php echo "$total"?></td>
    </tr>
<?php

}
  ?>
  </tbody>
</table>
   </div>
</body>
</html>