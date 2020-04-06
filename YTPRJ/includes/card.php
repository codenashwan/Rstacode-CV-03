<!-- Modal -->
<?php     while($row = mysqli_fetch_assoc($query)){$is_pass = x($row['is_pass']);$personid = x($row['id']); ?>
<div class="modal fade" id="post<?php echo x($row['id']);?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <form action="index.php" method="POST">
        <input type="text" value="<?php echo x($row['id']);?>" name="id" hidden>
        <input name="name" type="text" class="form-control form-control-lg mt-2" value="<?php echo x($row['name']);?>">
        <input name="age" type="text" class="form-control form-control-lg mt-2" value="<?php echo x($row['age']);?>" >
        <input name="job" type="text" class="form-control form-control-lg mt-2" value="<?php echo x($row['job']);?>">
        <button name="update" class="btn btn-warning btn-lg mt-2 w-25">Update</button>
         <button type="button" class="btn btn-primary btn-lg mt-2 w-25" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="card m-2 border-0 p-3 radius-10 shadow-sm" style="width: 18rem;">
  <img src="assets/img/<?php echo x($row['photo_job']);?>" class="w-50 m-auto">
  <div class="card-body text-center">
    <h5 class="card-title">Name : <?php echo x($row['name']);?></h5>
    <p class="card-text">Age : <?php echo x($row['age']);?></p>
    <p class="card-text">Job : <?php echo x($row['name_job']);?></p>
    <?php if(isset($admin)){?>
    <a href="upload/<?php echo x($row['file_cv']);?>">View CV</a>
    <?php } ?>
    <img src="assets/img/<?php if($is_pass == 0){echo "waiting.svg";}else if($is_pass == 1){echo "like.svg";}else{echo "unlike.svg";}?>" width="40" style="position:absolute;top:0;left:0;margin:10px">
  </div>
  <?php if(isset($admin)){?>
  <a href="?d=<?php echo x($row['id']);?>"><img src="assets/img/remove.svg" width="40" style="position:absolute;top:0;right:0;margin:10px" alt=""></a>
  <span data-toggle="modal" data-target="#post<?php echo x($row['id']);?>" ><img src="assets/img/edit.svg" width="40" alt=""></span>
  <?php } ?>
  <br>
  <?php if(isset($admin)){
  if($is_pass == 0){  
  ?>
  <div class="d-flex bg-secondary justify-content-center p-2 radius-10">
  <a href="?like=<?php echo $personid;?>" class="m-2"><img src="assets/img/like.svg" width="40" alt=""></a>
  <a href="?unlike=<?php echo $personid;?>" class="m-2"><img src="assets/img/unlike.svg" width="40" alt=""></a>
  </div>
  <?php } } ?>
</div>

  <?php } ?>