<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cartdetails,.box{
        padding: 4px 15px;
        margin-bottom:5px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
        box-sizing:border-box;
        }
        .box-footer,.box-header{
            background-color:#f7f7f7;
            border:2px solid #eeeeee;
        }
        .table tr td{
            vertical-align:middle;
        }
        .box .box-footer:before,.box .box-footer:after{
            content:"";
            display:table;
        }
    </style>
</head>
<body>
    <?php
    include_once("nav.php");
    include_once("function.php");
    $cart_items=$_SESSION['cart_count'];
    if(!isset($_SESSION['user_mail']))
    {
    echo "<script>window.open('user/login.php', '_self');</script>";
    exit;

    }elseif($cart_items==0)
    {
        ?>
            <div class="box p-3 mt-3 w-50 mx-auto">
                <h2 class="text-center fw-bold text-dark">your cart is empty</h2>
                <a href='shop.php' class="btn btn-outline-primary d-block mx-auto mt-2 w-25">shop now</a>
            </div>

        <?php
        exit;
      
    }
    else{
        $usermail=$_SESSION['user_mail'];
        ?>
        <div class="cartcontent mt-4">
            <div class="container">
                <div class="row">
                    <!-- filter include -->
                <?php
                include_once"includes/filter.html";
                ?>
                 <!-- filter include -->
                </div>
            <!-- cart section strnatcasecmp -->
            <div class="row mt-3">
                    <!-- firstdiv start -->
                    <div class="col-md-9 cartdetails col-sm-12">
                        <div class="cartform">
                            <form action="cart.php" method="post" enctype="multipart-form-data">
                            <h2 id="cartheading">Shopping Cart</h2>
                        <p id="cartddata text-center fs-3 mt-2">
                            currently you have <?php echo $cart_items;?> items in <i class="bi bi-cart"></i>
                        </p>
                        <div class="carttable .table-responsive-md">
                        <!-- cart table -->
                        <table class="table table-striped w-100">
                        <thead>
                            <tr>
                            <th scope="col">Product</th>
                            <th scope="col" colspan="2">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Size</th>
                            <th scope="col" colspan="1">Delete</th>
                            <th scope="col" colspan="1">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sumtotal=0;
                        require_once("connect.php");
                        $qry="SELECT 
                        p.pid,
                        p.img1,
                        p.title,
                        p.price,
                        c.quantity,
                        c.size,
                        c.totprice,
                        c.id
                    FROM 
                        products p
                    JOIN 
                        cart c ON p.pid = c.pid
                    WHERE 
                        c.usermail = '$usermail'
                    ";
                $run_cart=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($run_cart))
                {
                $pid=$row['pid'];
                $img=$row['img1'];
                $price=$row['price'];
                $title=$row['title'];
                $quantity=$row['quantity'];
                $qua= intval($quantity);
                $size=$row['size'];
                $cid=$row['id'];
                $tot=$qua*$price;
                $sumtotal+=$tot;
                ?>
                 <tr>
                        <td>
                            <img src=" admin/images/<?php echo $img;?>" alt="" style="width:30px">
                        </td>
                        <td colspan="2"><?php echo "$title";?></td>
                        <td><a href="minusqun.php?cid=<?php echo "$cid"?>" style="text-decoration:none"><i class="bi bi-dash btn"></i></a><b class="qun"><?php echo "$qua";?></b><a href="plusqun.php?cid=<?php echo "$cid"?>"style="text-decoration:none"><i class="bi bi-plus-lg btn "></i></a></td>
                        <td><?php echo "$price";?> INR</td>
                        <td><?php echo "$size";?></td>
                        <td colspan="1"><a href="deletecart.php?cid=<?php echo "$cid"?>"  class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a></td>
                        <td colspan="1"><?php echo "$tot";?> ₹</td>
                        </tr>
            <?php
                }
              ?>
              </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Sum Total</th>
                                <th colspan="2"><?php echo "$sumtotal";?>INR</th>
                            </tr>
                        </tfoot>
                        </table>
                        <!-- cart table ends -->
                        </div>
                        <!-- coupenwork -->
                            <div class="box-footer d-flex align-items-center justify-content-between">
                                <div class="text-start">
                                    <!-- left button start -->
                                    <a href="shop.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left"></i>continue shopping</a>
                                </div>
                                     <!-- left button end -->
                                <div class="text-end">
                                         <!-- <button class="btn btn-outline-dark" type="submit" name="cart_update" value="update cart"><i class="bi bi-pencil-square"></i>update cart</button> -->
                                         <a href="cash.php" class="btn btn-outline-dark ms-2">proceed To Checkout<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        <!-- couponwork -->
                            </form>
                        </div>
                    </div>
                    <!-- firstdiv ends -->
                    <!-- order summary start -->
                    <divv class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order Summary</h3>
                            </div>
                            <p id="orderpara">
                               shipping costs is constant and discount are calculated based on the values you have entered 
                            </p>
                           <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order Sumtotal</td>
                                        <th>INR <?php echo "$sumtotal";?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <td>INR 60</td>
                                    </tr>
                                    <tr>
                                        <td>discount</td>
                                        <td><?php
                                        if($sumtotal<=500)
                                        {
                                            $discount=0; 
                                          echo"0";
                                        }else
                                        {
                                            $discount=0.1*$sumtotal;
                                            echo $discount;
                                            $msg="congo, you are getting a discount of ₹".$discount;
                                        }
                                        ?></td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>INR <?php 
                                        if($sumtotal<=500)
                                        {
                                          echo ($sumtotal+60);
                                        }else
                                        {
                                            $discount=0.05*$sumtotal;
                                            echo (($sumtotal+60)-$discount);
                                        }
                                        ?> </th>
                                    </tr>
                                </tbody>
                            </table>
                           </div>
                        </div>
                    </divv>
                    <!-- order summary start -->
                </div>
            </div>
            <!-- container ends -->


            <?php
            if(isset($msg))
            {
                $hlw=$msg;
                notification($hlw);

            }
            include_once"includes/footer.html";
            ?>
        </div> 
        <!-- cartcontent --> 
    <?php

    }  
    ?>
</body>
</html>