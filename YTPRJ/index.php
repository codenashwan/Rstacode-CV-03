<?php include 'includes/nav.php';include 'includes/search.php'?>
<div class="container bg-light radius-10 shadow-sm p-3">


<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/like.svg" width="40" alt=""> Accept
<img src="assets/img/unlike.svg" width="40" alt=""> Ignore
<img src="assets/img/waiting.svg" width="40" alt=""> Waiting
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/needed.svg" width="40" alt=""> <?php get_column("need" , "num_need"  , 0 , 1);?> Person Need !
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/like.svg" width="40" alt=""> <?php get_column("person WHERE `is_pass` = 1", "is_pass" , 1 , 0);?> 
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/unlike.svg" width="40" alt=""> <?php get_column("person WHERE `is_pass` = 2", "is_pass" , 1 , 0);?>
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/waiting.svg" width="40" alt=""> <?php get_column("person WHERE `is_pass` = 0", "is_pass" , 1 , 0);?>
</div>


  <div class="row m-3 justify-content-center">
    <?php
include 'includes/update.php';
 $query = mysqli_query($db, "SELECT * FROM `person` p JOIN `type_job` tj ON p.job_id = tj.job_id ORDER BY p.id DESC");
include 'includes/card.php';
  ?>
  </div>
</div>