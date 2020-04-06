<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="assets/lib/app.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white m-2 radius-10 shadow-sm">
  <a class="navbar-brand" href="#"><img src="assets/img/logo.svg" width="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link btn btn-light m-1" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-light m-1" href="login.php">Login</a>
      </li>
      <?php
      if(isset($_SESSION['admin']) || isset($_SESSION['user'])){
        echo '<li class="nav-item btn btn-light m-1"><a class="text-danger" href="?logout">Logout</a></li>';
      }?>
    </ul>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="form-inline my-2 my-lg-0 justify-content-center">
      <input name="search" class="form-control form-control-lg mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button  class="btn btn-secondary btn-lg my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>