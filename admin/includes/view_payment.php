<div class="row">
    <div class="col-lg-12">
    <h1 class="mt-3"style="background-color:#edede9;">Payment</h1>
    <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Invoice No:</th>
                <th>Net Amount:</th>
                <th>Mode:</th>
                <th>Date:</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from payment";
                $run_order=mysqli_query($conn,$get_order);
                while($row_order=mysqli_fetch_array($run_order)){
                    $order_id=$row_order['pid'];
                    $invoice_no=$row_order['invoice_no'];
                    $net=$row_order['net'];
                    $mode=$row_order['mode'];
                    $date=$row_order['date'];

                ?>
                <tr>
                    <td>
                        <?php
                        echo $invoice_no;
                        ?>
                    </td>
                    <td> <?php   echo $net;  ?></td>

                    <td><?php echo  $mode;  ?></td>

                    <td><?php echo  $date;  ?></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>