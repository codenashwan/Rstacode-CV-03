<?php
session_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'cv');
function x($data){
    global $db;
    $data = mysqli_real_escape_string($db , htmlspecialchars($data));
    return $data;
}


$input = "form-control form-control-lg radius-10 mt-2";

  if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
  }else if(isset($_SESSION['user'])){
    $userid = $_SESSION['user'];
  }

  if(isset($_GET['d']) && isset($admin)){
    $id = x($_GET['d']);
    mysqli_query($db , "DELETE FROM `person` WHERE `id` = '$id'");
    header("Location:index.php");
  }

  if(isset($_GET['like']) && isset($admin)){
    $personid = x($_GET['like']);
    mysqli_query($db , "UPDATE  `person` SET `is_pass` = 1 WHERE `id`= '$personid'");
    mysqli_query($db , "UPDATE `need` SET  `num_need` = `num_need`-1 ");
    header("Location:index.php");
  }else if(isset($_GET['unlike']) && isset($admin)){
    $personid = x($_GET['unlike']);
    mysqli_query($db , "UPDATE  `person` SET `is_pass` = 2 WHERE `id`= '$personid'");
    header("Location:index.php");
  }


  if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    unset($admin);
    unset($userid);
    header("Location:index.php");
  }

  function get_column($condition , $rowfunction , $status , $statusColumn){
    global $db ;
    $query = mysqli_query($db , "SELECT * FROM $condition");
    $num_rows = mysqli_num_rows($query);
    while($row = mysqli_fetch_assoc($query)){
      if($statusColumn == 1){
      echo $row[$rowfunction];
      }
    }
    if($status == 1){
      echo $num_rows;
    }
  }
?>