<div class="row">
<h1 class="mt-3"style="background-color:#edede9;">Blogs</h1>
<div class="col-md-4 ms-5 mt-5">
        <div class="card text-dark" >
            <div class="card-body" style="background-color:#faedcd">
                    <div class="thumb-info mb-md">
                        <img src="<?php echo "images" . "/" .$admin_image ; ?>"" alt="img" class="rounded img-responsive" height="120vh">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo $admin_name;  ?></span>
                            <span class="thumb-info-type"><?php echo $admin_job;  ?></span>
                        </div>
                    </div>
                    <div class="mb-md">
                        <div class="widget-content-expanded">
                        <i class="bi bi-envelope-fill"></i><span>Email:</span> <?php echo $admin_email;  ?> <br>
                        <i class="bi bi-house"></i><span>Country:</span> <?php echo $admin_country;  ?> <br>
                        <i class="bi bi-phone"></i><span>Contact:</span> <?php echo $admin_contact;  ?> <br>
                        </div>
                        <br>
                        <h5>About</h5>
                        <p><?php echo $admin_about;  ?></p>
                    </div>
            </div>
        </div>
    </div>

</div>


