<div class="row">
    <div class="col-lg-12">
    <h1 class="mt-3"style="background-color:#edede9;">Order</h1>

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
                $get_order="select * from orders";
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
    </div>
</div>