<?php
    session_start();
    include("includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="admin_password" name="admin_password"placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="admin_login">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="forgot-password.php">Forgot password?</a>
                        </div>
                        <div class="text-center mt-2">
                            <span>Don't have an account? <a href="register.html">Sign up</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
    if(isset($_POST['admin_login'])){
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        $qry="select * from admin where admin_email ='$admin_email' AND admin_password='$admin_password'";
        

        $res=$conn->query($qry);
        if($res->num_rows>0){
            $_SESSION['admin_email']=$admin_email;
            echo '<script>';
            echo 'alert("login Success")';
            echo '</script>';
            echo "<script>window.open('index.php?dashboard','_self') </script>";

            // header("location:myaccount.php?my_order");
        }else{
            echo '<script>';
            echo 'alert("error")';
            echo '</script>';
            $msg="error";
        }

    }


?>