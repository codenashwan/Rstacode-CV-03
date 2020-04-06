<?php include 'includes/nav.php';?>

<?php

if(isset($_POST['adminlogin'])){
$username = x($_POST['username']);
$password = x($_POST['password']);

if(empty($username) || empty($password)){
    header("Location:login.php");
}else{
$password = hash('gost' , $password);
$query = mysqli_query($db , "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'");
echo  "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
if(mysqli_num_rows($query) == 1){
    while($row = mysqli_fetch_assoc($query)){
        $_SESSION['admin'] = x($row['id']);
        $_SESSION['username']  =x($row['username']);
    }
    header("Location:index.php");
}else{
    header("Location:login.php");

}
}
}

?>
<?php
if(isset($_POST['userlogin'])){
$name = x($_POST['name']);
$age = x($_POST['age']);
$job = x($_POST['job']);
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileType = $file['type'];
$fileError = $file['error'];
$fileSize= $file['size'];

if(empty($name) || empty($age) || empty($job)){
    header("Location:index.php");
}else{

    $fileExt = explode('.' , $fileName );
    $fileActualExt = strtolower(end($fileExt));
    $fileAllow = ['jpg' , 'jpeg' , 'pdf' , 'png'];
    if(in_array($fileActualExt , $fileAllow)){
   if($fileError === 0){
   if($fileSize < 100000000*10){
     $fileNewName = rand().rand().rand().".".$fileActualExt;
     $fileDestinition= "upload/$fileNewName";
     move_uploaded_file($fileTmpName , $fileDestinition);
     $query = mysqli_query($db , "INSERT INTO `person`(`name`,`age`,`job_id`,`is_pass` ,`file_cv`) VALUES ('$name','$age','$job',0,'$fileNewName')");
     if($query){
         header("Location:index.php");
     }else{
         echo mysqli_error($db);
     }
   }else{
       exit("فایلەکە قەبارەی گەورەیە");
   }
   }else{
       exit("تکایە فایلێکی تر دابنێ");
   }
    }else{
        exit("فایلەکە گونجاو نییە");
    }







}
}

?>

<div class="container text-center mt-4 bg-light p-4">
<img src="assets/img/user.svg" class="userbtn m-3" width="200" alt="">
<img src="assets/img/company.svg" class="companybtn m-3" width="200" alt="">
<div class="row justify-content-center">
    <form action="login.php" method="POST" class="company d-none m-2 col-lg-5 col-sm bg-white p-4 radius-10 shadow-sm">
    <input type="text" name="username" placeholder="Username" class="<?php echo $input;?>">
    <input type="text" name="password" placeholder="Password" class="<?php echo $input;?>">
    <button name="adminlogin"class="btn btn-warning w-100 mt-3 radius-10">Login</button>
    </form>


    <form action="login.php" method="POST" class="user d-none m-2 col-lg-5 col-sm bg-white p-4 radius-10 shadow-sm" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" class="<?php echo $input;?>">
    <input type="number" name="age" placeholder="Age" class="<?php echo $input;?>">

    <select name="job" class="<?php echo $input;?>">
    <?php
    $query = mysqli_query($db , "SELECT * FROM type_job");
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.x($row['job_id']).'">'.x($row['name_job']).'</option>';
    }
    ?>
    </select>

    <input type="file" name="file" class="<?php echo $input;?>">

    <button name="userlogin" class="btn btn-primary w-100 mt-3 radius-10">SEND CV</button>
    </form>


</div>
</div>
