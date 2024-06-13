<?php
session_start(); // Start the session

if(isset($_POST['submit'])){
    $order=$_POST['order'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $pin = $_POST['pin'];
    require('../../connect.php');
    $user_mail = $_SESSION['user_mail'];

    $qry = "UPDATE user SET city='$city',country='$state',address='$address',pin=$pin WHERE email='$user_mail'";

    if($conn->query($qry)){
        if($order==1)
        {
            header("location:../../checkout.php ?");
        }else
        {
            header("location: ../myaccount.php?update_address=ok");
        }
        
    } else {
        header("location:../myaccount.php?update_address=error");
    }
}
?>