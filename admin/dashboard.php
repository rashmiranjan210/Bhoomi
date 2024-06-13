<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="mt-3"style="background-color:#edede9;">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
   <div class="col-lg-3 col-md-6">
    <div class="card text-dark " style="background-color:#edede9;">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <i class="bi bi-list-task"></i>
                </div>
                <div class="col-9 text-end">
                <div class="huge"><?php echo $count_pro; ?></div>
                <div class="huge">Product</div>
                 
                </div>
            </div>
        </div>
        <a href="index.php?view_product" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>

   <div class="col-lg-3 col-md-6">
    <div class="card " style="background-color:#ccd5ae;">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                <i class="bi bi-wechat"></i>
                </div>
                <div class="col-9 text-end">
                    <div class="huge"><?php echo $count_cust; ?></div>
                    <div class="huge">Customer</div>
                </div>
            </div>
        </div>
        <a href="index.php?view_customer" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>

   <div class="col-lg-3 col-md-6">
    <div class="card  text-dark" style="background-color:#faedcd" >
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                <i class="bi bi-cart4"></i>
                </div>
                <div class="col-9 text-end">
                    <div class="huge"><?php echo $count_cat; ?></div>
                    <div class="huge">View Categories</div>
                </div>
            </div>
        </div>
        <a href="index.php?view_product_categories" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>

   <div class="col-lg-3 col-md-6">
    <div class="card text-dark" style="background-color:#ffcad4" >
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                <i class="bi bi-backpack-fill"></i>
                </div>
                <div class="col-9 text-end">
                    <div class="huge"><?php echo $count_ord; ?></div>
                    <div class="huge text-dark">View Order</div>
                </div>
            </div>
        </div>
        <a href="index.php?view_order" class="card-footer text-white">
            <span class="float-start text-dark">View Details</span>
            <span class="float-end text-dark"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </a>
    </div>
   </div>

</div>


<div class="row mt-5 justify-content-center">
    <div class="col-lg-8">
    <div class="card  text-dark">
        <div class="card-body " style="background-color:#ccd5ae;">
           <h3>
           <i class="bi bi-basket"> Latest Order</i>
           </h3>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Order No:</th>
                <th>Customer Email:</th>
                <th>Invoice No:</th>
                <th>Quantity</th>
                <th>Date:</th>
                <th>Status:</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from orders order by 1 DESC LIMIT 0,5";
                $run_order=mysqli_query($conn,$get_order);
                while($row_order=mysqli_fetch_array($run_order)){
                    $order_id=$row_order['id'];
                    $usermail=$row_order['usermail'];
                    $invoice=$row_order['invoice'];
                    $quantity=$row_order['quantity'];
                    $order_date=$row_order['order_date'];
                    $order_status=$row_order['order_status'];

                ?>
                <tr>
                    <td><?php echo $order_id;  ?></td>
                    <td>
                        <?php
                        echo $usermail;
                        ?>
                    </td>
                    <td> <?php   echo $invoice;  ?></td>

                    <td><?php  echo $quantity;  ?></td>

                    <td><?php echo  $order_date;  ?></td>

                    <td><?php echo  $order_status;  ?></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="card-footer text-white text-end">
        <a href="index.php?view_order">View all order</a>
        <span class="float-end"><i class="fa fa-arrow-circle-right text-dark ms-4"></i></span>
        </div>
    </div>
    
    </div>

    <!-- <div class="col-md-4">
        <div class="card text-dark" >
            <div class="card-body" style="background-color:#faedcd">
                    <div class="thumb-info mb-md">
                        <img src="<?php echo "images" . "/" .$admin_image ; ?>"" alt="img" class="rounded img-responsive" height="90vh">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo $admin_name;  ?></span>
                            <span class="thumb-info-type"><?php echo $admin_job;  ?></span>
                        </div>
                    </div>
                    <div class="mb-md">
                        <div class="widget-content-expanded">
                        <i class="bi bi-envelope-fill"></i><span>Email:</span> <?php echo $admin_email;  ?> <br>
                        <i class="bi bi-envelope-fill"></i><span>Country:</span> <?php echo $admin_country;  ?> <br>
                        <i class="bi bi-envelope-fill"></i><span>Contact:</span> <?php echo $admin_contact;  ?> <br>
                        </div>
                        <br>
                        <h5>About</h5>
                        <p><?php echo $admin_about;  ?></p>
                    </div>
            </div>
        </div>
    </div> -->

</div>





<?php } ?>

