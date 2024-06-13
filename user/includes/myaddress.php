<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .login {
      display: none; 
    }
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
<h1>MY ADDRESS</h1>
    <?php
        require('../connect.php');
        $user_mail = $_SESSION['user_mail'];  
        $sql = "SELECT * FROM user WHERE email='$user_mail'";
        $res = $conn->query($sql);
        if ($res) {
            if ($res->num_rows > 0) {
                $user = $res->fetch_assoc();
                $name=$user['name'];
                $state=$user['country'];
                $city=$user['city'];
                $home=$user['address'];
                $phone=$user['phone'];
            } else {
                echo "No user found with email: $user_mail";
            }
        } else {
            echo "Error executing query: " . $conn->error;
        }
        if($_GET['order'])
        {
          $order=$_GET['order'];
        }
        ?>
        <div class="address">
          <p class="ms-3 fs-5">
            <span class="text-danger">House No/Street:</span><?php echo $home ?><br>
            <span class="text-danger">City:</span><?php echo $city?><br>
            <span class="text-danger">State:</span><?php echo $state ?><br>
            <span class="text-danger">Country:</span><?php echo "India" ?><br>
            <span class="text-danger">Phone No:</span><?php echo $phone ?><br>
          </p>
        </div> 
        <a class=" btn btn-outline-danger d-block mx-auto w-25" onclick="toggleLoginDiv()">Edit Your address</a>
  <div class="login pt-3 pb-3">
    <div class="d-flex justify-content-center align-item-center">
      <div class="box p-3">
        <form action="user/includes/address.php" method="POST" class="form py-2 px-4">
          <input type="hidden" name="order" value="<?php echo $order ?>">
          <label class="form-label">Your city:</label><br>
          <input class="form-control" required type="text" name="city" value="<?php echo $user['city'] ?>"><br>
          <label class="form-label">Your state:</label><br>
          <input class="form-control" required type="text" name="state" value="<?php echo $user['country'] ?>"><br>
          <label class="form-label">Your full address:</label><br>
          <textarea name="address" id="address" cols="25" rows="3"><?php echo $user['address'] ?></textarea><br>
          <label class="form-label">Your pin:</label><br>
          <input class="form-control" required type="text" name="pin" value="<?php echo $user['pin'] ?>"><br>
          <input class="btn btn-outline-dark d-block mx-auto fs-5" style="width:150px;color:black;" type="submit" value="save" name="submit">
        </form>
      </div>
    </div>
  </div>
  <script src="user/userjs/myaddress.js"></script>
</body>
</html>