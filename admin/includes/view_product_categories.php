<div class="row">
    <div class="col-lg-12">
    <h1 class="mt-3"style="background-color:#edede9;">Product Category</h1>
    <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Catagory</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from catagory";
                $run_order=$conn->query($get_order);
                $i=1;
                while($row_order= $run_order->fetch_assoc()){
                    $cid=$row_order['cid'];
                    $product_catagory=$row_order['cat_name'];
                   
                ?>
                <tr>
                    <td><?php
                     echo $i; ?></td>
                    <td>
                        <?php
                        echo $product_catagory
                        ?>
                    </td>
                    <td class="btn btn-danger bg-danger"><a href="includes/delete_product_catagory.php?id=<?php echo $cid; ?>"> Delete</a></td>

                </tr>
                <?php $i=$i+1; } 
                ?>
            </tbody>
        </table>
    </div>
</div>