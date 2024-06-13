<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost:8888/bhoomi/">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body> -->
    <div class="add">
        <div class="container">
           
            <h1 class="text-danger mt-3">Add your products here</h1>
            <div class="addform">
                <form action="product.php" method="post" enctype="multipart/form-data" class="form text-dark py-2 px-4">
                    <div class="container">
                        <div class="row">
                            <!-- first part -->
                            <div class="col-md-6">
                                <label for="">select catagory</label><br><br>
                                <select name="catagory" id="" >
                                    <option value="PERIOD CARE">PERIOD CARE</option>
                                    <option value="PREGENCY CARE">PREGENCY CARE</option>
                                    <option value="TOILET HYGIENE">TOILET HYGIENE</option>
                                    <option value="NUTRITION">NUTRITION</option>
                                    <option value="PERSONAL SAFETY">PERSONAL SAFETY</option>
                                </select><br>
                                <label for="">enter product title</label><br>
                                <input type="text" name="title" id=""><br>
                                <label for="">select brand name</label><br>
                                <select name="brand" id="" >
                                    <?php
                                    require_once"../connect.php";
                                    $qry = "SELECT * FROM brand";
                                    $res = $conn->query($qry);
                                    while($bnd= $res->fetch_assoc()){
                                    $k=$bnd["brand_name"];
                                    echo"<option value='$k'>$k</option>";
                                     }
                                    ?>
                                </select><br>
                                <label for="">enter stock</label><br>
                                <input type="text" name="stock" id=""><br>
                                <label for="">enter ratings</label><br>
                                <input type="text" name="rating" id=""><br>
                                <label for="">select the sizes</label><br>
                                <input type="radio" name="size" id="">L
                                <input type="radio" name="size" id="">XL
                                <input type="radio" name="size" id="">XXL
                                <input type="radio" name="size" id="">Not needed
                               <br>
                                <label for="">enter price</label><br>
                                <input type="text" name="price" id=""><br>
                                <label for="">product descprition</label><br>
                                <textarea name="desc" cols='30'></textarea>
                            </div>
                              <!-- first part -->
                              <!-- SECOND PART START -->
                              <div class="col-md-6">
                                <label for="">product benefits</label><br>
                                <textarea name="benefit" cols='30'></textarea>

                                </textarea><br>
                                <label for="">How To Use</label><br>
                                <textarea  name="how" cols='30'></textarea>
                                </textarea><br>
                                <label for="">enter product images</label><br>
                                <input type="file" name="img1" id=""><br>
                                <input type="file" name="img2" id=""><br>
                                <input type="file" name="img3" id=""><br>
                              </div>
                               <!-- SECOND PART START -->
                               <button type="submit" name="add_product" class="btn btn-outline-dark btn-lg d-block mx-auto mt-2 w-25">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         
    </div>
    <?php
     if(isset($_POST['add_product'])){
        require_once"../connect.php";
        $catagory=$_POST['catagory'];
        $title=$_POST['title'];
        $brand=$_POST['brand'];
        $stock=$_POST['stock'];
        $rating=$_POST['rating'];
        $product_size=$_POST['size'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $benefit=$_POST['benefit'];
        $how=$_POST['how'];
        $image1=$_FILES['img1'];
        $image2=$_FILES['img2'];
        $image3=$_FILES['img3'];
        $temp_name1=$image1['name'];
        $temp_name2=$image2['name'];
        $temp_name3=$image3['name'];
        $path1="images"."/".$temp_name1;
        $path2="images"."/".$temp_name2;
        $path3="images"."/".$temp_name3;
        if(move_uploaded_file($image1['tmp_name'],$path1)){
        
        }
        if(move_uploaded_file($image2['tmp_name'],$path2)){
      
        }
        if(move_uploaded_file($image3['tmp_name'],$path3)){
  
        }
        $qry = "INSERT INTO products(catagory,title,img1,brand,date,stars,price,stocks,benefit,howuse,product_dsc,size,img2,img3) VALUES('$catagory', '$title', '$temp_name1', 
        '$brand',NOW(),$rating,$price ,$stock ,'$benefit','$how','$desc','$product_size','$temp_name2','$temp_name3')";

        $res = $conn->query($qry);
        if($res){
            echo "One Record Inserted";
            echo "<script>window.open('index.php?insert_product','_self') </script>";
            // header('location:login.php');
            } else {
            echo "Error: ".$conn->error;
            }
            // Close Connection
            $conn->close();
    }
    ?>
    <script>
    </script>
<!-- </body>
</html> -->