<?php 
session_start();
// // Report all PHP errors
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

// connect to the database
try{
  $db = mysqli_connect('localhost', 'benson', 'benson', 'maseno_e_help');
//    $db = mysqli_connect('localhost', 'blinxcok_benson', 'aFek]Np@ZVPZ', 'blinxcok_maseno_e_help');


}
catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
  echo 'Database Connection Failed.';
}


// Rescue Team Login
if (isset($_POST['rescue_login_btn'])) {
  $username = strtoupper($_POST['rescue_user_id']);
  $password = $_POST['rescue_password'];
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $encrypted_password = md5($password);
  	$rescue_login_query = "SELECT * FROM  rescue_team WHERE `team_username`='$username' AND `team_password`='$encrypted_password'";
  	$results = mysqli_query($db, $rescue_login_query);
  	if (mysqli_num_rows($results) == 1) {
    $row = mysqli_fetch_assoc($results);
  
    // end generate random alphanumeric character
      //row data
      $team_ID=$row['team_id'];
      $team_username=$row['team_username'];
      $team_Name=$row['team_name'];
      $team_Phone=$row['team_phone'];
      $team_Email=$row['team_email'];
      //sessions
      $_SESSION['team_id'] = $team_ID;
      $_SESSION['team_username'] = $team_username;
      $_SESSION['team_name'] = $team_Name;
      $_SESSION['team_phone'] =$team_Phone;
      $_SESSION['team_email'] =$team_Email;
  	  $_SESSION['success'] = "You are now logged in";

  	  header('location: dashboard.php');
  	}else{
  		array_push($errors, "Incorrect Username or Password");
      header('location: index.php');
  	}
  }
}

// Responding
if (isset($_POST['respond-btn'])) {
  $task_code = $_POST['task_code'];
  $student_reg = $_POST['student_reg'];
  $ip_add= $_POST['rescue_ip'];
  $long = $_POST['rescue_longitude'];
  $lat = $_POST['rescue_latitude'];

  if (empty($task_code)) {
  	array_push($errors, "Help ID is required");
  }
  if (empty($student_reg)) {
  	array_push($errors, "Student ADM No. is required");
  }
  if (empty($ip_add)) {
  	array_push($errors, "Ip address is required");
  }
  if (empty($long)) {
  	array_push($errors, "Longitude is required");
  }
  if (empty($lat)) {
  	array_push($errors, "Latitude is required");
  }

  if (count($errors) == 0) {
    //Update request_status and  rescue_team_tasks tables to assign 'Responding' to the status of the specific helpCode
$request_update_query = "UPDATE `request_status` SET `status`='Responding' WHERE helpID='$task_code' AND admNo='$student_reg'";
$update_results = mysqli_query($db, $request_update_query);

$task_update_query = "UPDATE `rescue_team_tasks` SET `team_status`='Responding',ip_address='$ip_add',longitude='$long',latitude='$lat' WHERE task_help_code ='$task_code' ";
$task_update_results = mysqli_query($db, $task_update_query);

$rescue_select_query = "SELECT * FROM `request_status` WHERE helpID ='$task_code' AND admNo='$student_reg' ";
$select_results = mysqli_query($db, $rescue_select_query);
if (mysqli_num_rows($select_results) == 1) {
$row = mysqli_fetch_assoc($select_results);
  
    // end generate random alphanumeric character
      //row data
      $help_id=$row['helpID'];
      $ip_address=$row['ip_address'];
      $latitude=$row['request_latitude'];
      $longitude=$row['request_longitude'];
      $request_status=$row['status'];
      $student_adm=$row['admNo'];
      $time_of_request=$row['timestamp'];
      //sessions
      $_SESSION['helpID'] = $help_id;
      $_SESSION['ip_address'] =$ip_address;
      $_SESSION['request_latitude'] = $latitude;
      $_SESSION['request_longitude'] =$longitude;
      $_SESSION['status'] =$request_status;
      $_SESSION['admNo'] =$student_adm;
      $_SESSION['timestamp'] =$time_of_request;
}

 $task_select_query = "SELECT * FROM `rescue_team_tasks` WHERE task_help_code ='$task_code'";
$task_select_results = mysqli_query($db, $task_select_query);
if (mysqli_num_rows($task_select_results) == 1) {
$rw = mysqli_fetch_assoc($task_select_results);
  
    // end generate random alphanumeric character
      $ipAddress=$rw['ip_address'];
      $lat=$rw['latitude'];
      $long=$rw['longitude'];
    
      //sessions
      $_SESSION['ipaddress'] =$ipAddress;
      $_SESSION['rescue_lat'] = $lat;
      $_SESSION['rescue_long'] =$long;
 
  	  header('location: task_view.php');
  	}else{
  		array_push($errors, "Unable to make updates");
      header('location: dashboard.php');
  	
  }
  }
}
// Viewing Map
if (isset($_POST['view-map-btn'])) {
  $lat = $_POST['task_latitude'];
  $long = $_POST['task_longitude'];

  if (empty($lat)) {
  	array_push($errors, "Latitude is required");
  }
  if (empty($long)) {
  	array_push($errors, "Longitude is required");
  }

  if (count($errors) == 0) {
  	  header('location: map.php');
  	}else{
  		array_push($errors, "Unable to view map");
      header('location: task_view.php');
  }
  }

?>