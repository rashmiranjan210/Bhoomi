<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>


<nav class="navbar " style="background-color:#f2e8cf;">
  <div class="container-fluid">
    <a class="navbar-brand">Admin Panel</a>
    
    <ul class="me-5 nav-end">
            <li class="nav-ite dropdown nav-drop">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Rashmiranjan 
            </a>
            <ul class="dropdown-menu me-5"  aria-expanded="true">
            <li>
                    <a href="index.php?admin_profile"  class="dropdown-item ">
                        <i class="fa fa-fw fa-user"></i> Profile
                    </a>
                </li>
                
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a href="includes/logout.php" >Logout</a>
                    <i class=" fa fa-fw fa-power-off"></i>
                </li>
                
            </li>
        </ul>
  </div>
</nav>

<?php } ?>