<?php
require('../../connect.php');
if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if(isset($_FILES['profile']['tmp_name']) && !empty($_FILES['profile']['tmp_name']))
    {
        $profile=$_FILES['profile'];
        $imagename=$profile['name'];
        $path="../images/".$imagename;
        move_uploaded_file($profile["tmp_name"],$path) or die("Error in uploading image"); 
        $qry = "UPDATE user SET name='$name', email='$email', phone=$phone, userimage='$imagename' WHERE uid=$uid";

    }
    else{
        $qry = "UPDATE user SET name='$name', email='$email', phone=$phone WHERE uid=$uid";
    }
    if($conn->query($qry)){
        // echo"syccessful";    
    header("location:../myaccount.php?update_acc=ok");
    } else {
    header("location:../myaccount.php?update_acc=error");
    // echo $conn->error;
    }
    }
    ?>
    
    