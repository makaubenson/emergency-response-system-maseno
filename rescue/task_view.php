<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './components/header.php'; ?>
  <body>
    <?php include './components/navbar.php'; ?>
<div class="container mt-4">
  <form method="post" action="server.php" class="border border-info p-5" style='color:black; font-weight:normal'>
<?php
include 'errors.php';
?>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <h3 style="font-weight: bold;color: blue;text-align: center;">Task Details</h3>
  </div>
  <div class="col-md-4"></div>
</div>
    <div class="row">
      <div class="col">
        <label for="student_name">Task Code</label>
        <input type="text" class="form-control" name='task_code' readonly placeholder="Task Code" value="<?php echo $_SESSION['helpID']; ?>" >
      </div>
      <div class="col">
        <label for="student_name">IP Address</label>
        <input type="text" class="form-control" name='ip_address' readonly placeholder="IP Address" value='<?php echo $_SESSION['ip_address'];?>'>
      </div>
    </div>
<br>
    <div class="row">
      <div class="col">
        <label for="student_name">Latitude</label>
        <input type="text" class="form-control" name='latitude' readonly placeholder="Latitude"  value='<?php echo  $_SESSION['request_latitude'];?>'>
      </div>
      <div class="col">
        <label for="student_name">Longitude</label>
        <input type="text" class="form-control" name='longitude' readonly placeholder="Longitude"  value='<?php echo $_SESSION['request_longitude'];?>'>
      </div>
    </div>
<br>
<div class="row">
  <div class="col">
    <label for="student_name">Status</label>
    <input type="text" class="form-control" name='task_status' readonly placeholder="Task Status"  value='<?php echo $_SESSION['status'];?>'>
  </div>
  <div class="col">
        <label for="student_reg">Reg NUmber</label>
        <input type="text" readonly class="form-control" name='reg_num' readonly placeholder="REG Number" value='<?php echo $_SESSION['admNo'];?>'>
      </div>
</div>
<br>
<div class="row">
  <div class="col">
    <label for="student_name">Rescue Team Longitude</label>
    <input type="text" class="form-control" name='rescue_long' readonly placeholder="Rescue Longitude"  value='<?php echo $_SESSION['rescue_long'];?>'>
  </div>
  <div class="col">
        <label for="student_reg">Rescue Team Latitude</label>
        <input type="text" readonly class="form-control" name='rescue_lat' readonly placeholder="Rescue Latitude" value='<?php echo  $_SESSION['rescue_lat'];?>'>
      </div>
</div>
<br>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <button type="submit" name='view-map-btn'class="btn btn-success btn-block">View Map</button>
    </div>
    <div class="col-md-4"></div>
  </div>
  </form>
</div>



    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
  </body>
</html>