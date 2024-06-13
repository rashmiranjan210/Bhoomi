<?php
require_once 'connect.php';
if(isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $sql = "DELETE FROM cart WHERE id = $cid";
    if(mysqli_query($conn, $sql)) {
        echo "Item with id = $cid deleted successfully.";
        header("location:cart.php");
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
} else {
    echo "No 'cid' parameter provided.";
}
?>
