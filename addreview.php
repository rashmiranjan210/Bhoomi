<?php
require_once"connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $usermail = $_POST['usermail'];
    $rating = $_POST['rating'];
    $message = $_POST['review'];
    $productid = $_POST['productid'];
    $sql = "INSERT INTO review (username, usermail, rating, message, productid, reviewtime)
            VALUES ('$username', '$usermail', '$rating', '$message', '$productid', NOW())";
    if ($conn->query($sql) === TRUE) {
       header("location:details.php?id=$productid&status=ok");
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("location:details.php?id=$productid&status=not");
    }
}
$conn->close();
?>