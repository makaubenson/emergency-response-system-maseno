<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './includes/header.php'; ?>
  <body>
    <?php include './includes/navbar.php'; ?>
<div class="container mt-4">
  <form method="post" action="server.php" class="border border-info p-5">
<?php
include 'errors.php';
?>
    <div class="row">
      <div class="col">
        <label for="student_name">Team ID</label>
        <input type="text" class="form-control" name='teamid'  placeholder="Enter team ID" value="<?php echo $_SESSION['rescue_team_id']  ; ?>" >
      </div>
      <div class="col">
        <label for="student_name">Team Name</label>
        <input type="text" class="form-control" name='teamName'  placeholder="team name" value='<?php echo $_SESSION['team_name'];?>'>
      </div>
    </div>
<br>
    <div class="row">
      <div class="col">
        <label for="student_name">Team Username</label>
        <input type="text" class="form-control" name='team_username' placeholder="username"  value='<?php echo  $_SESSION['team_username'] ;?>'>
      </div>
      <div class="col">
        <label for="student_name">Phone Number</label>
        <input type="text" class="form-control" name='team_phone' placeholder="phone"  value='<?php echo $_SESSION['team_phone'] ;?>'>
      </div>
    </div>
<br>
<div class="row">
  <div class="col">
    <label for="student_name">Email Address</label>
    <input type="text" class="form-control" name='team_email' placeholder="email"  value='<?php echo $_SESSION['team_email'];?>'>
  </div>
  <div class="col">
        <label for="student_name">Time of Registration</label>
        <input type="text" class="form-control" name='time_of_reg' readonly placeholder="Time of Registration" value='<?php echo $_SESSION['registration_timestamp'];?>'>
      </div>
</div>

<br>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <button type="submit" name='update-team-btn'class="btn btn-warning btn-block">Update team details</button>
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
