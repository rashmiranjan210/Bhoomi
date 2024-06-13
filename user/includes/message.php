<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.box{
      padding: 2px 5px;
        margin-bottom:5px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
        box-sizing:border-box;
        background-color:#eeeeee;
    }
    </style>
</head>
<body>
   <?php
   require('../connect.php');
   $user_mail = $_SESSION['user_mail'];
   $sql = "SELECT mid,message, time FROM message WHERE usermail = '$user_mail'";
    $result = $conn->query($sql);
    echo "<div class=' mb-1'>";
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mid=$row["mid"];
        $current_date = date("Y-m-d", strtotime($row["time"]));
        echo "<div class='box mb-1'>";
        echo "<p class='fs-6 text-dark'>" . $row["message"] . "</p>";
        echo "<p class=' text-primary mt-1'>" . $current_date . "<a href='user/includes/deletemsg.php?id=$mid' class='btn btn-primary ms-3'><i class='bi bi-x-lg'></i></button></a>";
        // echo"<button class='btn btn-primary float-right'><i class='bi bi-x-square-fill'></i></button>";
        echo "</div>";
    }
    } else {
    echo "0 results";
    }

    echo "</div>";
    
   ?>
</body>
</html>

