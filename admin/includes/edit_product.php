<?php
    if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    // echo "ID is: $eid";
    $qry = "SELECT * FROM products WHERE pid=$pid";
    $res = $conn->query($qry);
    $pro = $res->fetch_assoc();
?>

<div class="row">   
    <div class="col-lg-12">
        <div>Edit Product</div>
    <form action="includes/update.php" method="POST" enctype="multipart/form-data" class="form py-2 px-4">
        <input type="text" value="<?php echo $pro['pid'] ?>" hidden name="pid" >
         <label class="form-label"> Catagory:</label><br>
         <input class="form-control"required  type="text" name="catagory" value="<?php echo $pro['catagory'] ?>">
         <label class="form-label"> title:</label><br>
         <input class="form-control" required type="text" name="title" value="<?php echo $pro['title'] ?>">
         <label class="form-label">brand:</label><br>
         <input class="form-control" required type="text" name="brand" value="<?php echo $pro['brand'] ?>">
         <label class="form-label"> price:</label><br>
         <input class="form-control" required  name="price" value="<?php echo $pro['price'] ?>"  type="number">

         <label class="form-label"> How to Use</label><br>
          <textarea name="howuse" id="" cols="25" rows="3" >
          <?php echo $pro['howuse'] ?>
          </textarea><br>
          <label class="form-label"> descprition</label><br>
          <textarea name="product_dsc" id="" cols="25" rows="3" >
          <?php echo $pro['product_dsc'] ?>
          </textarea><br>
          </textarea><br>
          <label class="form-label"> size:</label><br>
         <input class="form-control" required type="text" name="size" value="<?php echo $pro['size'] ?>" >
         <input class="btn btn-danger d-block mx-auto fs-5 " style="width:150px" type="submit" value="Edit" name="submit">
    </form>
    </div>
</div>
<?php
    }
 ?>









