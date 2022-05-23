<?php 
ob_start();
session_start();
// // Report all PHP errors
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
//############## MAILING ################///
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
//##############################///
// connect to the database
try{
 //$db = mysqli_connect('localhost', 'benson', 'benson', 'maseno_e_help');
$db = mysqli_connect('localhost', 'blinxcok_benson', 'aFek]Np@ZVPZ', 'blinxcok_maseno_e_help');


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

// Viewing task
if (isset($_POST['view-task-btn'])) {
  $task_code = $_POST['task_code'];
  $student_reg = $_POST['student_reg'];
 

  if (empty($task_code)) {
  	array_push($errors, "Help ID is required");
  }
  if (empty($student_reg)) {
  	array_push($errors, "Student ADM No. is required");
  }


  if (count($errors) == 0) {
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
      $task_Desc = $row['emergency_description'];

       if($request_status == 'Responding'){
        $_SESSION['active'] = true;
      }else{
        $_SESSION['active'] = false;
      }
      $student_adm=$row['admNo'];
      $time_of_request=$row['timestamp'];
      //sessions
      $_SESSION['helpID'] = $help_id;
      $_SESSION['ip_address'] =$ip_address;
      $_SESSION['request_latitude'] = $latitude;
      $_SESSION['request_longitude'] =$longitude;
      $_SESSION['status'] =$request_status;
      $_SESSION['taskDescription'] =$task_Desc;
      $_SESSION['admNo'] =$student_adm;
      $_SESSION['timestamp'] =$time_of_request;
     
}

 $task_select_query = "SELECT * FROM `rescue_team_tasks` WHERE task_help_code ='$task_code'";
$task_select_results = mysqli_query($db, $task_select_query);
if (mysqli_num_rows($task_select_results) == 1) {
// $rw = mysqli_fetch_assoc($task_select_results);

  	  header('location: task_view.php');
      exit(0);
  	}else{
  		array_push($errors, "Something Went Wrong!");
      header('location: dashboard.php');
      exit(0);
  }
  }
}
// Responding To Task
if (isset($_POST['request_respond_btn'])) {
 $request_code = $_POST['task_code'];
 $request_IP = $_POST['ip_addres'];
 $request_Latitude = $_POST['task_latitude'];
 $request_Longitude = $_POST['task_longitude'];
 $request_status = $_POST['task_status'];
 $student_adm = $_POST['reg_num'];


  if (empty($request_code)) {
  	array_push($errors, "Help Code is required");
  }
  if (empty($request_IP)) {
  	array_push($errors, "Ip Address is required");
  }
  if (empty($request_Latitude)) {
  	array_push($errors, "User Latitude is required");
  }
  if (empty($request_Longitude)) {
  	array_push($errors, "User Longitude is required");
  }
  if (empty($request_status)) {
  	array_push($errors, "Request Status is required");
  }
  if (empty($student_adm)) {
  	array_push($errors, "Student ADM is required");
  }


  if (count($errors) == 0) {
  	$status_update_query = "UPDATE `rescue_team_tasks` SET `team_status`='Responding' WHERE task_help_code ='$request_code' ";
  	$results = mysqli_query($db,$status_update_query);
    //update second table
    $update_status_query = "UPDATE `request_status` SET `status`='Responding' WHERE helpID='$request_code'";
      $update_results = mysqli_query($db,$update_status_query);

  	  header('Location: responding.php');
  	}	else {
  		array_push($errors, "Unable to make updates");
      header('Location: task_view.php');
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

// Updating Successful Requests.
if (isset($_POST['success-task-btn'])) {
$help_code = $_POST['task_code'];
$incident_description = $_POST['incident_desc'];

  if (empty($help_code)) {
  	array_push($errors, "Help Code is required");
  }
  if (empty($incident_description)) {
  	array_push($errors, "Incident Description is missing");
  }
  if (count($errors) == 0) {

    $status_update_query ="UPDATE `request_status` SET `status`='Successful' WHERE `helpID`= '$help_code'";
    $status_results = mysqli_query($db,$status_update_query);

    $update_query ="UPDATE `rescue_team_tasks` SET `team_status`='Successful' WHERE `task_help_code`='$help_code'";
    $results_update = mysqli_query($db, $update_query);

    $success_list_query ="INSERT INTO `success-list`(`student_helpcode`, `incident_description`) VALUES ('$help_code','$incident_description')";
    $success_list_update = mysqli_query($db, $success_list_query);
  	  header('location: dashboard.php');
  	}else{
  		array_push($errors, "Unable to Push Updates");
      header('location: responding.php');
  }
  }
// Updating Failed Requests
if (isset($_POST['failed-task-btn'])) {
  $help_code = $_POST['task_code'];
  $incident_description = $_POST['incident_desc'];
  
    if (empty($help_code)) {
      array_push($errors, "Help Code is required");
    }
    if (empty($incident_description)) {
      array_push($errors, "Description is missing");
    }
    if (count($errors) == 0) {
  
      $failed_update_query ="UPDATE `request_status` SET `status`='Failed' WHERE `helpID`= '$help_code'";
      $result = mysqli_query($db,$failed_update_query);
  
      $failed_query ="UPDATE `rescue_team_tasks` SET `team_status`='Failed' WHERE `task_help_code`='$help_code'";
      $failed_result = mysqli_query($db, $failed_query);

      $failed_list_query ="INSERT INTO `failed-list`(`student_helpcode`, `incident_description`) VALUES ('$help_code','$incident_description')";
      $failed_list_update = mysqli_query($db, $failed_list_query);

        header('location: dashboard.php');
      }else{
        array_push($errors, "Unable to Push Updates");
        header('location: responding.php');
    }
    }

    //function to reset password
function send_password_reset($rescue_name,$rescue_email,$token){

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  //Server settings
  $mail->SMTPDebug = 1;                                //Enable verbose debug output SMTP::DEBUG_SERVER
  $mail->isSMTP();                                    //Send using SMTP
  $mail->Host       = 'mail.blinx.co.ke';            //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                         //Enable SMTP authentication
  $mail->Username   = 'test@blinx.co.ke';          //SMTP username
  $mail->Password   = 'blinx@2022';              //SMTP password
  $mail->SMTPSecure = 'ssl';                     //Enable implicit TLS encryption
  $mail->Port       = 465;  //465               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


  //Recipients
  $mail->setFrom('info@maseno.co.ke');
  $mail->FromName = 'Maseno University';

  $mail->addAddress($rescue_email);               //Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');


  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Reset Password Notification';

  // <h3>If you are the one who initiated this process please <a href='http://localhost/maseno-E-help/password-change.php?token=$token' style='font-weight:bold;'>Click Here</a> to RESET your password, else IGNORE this Email.</h3>
$email_template = "
<html>
<body style='background:rgb(216, 210, 210);'>
<h2 style='color:black;'>Hello, $rescue_name </h2>
<h3> You are receiving this email because we received a password reset request for your account.</h3>
<h3>If you are the one who initiated this process please <a href='https://health.blinx.co.ke/rescue/password-change.php?token=$token' style='font-weight:bold;'>Click Here</a> to RESET your password, else IGNORE this Email.</h3>

<br>
<img src='https://www.maseno.ac.ke/sites/default/files/Maseno-logo_v5.png' alt=''>
</body>
</html>

";
  $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->send();

}

//Password Reset for Rescue Team
if(isset($_POST['password_reset_btn'])){
  $rescue_email = strtolower($_POST['rescue_email']);

$token = sha1(rand());//generating token

// $_SESSION['toke_val'] = $token;// storing the generated token on session
// $token_value = $_SESSION['toke_val'];

//check if  email already exists
$check_email = "SELECT * FROM `rescue_team` WHERE `team_email`='$rescue_email' LIMIT 1 ";
$mail_results = mysqli_query($db, $check_email);

if(mysqli_num_rows($mail_results) > 0){
$row = mysqli_fetch_array($mail_results);

$rescue_email = $row['team_email'];
$rescue_username = $row['team_username'];
$rescue_name = $row['team_name'];


//Update Password Reset Token
$update_token = "UPDATE rescue_team SET password_reset_token = '$token' WHERE team_email ='$rescue_email' LIMIT 1";
$token_update_result = mysqli_query($db,$update_token);

if($token_update_result == true){
send_password_reset($rescue_name,$rescue_email,$token);
$_SESSION['email_status'] = 'A password reset link has been emailed to you.';
header("Location: forgot-password.php");
exit(0);
}else{
  $_SESSION['email_status'] = 'Something Went Wrong. Try Again!';
  header("Location: forgot-password.php");
  exit(0);
}

}else{
  $_SESSION['email_status'] = 'The credentials you entered are invalid!';
  header("Location: forgot-password.php");
  exit(0);
}

}
//Update Password After Reset
if(isset($_POST['update_password_btn'])){
  $password1 = $_POST['student_pass1'];
  $password2 = $_POST['student_pass2'];
  $token = $_POST['reset_token'];

  if (empty($password1)) { array_push($errors, "Password is required"); }
  if (empty($password2)) { array_push($errors, "Confirm Password is required"); }
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }
  if (count($errors) == 0) {
    $password = md5($password2);//encrypt the password before saving in the database
    $password_update = "UPDATE `rescue_team` SET `team_password`='$password' WHERE password_reset_token = '$token' ";
    $results = mysqli_query($db, $password_update);
    header("Location: index.php");
  }else{
    echo '<script>
 alert("Unable to Change Password. Please Contact the System Administrator!");
    </script>';
    header('Location: forgot-password.php');
  }

}

ob_end_flush();
?>