<?php
  if(isset($_POST['update']) && isset($admin)){
    $id = x($_POST['id']);
    $name = x($_POST['name']);
    $age = x($_POST['age']);
    $job = x($_POST['job']);
    
    $query = mysqli_query($db , "UPDATE `person` SET `name`='$name' , `age`='$age' , `job`='$job' WHERE `id` = '$id'");
    if($query){
      header("Location:index.php");
    }
      
    }
    ?>