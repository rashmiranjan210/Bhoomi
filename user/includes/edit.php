<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require("../connect.php");
    $user_mail = $_SESSION['user_mail'];
    $sql = "SELECT * FROM user WHERE email='$user_mail'";
    $res = $conn->query($sql); 
        if ($res) {
            if ($res->num_rows > 0) {
                $user = $res->fetch_assoc();
            } else {
                echo "No user found with email: $user_mail";
            }
        } else {
            // Handle case when the query fails
            echo "Error executing query: " . $conn->error;
        }
    ?>
    <h6 class="text-center">Edit Your Account</h6>
    <div class="login pt-3 pb-3">
     <div class="d-flex justify-content-center align-item-center">
      <div class="box p-3">
        <form action="user/includes/update.php" method="POST" enctype="multipart/form-data" class="form py-2 px-4">
         <label class="form-label"> Your Name:</label><br>
         <input type="hidden" name="uid" value="<?php echo 
            $user['uid'] ?>"><br>
         <input class="form-control"required  type="text" name="name" value="<?php echo $user['name'] ?>" ><br>

         <label class="form-label"> Your Email:</label><br>
         <input class="form-control" required type="email" name="email"  value="<?php echo $user['email'] ?>"><br>

          <label class="form-label"> Your phone no:</label><br>
         <input class="form-control" required type="tel" name="phone"  value="<?php echo $user['phone'] ?>"><br>
 
         <span><label>Change Your Profile:</label><br>
         <input class="fs-5" type="file"  name="profile"></span><br><br>
         <img src="user/images/<?php echo $user['userimage']; ?>" style="height:50px;" ><br>
         <input class="btn btn-outline-dark d-block mx-auto fs-5" style="width:150px;color:black;" type="submit" value="Edit" name="submit">
        </form>
     </div>
    </div>
</body>
</html>