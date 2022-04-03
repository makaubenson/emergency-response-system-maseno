<?php 
session_start();
// // Report all PHP errors
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

// connect to the database
// connect to the database
try{
  $db = mysqli_connect('localhost', 'benson', 'benson', 'maseno_e_help');
//    $db = mysqli_connect('localhost', 'blinxcok_benson', 'aFek]Np@ZVPZ', 'blinxcok_maseno_e_help');
//echo 'Database Connected Successfully';
}
catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
  echo 'Database Connection Failed.';
}

    // ADMIN USER LOGIN
if (isset($_POST['admin_login_btn'])) {
  $username = $_POST['admin_id'];
  $password = $_POST['admin_password'];
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $encrypted_password = md5($password);
  	$login_query = "SELECT * FROM `admin_details` WHERE `admin_id`='$username' AND `admin_password`='$encrypted_password'";
  	$results = mysqli_query($db, $login_query);
  	if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);
    // end generate random alphanumeric character
      //row data
      $adminID=$row['admin_id'];
      $adminFname=$row['admin_firstname'];
      $adminLname=$row['admin_lastname'];
      $adminMail=$row['admin_email'];
      $adminPhone=$row['admin_phone'];
      $adminRank=$row['admin_rank'];
     
      //sessions
      $_SESSION['admin_id'] = $adminID;
      $_SESSION['admin_firstname'] = $adminFname;
      $_SESSION['admin_lastname'] = $adminLname;
      $_SESSION['admin_email'] =$adminMail;
      $_SESSION['admin_phone'] =$adminPhone;
      $_SESSION['admin_rank'] =$adminRank;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: dashboard.php');
  	}else{
  		array_push($errors, "Incorrect Username or Password");
      header('location: index.php');
  	}
  }
}


// Update Location Details
if (isset($_POST['help-btn'])) {
  // receive all input values from the form
  $ipAddress= $_POST['ipaddress'];
  $Longitude=  $_POST['longitude'];
  $Latitude =  $_POST['latitude'];
  $regno =  $_POST['username'];
  $helpCode=  $_POST['helpcode'];
  // form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($ipAddress)) { array_push($errors, "Unable to Track your Ip Address"); }
if (empty($Longitude)) { array_push($errors, "Unable to Track your Longitude"); }
if (empty($Latitude)) { array_push($errors, "Unable to Track your Latitude"); }
if (empty($regno)) { array_push($errors, "Unable to Track your Registration Number"); }
if (empty($helpCode)) { array_push($errors, "Unable to Track your Help Code"); }
// Finally, register user location
if (count($errors) == 0) {
  $location_query ="INSERT INTO `location`(`helpID`, `ip`, `Latitude`, `Longitude`, `regNum`) VALUES ('$helpCode','$ipAddress','$Latitude','$Longitude','$regno')";
  mysqli_query($db, $location_query);

  $status_query ="INSERT INTO `request_status`(`helpID`, `admNo`) VALUES ('$helpCode','$regno')";
  mysqli_query($db, $status_query);
//Select data from location table
              $location_Select_query = "SELECT * FROM location   WHERE `helpID`='$helpCode'";
                  $results = mysqli_query($db, $location_Select_query);
                  if (mysqli_num_rows($results) == 1) {
                    $row = mysqli_fetch_assoc($results);
                    //row data
                    $regNumber=$row['regNum'];
                    $long=$row['Longitude'];
                    //sessions
                    $_SESSION['user'] = $regNumber;
                    $_SESSION['longitude'] = $long;

                    header('location: dashboard.php');
                  }else{
                    array_push($errors, "Unable to process your request. Contact The System Administrator");
                    // header('location: index.php');
                  }
}else{
                  header('location: dashboard.php');
                  array_push($errors, "Unable to update data in the database");
  }

}


?>