<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            background: rgba(0,0,0,0.3);
            z-index: 10;
            border-radius:7px;
            border: 2px solid rgba(255,255,255,0.8);
            backdrop-filter:blur(7px);
            box-shadow: -20px 20px 20px rgba(10,10,10,0.25);}
    </style>
</head>
<body>
<?php
   $mail=$_SESSION['user_mail'];
    if(isset($_POST['submit'])) {

        $email =$_POST['email']; 
        $pass = $_POST['password'];
        $newPassword = $_POST['npassword'];
        require('../../connect.php');
        $qry = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $qry->bind_param("ss", $newPassword, $email);
        if($qry->execute()){ 
            $msg='your password has successfully changed';
            $msg = $conn->real_escape_string($msg);
            $sql = "INSERT INTO message (usermail,message,time) VALUES ('$email', '$msg', NOW())";
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            header("Location: ../myaccount.php?change=ok");
            exit(); 
        } else {
            echo "Error: " . $qry->error;
            header("Location: ../myaccount.php?change=not");
            exit(); 
        }
    }

    ?>
<div class="login pt-3">
        <div class="d-flex justify-content-center align-item-center">
            <div class="box p-3 w-50">
                <form action="user/includes/changepass.php" method="POST" class="form py-2 px-4"
                    onsubmit="return validate(event)">
                    <label class="form-label">Your Email:</label><br>
                    <h6 class="text-center"><?php echo $mail;?></h6>
                    <input class="form-control" required type="hidden" name="email" id="email">

                    <label class="form-label">Enter Your old Password:</label><br>
                    <input class="form-control" required type="password" name="password" id="password"><br>

                    <label class="form-label">Enter Your new Password:</label><br>
                    <input class="form-control" required type="password" name="npassword" id="npassword"><br>

                    <span id="passwordError" style="color: red;"></span><br> <!-- Error message placeholder -->
                    <input class="btn btn-outline-light d-block mx-auto fs-5" style="width:150px" type="submit"
                        value="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function validate(e) {
        try {
            let email=document.getElementById('email').value;
            console.log(email);
            let npassword = document.getElementById("npassword").value;
            let password = document.getElementById("password").value;
            let passwordError = document.getElementById("passwordError");
            let passPat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,16}$/;

            if (!password.match(passPat)) {
                passwordError.innerHTML =
                    "Please enter a strong password (8-16) with uppercase, lowercase, numbers, and special characters.";
                e.preventDefault();
            } else {
                passwordError.innerHTML = "";
            }
            if (password===npassword) {
                passwordError.innerHTML =
                    "Please enter a different password as new password";
                e.preventDefault();
            } else {
                passwordError.innerHTML = "";
            }
        } catch (error) {
            console.log(error);
            e.preventDefault();
        }
    }
    </script>
</html>