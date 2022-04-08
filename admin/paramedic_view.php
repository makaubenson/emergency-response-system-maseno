<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './includes/header.php'; ?>
  <body>
    <?php include './includes/navbar.php'; ?>
<div class="container mt-5">
  <form method="post" action="server.php" class="border border-info p-5" style='color:black; font-weight:normal'>
<?php
include 'errors.php';
?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3>Paramedic Details</h3>
        </div>
        <div class="col-md-4"></div>
      <div class="col">
        <label for="student_name">First Name</label>
        <input type="text" class="form-control" name='paramedic_fname'  placeholder="Enter first name" value="<?php echo $_SESSION['fname']; ?>" >
      </div>
      <div class="col">
        <label for="student_name">Last Name</label>
        <input type="text" class="form-control" name='paramedic_lname'  placeholder="Enter last name" value='<?php echo $_SESSION['lname'] ;?>'>
      </div>
    </div>
<br>
    <div class="row">
      <div class="col">
        <label for="student_name">Email Address</label>
        <input type="text" class="form-control" name='paramedic_email'  placeholder="Email Address"  value='<?php echo  $_SESSION['email'];?>'>
      </div>
      <div class="col">
        <label for="student_name">Phone Number</label>
        <input type="text" class="form-control" name='paramedic_phone' placeholder="phone"  value='<?php echo $_SESSION['phone'];?>'>
      </div>
    </div>
<br>
<div class="row">
  <div class="col">
    <label for="student_name">Member ID</label>
    <input type="text" class="form-control" readonly name='paramedic_member_id' placeholder="Member ID"  value='<?php echo  $_SESSION['member_id'];?>'>
  </div>
  <div class="col">
        <label for="student_name">Team ID</label>
        <input type="text"  class="form-control" name='paramedic_team_id' placeholder="Team ID" value='<?php echo $_SESSION['rescue_team_id'];?>'>
      </div>
</div>

<br>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <button type="submit" name='update-paramedic-details' class="btn btn-info btn-block">Update Paramedic Details</button>
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