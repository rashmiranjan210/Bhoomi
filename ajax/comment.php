<?php
session_start();
if(isset($_SESSION['blogid']))
{
    $id=$_SESSION['blogid'];
    require_once("../connect.php");
    $get_comments="select * from comment where blog_id=$id";
    $run_comments=mysqli_query($conn,$get_comments);
    if($run_comments-> num_rows > 0){ 
      $data = $run_comments->fetch_all(MYSQLI_ASSOC); 
      echo json_encode($data); 
  } else { 
    echo json_encode([]);
      }
}
?>
    