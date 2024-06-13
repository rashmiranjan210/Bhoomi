<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <base href="http://localhost:8888/bhoomicopy/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<?php
include_once"../nav.php";
$cart_items=$_SESSION['cart_count'];
 $mail=$_SESSION['user_mail'];
    require_once "../connect.php";
                $qry="SELECT * FROM user WHERE email='$mail'";
                $res=$conn->query($qry);
                $row=mysqli_fetch_array($res);
                $name=$row['name']; 
    ?>
    <?php
    
    if(isset($_GET['vid'])) 
    {
                $invoice=$_GET['vid'];
                 $total=0;
                 $get_amount="SELECT *
                    FROM orders
                    WHERE invoice=$invoice";
                $run_amount=$conn->query($get_amount);
                while($amount_row=mysqli_fetch_array($run_amount))
                   {
                     $payment=$amount_row['amount'];
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
    }
    ?>
       <div class="payment">
        <div class="container">
            <h2 class="text-center text-dark fw-bold mt-2">Welcome <?php echo $name?> </h2>
            <div class="box w-50 mx-auto">
            <h1 class="text-center text-danger">Please confirm your order</h1>
            <form action="user/confirmorder.php" method="post" class="form fs-5">
            <div class="form-group">
            <label class="form-label fs-5">Order No</label>
            <h6 class="text-dark fw-bolder fs-6"><?php echo $invoice ?></h6>
                <input type="hidden" name="order" id="" class="form-control" required value="<?php echo $invoice ?>">
            </div>   
            <div class="form-group mt-2">
                <label class="form-label fs-5">Total Amout</label>
                <h6 class="text-dark fw-bolder fs-6"><?php echo ($total + 60) . " (amount+ shipping charge)";?></h6>
                <input type="hidden" name="amount" id="" class="form-control" required value="<?php echo $total ?>">
            </div>
            <div class="form-group mt-2">
            <label>select payment method</label>
               <select name="payment" id="" class="form-control">
                <option value="bank">bank transfer</option>
                <option value="paypal">paypal</option>
                <option value="paytm">paytm</option>
                <option value="COD">COD</option>
               </select>
            </div>
            <br>
            <button type="submit" name="confirm" class="btn btn-outline-primary mt-2">Submit</button>
            </form>
            </div>
        </div>
       </div> 
</body>
</html>