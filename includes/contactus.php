<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/contactus.css">
    <title>Document</title>
</head>
<body>
    <div class="contact mt-4">
        <div class="container">
            <div class="row">
            <h3 class="text-center text-danger">If you have any queries,feel free to contact us</h3>
                <form action="aboutus.php" method="post" class="form w-100 mx-auto">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Message Please</label>
                        <textarea name="message" id="" cols="15" rows="7" class="form-control">
                             
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-danger d-block mx-auto submit" name="contact">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_POST['contact']))
    {
        $mail=$_POST['email'];
        $name=$_POST['fullname'];
        $message=$_POST['message'];
        $receivermail="swayanprabhapanda993@gmail.com";
        mail($receivermail,$name,$message,$mail);
        $sub="Thank yOu for connecting us.we will get back to you";
        mail($mail,$sub,$receivermail);
        echo"your mail has been sent";
    }
    ?>
    <h2></h2>
</body>
</html>
