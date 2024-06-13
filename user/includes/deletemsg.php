<?php
require('../../connect.php');
if(isset($_GET['id'])) {
    $mid = $_GET['id'];
    echo"$mid";
    $sql = "DELETE FROM message WHERE mid = $mid";
    if(mysqli_query($conn, $sql)) {
        echo "Item with id = $mid deleted successfully.";
        header("location:../myaccount.php?my_message");
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
} else {
    echo "No 'mid' parameter provided.";
}
?>