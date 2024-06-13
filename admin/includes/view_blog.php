<div class="row">
    <div class="col-lg-12">
    
    <h1 class="mt-3"style="background-color:#edede9;">Blogs</h1>
    <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Title:</th>
                <th>Body:</th>
                <th>Auther:</th>
                <th>Publish Date:</th>
                <th>email:</th>
                <th>image:</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from blog";
                $run_order=mysqli_query($conn,$get_order);
                while($row_order=mysqli_fetch_array($run_order)){
                    $order_id=$row_order['bid'];
                    $title=$row_order['title'];
                    $body=$row_order['body'];
                    $img=$row_order['img'];
                    $author=$row_order['auther'];
                    $publish=$row_order['publish'];
                    $email=$row_order['email'];

                ?>
                <tr>
                    <td>
                        <?php
                        echo $title;
                        ?>
                    </td>
                    <td> <?php   echo $body;  ?></td>

                    <td><?php echo  $author;  ?></td>

                    <td><?php echo  $publish;  ?></td>
                    <td><?php echo  $email;  ?></td>

                    <td><img src="<?php echo "../user/images". "/".$img;?>" alt="img" class="rounded img-responsive" height="90vh"></td>
                    <td class="btn btn-danger bg-danger text-white"><a href="includes/deleteblog.php?bid=<?php echo $order_id; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>