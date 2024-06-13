<?php
 $servername = "127.0.0.1";
 $username = "root";
 $password = "";
 $dbname = "bhoomi";
 try {
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 if($conn->connect_error){
 die("Database Connection Error: ".$conn->connect_error);
 }
 echo "";
 } catch (Exception $e){
 die("Check Database Credentials<br>".$e->getMessage());
 }
 ?>
