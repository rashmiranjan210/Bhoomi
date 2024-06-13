<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script> window.open('login.php','_self')</script> ";
    }
    else{

?>



<div class="container-fluid col-md-3 ms-0 col-lg-3 " style="height:100vh;width:auto;">
  <div class="row ">
    <!-- Sidebar -->
    <div class=" sidebar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 top-nav" style="height:100vh; gap:20px;">
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>

        <li class="nav-item dropdown text-center">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" id="products">
            <li><a class="dropdown-item" href="index.php?insert_product">Insert Product</a></li>
            <li><a class="dropdown-item" href="index.php?view_product">View Product</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown text-center">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products Categories
          </a>
          <ul class="dropdown-menu" id="productsCategories">
            <li><a class="dropdown-item" href="index.php?insert_product_categories">Insert Product Categories</a></li>
            <li><a class="dropdown-item" href="index.php?view_product_categories">View Product Categories</a></li>
          </ul>
        </li>

      

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Slider
          </a>
          <ul class="dropdown-menu" id="slider">
            <li><a class="dropdown-item" href="index.php?insert_slider">Insert Slider</a></li>
            <li><a class="dropdown-item" href="index.php?view_slider">View slider</a></li>
          </ul>
        </li> -->

        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_customer">View Customer</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_order">View Order</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_payment">View Payment</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link active" aria-current="page" href="index.php?view_blog">View Blog</a>
        </li>
        
      </ul>
    </div>
  </div>
</div>


<?php } ?>