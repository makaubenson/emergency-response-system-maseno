<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './includes/header.php'; ?>
  <body>
  <div class="container-fluid" id="mynav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php
     if($_SESSION['admin_rank'] = 'super_admin'){ ?>
      <li class="nav-item active">
      <a class="nav-link" href="javascript:void(0)">
      <?php echo "Welcome ". "<strong style='color:white;'>".$_SESSION['super_admin_firstname']." ".$_SESSION['admin_lastname']."</strong>  <br>"."<strong style='color:#21B941;'> ".$_SESSION['admin_rank']."</strong>";  ?> </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link btn btn-danger" href="logout.php">Logout </a>
      </li>
         <?php
  }
 ?>
    </ul>
  </div>
</nav>
</div>
<div class="container mt-4">
  <form method="post" action="server.php" class="border border-info p-5">
<?php
include 'errors.php';
?>
    <div class="row">
      <div class="col">
        <label for="student_name">Admin ID</label>
        <input type="text" class="form-control" name='adminid' readonly placeholder="Enter admin ID" value="<?php echo $_SESSION['admin_id']; ?>" >
      </div>
      <div class="col">
        <label for="student_name">Firstname</label>
        <input type="text" class="form-control" name='adminfname'  placeholder="admin name" value='<?php echo $_SESSION['admin_firstname'];?>'>
      </div>
    </div>
<br>
<div class="row">
      <div class="col">
        <label for="student_name">Lastname</label>
        <input type="text" class="form-control" name='adminlname'  placeholder="Enter admin ID" value="<?php echo $_SESSION['admin_lastname']; ?>" >
      </div>
      <div class="col">
        <label for="student_name">Time of Registration</label>
        <input type="text" class="form-control" name='regdate' readonly placeholder="reg date" value='<?php echo  $_SESSION['registration_timestamp'];?>'>
      </div>
    </div>
<br>
    <div class="row">
      <div class="col">
        <label for="student_name">Email Address</label>
        <input type="text" class="form-control" name='admin_mail' placeholder="mail"  value='<?php echo $_SESSION['admin_email'] ;?>'>
      </div>
      <div class="col">
        <label for="student_name">Phone Number</label>
        <input type="text" class="form-control" name='adminPhone' placeholder="phone"  value='<?php echo  $_SESSION['admin_phone'] ;?>'>
      </div>
    </div>
<br>
<div class="row">
  <div class="col">
    <label for="student_name">Admin Rank</label>
    <input type="text" class="form-control" name='adminRank' placeholder="rank"  value='<?php echo $_SESSION['admin_rank'];?>'>
  </div>
  <div class="col">
        <label for="student_name">Password</label>
        <input type="text" class="form-control" name='adminPass' readonly placeholder="admPassword" value='<?php echo $_SESSION['admin_pass'];?>'>
      </div>
</div>

<br>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <button type="submit" name='update-admin-btn'class="btn btn-warning btn-block">Update admin details</button>
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
