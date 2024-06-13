<div class="row">
    <div class="col-md-12">
    <h1 class="mt-3"style="background-color:#edede9;">View Product</h1>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>No</th>
                <th>Categories</th>
                <th>title</th>
                <th>price</th>
                <th>Stock</th>
                <th>Image</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from products";
                $run_order=$conn->query($get_order);
                $i=1;
                while($row_order= $run_order->fetch_assoc()){
                    $pid=$row_order['pid'];
                    $product_catagory=$row_order['catagory'];
                    $product_title=$row_order['title'];
                    $product_price=$row_order['price'];
                    $product_stock=$row_order['stocks'];
                    $product_image=$row_order['img1'];
                   
                ?>
                <tr>
                    <td><?php
                     echo $i; ?></td>
                    <td>
                        <?php
                        echo $product_catagory
                        ?>
                    </td>
                    <td> <?php   echo $product_title;  ?></td>

                    <td><?php  echo $product_price;  ?></td>

                    <td><?php echo  $product_stock;  ?></td>

                    <td> <img src="<?php echo "images" . "/" .$product_image ; ?>"" alt="img" class="rounded img-responsive" height="90vh"></td>
                    <td class="btn bg-warning btn-warning"><a href="./index.php?pid=<?php echo $pid; ?>"> update</a></td>
                    <td class="btn btn-danger bg-danger"><a href="includes/delete_product.php?id=<?php echo $pid; ?>"> Delete</a></td>

                </tr>
                <?php $i=$i+1; } 
                ?>
            </tbody>
        </table>
    </div>
</div>