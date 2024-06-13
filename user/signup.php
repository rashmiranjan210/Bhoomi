<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost:8888/bhoomicopy/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
    <style>
        .login{
            background-color:white;
        }
        .box{
            width:75vw;
            background: rgba(255,0,0,0.6);
            z-index: 10;
            border-radius:7px;
            border: 2px solid rgba(255,255,255,0.8);
            backdrop-filter:blur(7px);
            box-shadow: -20px 20px 20px rgba(10,10,10,0.25);
}
        .error{
            color:red;
        }
    </style>
</head>
<body>
<?php
  include_once("../nav.php");
  ?>
  <div class="login pt-3 pb-3">
        <div class="d-flex justify-content-center align-item-center">
         <div class="box p-3">
           <form action="user/signup.php" method="POST" enctype="multipart/form-data" class="form text-dark fw-bold py-2 px-4" onsubmit="validate(event)">
            <div class="container">
                <div class="row">

                <div class="col-md-6">
            <label>Enter Your Name:</label>
            <input class="form-control"   type="text" name="name" id="name">
            <label id="nameError" class="error"></label><br>
            <label>Enter Your Email:</label>
            <input class="form-control"  type="email" name="email" id="email">
            <label id="emailError" class="error"></label><br>
            <label>Enter Your state:</label>
            <input class="form-control"  type="text" name="country" id="country">
            <label id="countryError" class="error"></label><br>
            <label>Enter Your city:</label>
            <input class="form-control"  type="text" name="city" id="city">
            <label id="cityError" class="error"></label><br>
            <label>Enter Your full address:</label><br>
             <textarea name="address" cols="25" rows="3" id="address" name="address">
   
             </textarea><br>
             <label id="addressError" class="error"></label><br>
            </div>

            <!-- ------------------------ -->
            <div class="col-md-6">
            <label>Enter Your phone no:</label>
            <input class="form-control"  type="text" name="phone" id="phone">
            <label id="mobileError" class="error"></label><br>
            <label>Enter Your pin:</label>
            <input class="form-control"  type="text" name="pin" id="pin">
            <label id="pinerror" class="error"></label><br>
            <label>Enter Your Password:</label>
            <input class="form-control"   type="password" name="password" id="password">
            <label id="passwordError" class="error"></label><br>
            <label>Confirm Your Password:</label>
            <input class="form-control"   type="password" name="cpassword" id="cpassword"><br>
            <label id="cpasswordError" class="error"></label><br>
            <span><label>Upload Your Profile:</label>
            <input class="fs-5" type="file"  name="profile"></span><br><br>
            <input class="btn btn-outline-dark d-block mx-auto fs-5 " style="width:150px" type="submit" value="Register" name="submit">
            </div>

            </div>
            </div>
            </form>
           <p class=" text-light text-center">Already Have An account? <a href="user/login.php" style="text-decoration:none;" class="btn btn-outline-dark">Log_In</a></p>
         </div>
        </div>
       </div>
   <script src="user/userjs/signup.js"></script>
</body>
</html>
<?php

        if(isset($_POST['submit'])){
       
        require_once "../connect.php";
     
        $name = $_POST['name'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $pin = $_POST['pin'];
        $password = $_POST['password'];
        $profile=$_FILES['profile'];

        $imagename=$profile['name'];
        $path="images"."/".$imagename;
        if(move_uploaded_file($profile['tmp_name'],$path)){
            echo "image upload succesfully";

        $qry = "INSERT INTO user(name, email, country, city, 
        address, phone, pin, password,userimage) VALUES('$name', '$email', '$country', 
        '$city', '$address', $phone , $pin , '$password','$imagename')";
   
        $res = $conn->query($qry);
    
        if($res){
        echo "One Record Inserted";
        header('location:login.php');
        } else {
        echo "Error: ".$conn->error;
        }

        }
        }



?>
