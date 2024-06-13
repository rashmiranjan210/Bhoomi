<?php
require_once 'connect.php';
if(isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $sql = "UPDATE cart
    SET quantity = quantity - 1
    WHERE id = $cid;
    ";
    if(mysqli_query($conn, $sql)) {
        echo "quantity updated successfully.";
        header("location:cart.php");
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
} else {
    echo "No 'cid' parameter provided.";
}
?>