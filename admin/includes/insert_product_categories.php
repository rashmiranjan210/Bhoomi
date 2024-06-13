<div class="row">
    <div class="col-lg-12">
    <h1 class="mt-3"style="background-color:#edede9;">Add New Product CatagoryView Product</h1>

        <form action="includes/insert_product_categories.php" method="POST" >
            <input type="text" name="catagory" id="catagory" placeholder="write new catagory">
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
   $cat_name=$_POST['catagory'];
   include("./db.php");
   $qry = "INSERT INTO catagory(cat_name) VALUES('$cat_name')";
    $res = $conn->query($qry);
        if($res){
            echo "One Record Inserted";
            echo "<script>window.open('../index.php?insert_product_categories','_self') </script>";
            // header('location:login.php');
            } else {
            echo "Error: ".$conn->error;
            }
            // Close Connection
            $conn->close();
}


?>