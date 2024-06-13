<?php
// Include the connection file
require('../connect.php');


if(isset($_GET['id'])) {
  
    $pid = $_GET['id'];

   
    $sql = "DELETE FROM wishlist WHERE product_id = $pid";

    if(mysqli_query($conn, $sql)) {
        echo "Item with id = $cid deleted successfully.";
        header("location:myaccount.php");
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
} else {
    echo "No 'cid' parameter provided.";
}

// Close the connection
$conn->close();
?>
