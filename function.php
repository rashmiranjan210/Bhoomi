<?php 
function notification($x)
{
  ?>
    <div class="alert alert-danger mt-2 mx-auto w-50" role="alert" id="notify">
    <h6 class="text-dark d-inline"><?php echo $x?></h6>
    <button class="btn btn-primary ms-1 d-inline" onclick="document.getElementById('notify').style.display = 'none';">ok</button>
    </div>
  <?php
}
?>
