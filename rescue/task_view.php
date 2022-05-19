<?php
include 'server.php';
$task_code = $_SESSION['helpID'];
$student_ip = $_SESSION['ip_address'];
$student_lat = $_SESSION['request_latitude'];
$student_long = $_SESSION['request_longitude'];
$request_Status = $_SESSION['status'];
$student_Adm = $_SESSION['admNo'];
$rescue_Lat =  $_SESSION['rescue_lat'];
$rescue_Long=   $_SESSION['rescue_long'];
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
    <h3 style="font-weight: bold;color: blue;text-align: center;">Request Details</h3>
  </div>
  <div class="col-md-4"></div>
</div>
    <div class="row">
      <div class="col">
        <label for="student_name">Task Code</label>
        <input type="text" class="form-control" name='task_code' readonly placeholder="Task Code" value="<?php echo $task_code; ?>" >
      </div>
      <div class="col">
        <label for="student_name">IP Address</label>
        <input type="text" class="form-control" name='ip_address' readonly placeholder="IP Address" value='<?php echo $student_ip;?>'>
      </div>
    </div>
<br>
    <div class="row">
      <div class="col">
        <label for="student_name">Latitude</label>
        <input type="text" class="form-control" name='task_latitude' readonly placeholder="Latitude"  value='<?php echo $student_lat; ?>'>
      </div>
      <div class="col">
        <label for="student_name">Longitude</label>
        <input type="text" class="form-control" name='task_longitude' readonly placeholder="Longitude"  value='<?php echo $student_long; ?>'>
      </div>
    </div>
<br>
<div class="row">
  <div class="col">
    <label for="student_name">Status</label>
    <input type="text" class="form-control" name='task_status' readonly placeholder="Task Status"  value='<?php echo $request_Status; ?>'>
  </div>
  <div class="col">
        <label for="student_reg">Registration Number</label>
        <input type="text" readonly class="form-control" name='reg_num' readonly placeholder="Username" value='<?php echo $student_Adm; ?>'>
      </div>
</div>
<br>
<div class="row">
  <div class="col">
    <label  hidden for="student_name">Rescue Team Longitude</label>
    <input  hidden type="text" class="form-control " id='rescue_Lng' name='rescue_long' readonly placeholder="Rescue Longitude"  value='<?php echo $rescue_Long;?>'>
  </div>
  <div class="col">
        <label   hidden for="student_reg">Rescue Team Latitude</label>
        <input  hidden type="text" readonly class="form-control " id='rescue_Lat'name='rescue_lat' readonly placeholder="Rescue Latitude" value='<?php echo $rescue_Lat;?>'>
      </div>
</div>
<br>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3 m-1">
      <?php
      if($_SESSION['active']){
        echo '<button type="submit" disabled name="request_respond_btn" class="btn btn-primary btn-block">Responding...</button>';
      }else{
        echo '<button type="submit" name="request_respond_btn" class="btn btn-success btn-block">Respond To Task </button>';
      }
      ?>
     
      
    </div>
    <div class="col-md-3">
    <button type="submit" name='view-map-btn'class="btn btn-warning btn-block">View Map</button>
    </div>
    <div class="col-md-3"></div>
  </div>
  </form>
</div>



    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<!-- <script src="./static/js/app.js"></script> -->
  </body>
</html>