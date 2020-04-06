<?php
if(isset($_GET['search'])){
  $data = x($_GET['search']);
  $query = mysqli_query($db , "SELECT * FROM `person` WHERE `name` LIKE '%$data%' OR `age` = '$data' ");
  if(mysqli_num_rows($query) > 0){?>
  <div class="container bg-light radius-10 shadow-sm p-3">
  <div class="row m-3 justify-content-center">
    <?php include 'card.php';?>
  </div>
  </div>
  <?php
  }else{
    echo "<p class='p-4 text-center text-danger container m-auto'>هیچ داتایەک نییە</p>";
  }

exit();

}
?>
