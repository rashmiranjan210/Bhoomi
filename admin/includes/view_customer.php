<div class="row">
    <div class="col-lg-12">
    <h1 class="mt-3"style="background-color:#edede9;">Customer</h1>

    <table class="table table-bordered table-hover table-striped">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>City</th>
                <th>Adress</th>
                <th>phone</th>
                <th>pin</th>
            </tr>
            <tbody>
                <?php
                $get_order="select * from user";
                $run_order=$conn->query($get_order);
                $i=1;
                while($row_order= $run_order->fetch_assoc()){
                    $uid=$row_order['uid'];
                    $name=$row_order['name'];
                    $email=$row_order['email'];
                    $country=$row_order['country'];
                    $city=$row_order['city'];
                    $address=$row_order['address'];
                    $phone=$row_order['phone'];
                    $pin=$row_order['pin'];
                   
                ?>
                <tr>
                    <td><?php
                     echo $i; ?></td>
                    <td>
                        <?php
                        echo $name
                        ?>
                    </td>
                    <td> <?php   echo $email;  ?></td>

                    <td><?php  echo $country;  ?></td>

                    <td><?php echo  $city;  ?></td>
                    <td><?php echo  $address;  ?></td>
                    <td><?php echo  $phone;  ?></td>
                    <td><?php echo  $pin;  ?></td>

                   

                </tr>
                <?php $i=$i+1; } 
                ?>
            </tbody>
        </table>
    </div>
</div>