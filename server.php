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
// $db = mysqli_connect('localhost', 'benson', 'benson', 'maseno_e_help');
$db = mysqli_connect('localhost', 'blinxcok_benson', 'aFek]Np@ZVPZ', 'blinxcok_maseno_e_help');
//echo 'Database Connected Successfully';
}
catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
  echo 'Database Connection Failed.';
}

function send_sms_toadmin(){
  //send sms notification to rescue team
  $message ='Hello, a new emergency request has been submitted.Please log in and moderate to it immediately.';
  $sender_id = 'UNICOMM'; //Your Default senderId
  $phone = '254758413462,254790333257'; //for multiple concatinate with comma(,)
  $apikey = 'NDZmZjczZTBjOWRmY2Y4OTA5MWZiYm'; // Check under Settings->API Keys in vsoft.co.ke
  $username= 'makaubenson'; // Your sms.vsoft.co.ke Username
  $api_url="https://sms.vsoft.co.ke/api/send_sms";
  $post_data = 'username='.$username.'&api_key='.$apikey.'&message='.$message.'&phone='.$phone.'&sender_id='.$sender_id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $api_url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $result = curl_exec($ch);
  // echo $result;
}

//Register User
// initializing variables
$registrationNumber="";
$firstName = "";
$lastName="";
$emailAddress="";
$phoneNumber="";
$password="";
$confirmPassword="";
$errors = array(); 

// REGISTER USER
if (isset($_POST['register_btn'])) {
    // receive all input values from the form
    $registrationNumber=strtoupper($_POST['regno']);
    $string = str_replace( '', ' &amp; ', $string );
    $firstName =  $_POST['firstname'];
    $lastName =  $_POST['lastname'];
    $emailAddress =  $_POST['emailaddress'];
    $phoneNumber =  $_POST['phone'];
    $password =  $_POST['password'];
    $confirmPassword =  $_POST['confirmpassword'];
    // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstName)) { array_push($errors, "Firstname is required"); }
  if (empty($lastName)) { array_push($errors, "LastName is required"); }
  if (empty($registrationNumber)) { array_push($errors, "Registration Number is required"); }
  if (empty($emailAddress)) { array_push($errors, "Email Address is required"); }
  if (empty($phoneNumber)) { array_push($errors, "Phone Number is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($confirmPassword)) { array_push($errors, "Please Confirm Password"); }
  if ($password != $confirmPassword) {
	array_push($errors, "The two passwords do not match");
  }
 // first check the database to make sure
  // a user does not already exist with the same username and/or email
 $registrationNumber= preg_replace('~[\@!`%&().;:*?"<>|]~', '/',  $registrationNumber);

  $user_check_query = "SELECT * FROM student_details WHERE regNum='$registrationNumber' OR emailaddress='$emailAddress' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['regNum'] === $registrationNumber) {
      array_push($errors, "Registration number already exists");
    }
    if ($user['emailaddress'] === $emailAddress) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($confirmPassword);//encrypt the password before saving in the database

    $register_query = "INSERT INTO student_details(`regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`) 
              VALUES('$registrationNumber','$firstName','$lastName','$emailAddress','$phoneNumber','$password')";
    mysqli_query($db, $register_query);
    header('location: index.php');
    }else{
      header('location: register.php');
    }
}

//Login User
// generate random alphanumeric character
    function random_string($length) {
      $key = '';
      $keys = array_merge(range(0, 9), range('a', 'z'));
      for ($i = 0; $i < $length; $i++) {
          $key .= $keys[array_rand($keys)];
      }
      return $key;
  }
 $helpCode= strtoupper(random_string(7));
    // LOGIN USER
if (isset($_POST['login_btn'])) {
  $username = strtoupper($_POST['regno']);
  $password = $_POST['password'];
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $encrypted_password = md5($password);
  	$login_query = "SELECT * FROM student_details WHERE `regNum`='$username' AND `password`='$encrypted_password'";
  	$results = mysqli_query($db, $login_query);
  	if (mysqli_num_rows($results) == 1) {
      
      $row = mysqli_fetch_assoc($results);
  
    // end generate random alphanumeric character
      //row data
      $regNumber=$row['regNum'];
      $firstName=$row['firstname'];
      $lastName=$row['lastname'];
      $Email=$row['emailaddress'];
      $Phone=$row['phonenumber'];
    

      //sessions
      $_SESSION['username'] = $regNumber;
      $_SESSION['helpcode'] = $helpCode;
      $_SESSION['firstname'] = $firstName;
      $_SESSION['lastname'] =$lastName;
      $_SESSION['emailaddress'] =$Email;
      $_SESSION['phonenumber'] =$Phone;
    
  	  $_SESSION['success'] = "You are now logged in";

  
  	  header('location: dashboard.php');
  	}else{
  		array_push($errors, "Incorrect Username or Password");
      header('location: index.php');
  	}
  }
}

//function to send notifications
function  send_notification_email($helpCode,$adminName,$adminMail){
  // $token_key = 'token';
  // $encrypted_token_key = sha1($token_key);
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

  $mail->addAddress('bensonmakau2000@gmail.com');               //Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');


  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'New Emergency Request!!';

  // <h3>If you are the one who initiated this process please <a href='http://localhost/maseno-E-help/password-change.php?token=$token' style='font-weight:bold;'>Click Here</a> to RESET your password, else IGNORE this Email.</h3>
$email_template = "
<html>
<body style='background:rgb(216, 210, 210);padding:2%'>
<h2 style='color:black;'>Hello, Admin </h2>
<h2>A new emergency request has been submitted. Please log into your portal and handle the request.</h3>
<h2>The Request Help Code is <strong style='color:red'>$helpCode</strong>.</h3>
<h3>Please Log into your portal immediately, <a href='https://emergency-maseno.blinx.co.ke/admin/'><strong style='color:blue'>Log into the Admin Portal</strong></a></h3>
<br>
<img src='https://www.maseno.ac.ke/sites/default/files/Maseno-logo_v5.png' alt=''>
</body>
</html>

";
  $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->send();

}
// Update Location Details
if (isset($_POST['help-btn'])) {
  // receive all input values from the form
  $ipAddress= $_POST['ipaddress'];
  $Longitude=  $_POST['longitude'];
  $Latitude =  $_POST['latitude'];
  $regno =  $_POST['username'];
  $helpCode=  $_POST['helpcode'];
  $type_emergency=  $_POST['emergency_type'];
  $emergency_description=  $_POST['emergency_description'];
  // form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($ipAddress)) { array_push($errors, "Unable to Track your Ip Address"); }
if (empty($Longitude)) { array_push($errors, "Unable to Track your Longitude"); }
if (empty($Latitude)) { array_push($errors, "Unable to Track your Latitude"); }
if (empty($regno)) { array_push($errors, "Unable to Track your Registration Number"); }
if (empty($helpCode)) { array_push($errors, "Unable to Track your Help Code"); }
if (empty($type_emergency)) { array_push($errors, "Please Select the Type of Emergency"); }
// Finally, register user location
if (count($errors) == 0) {
  $status_query ="INSERT INTO `request_status`(`helpID`, `admNo`,`ip_address`, `request_latitude`, `request_longitude`,`emergency_type`, `emergency_description`) 
  VALUES ('$helpCode','$regno','$ipAddress','$Latitude','$Longitude','$type_emergency','$emergency_description')";
  mysqli_query($db, $status_query);
//Select data from location table
              $location_Select_query = "SELECT * FROM request_status WHERE `helpID`='$helpCode'";
                  $results = mysqli_query($db, $location_Select_query);
                  if (mysqli_num_rows($results) == 1) {
                    $row = mysqli_fetch_assoc($results);
                    //row data
                    $regNumber=$row['admNo'];
                    $long=$row['request_longitude'];
                    //sessions
                    $_SESSION['user'] = $regNumber;
                    $_SESSION['longitude'] = $long;

                    //Get Admin Emails
                    $admin_email = "SELECT * FROM SELECT * FROM `admin_details`";
                    $admin_mail_results = mysqli_query($db, $admin_email);
                    if (mysqli_num_rows($admin_mail_results) == 1) {
                      $row = mysqli_fetch_assoc($admin_mail_results);
                      $adminName=$row['admin_firstname']. " ".$row['admin_lastname'];
                      $adminMail=$row['admin_email'];
                      $adminTel=$row['admin_phone'];
                      
                    }
                    // send_sms_toadmin();
                    // send_notification_email($helpCode,$adminName,$adminMail);
                    header('location: dashboard.php');
                  }else{
                    array_push($errors, "Unable to process your request. Contact The System Administrator");
                    header('location: dashboard.php');
                  }
}else{
                  header('location: dashboard.php');
                  array_push($errors, "Unable to update data in the database");
  }

}

//function to reset password
function send_password_reset($student_fname,$student_lname,$student_mail,$token){
  // $token_key = 'token';
  // $encrypted_token_key = sha1($token_key);
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

  $student_name =  $student_fname . " ". $student_lname;
  //Recipients
  $mail->setFrom('info@maseno.co.ke');
  $mail->FromName = 'Maseno University';

  $mail->addAddress($student_mail);               //Name is optional
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
<h2 style='color:black;'>Hello, $student_name </h2>
<h3> You are receiving this email because we received a password reset request for your account.</h3>
<h3>If you are the one who initiated this process please <a href='https://emergency-maseno.blinx.co.ke/password-change.php?token=$token' style='font-weight:bold;'>Click Here</a> to RESET your password, else IGNORE this Email.</h3>

<br>
<img src='https://www.maseno.ac.ke/sites/default/files/Maseno-logo_v5.png' alt=''>
</body>
</html>

";
  $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->send();

}

//Password Reset for Student
if(isset($_POST['password_reset_btn'])){
  $student_username = $_POST['student_username'];
  $student_email = strtolower($_POST['student_email']);

$token = sha1($student_email);//generating token

$_SESSION['toke_val'] = $token;

$token_value = $_SESSION['toke_val'];

//check if Student email already exists
$check_email = "SELECT * FROM student_details WHERE emailaddress = '$student_email' AND regNum ='$student_username' LIMIT 1 ";
$mail_results = mysqli_query($db, $check_email);

if(mysqli_num_rows($mail_results) > 0){
$row = mysqli_fetch_array($mail_results);
$student_adm = $row['regNum'];
$student_fname = $row['firstname'];
$student_lname = $row['lastname'];
$student_mail = $row['emailaddress'];
$student_phone = $row['phonenumber'];
$student_password = $row['password'];

//Update Password Reset Token
$update_token = "UPDATE student_details SET password_reset_token = '$token' WHERE emailaddress ='$student_mail' AND regNum ='$student_adm' LIMIT 1";
$token_update_result = mysqli_query($db,$update_token);

if($token_update_result == true){
  send_password_reset($student_fname,$student_lname,$student_mail,$token);
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
    $password_update = "UPDATE `student_details` SET `password`='$password' WHERE password_reset_token = '$token' ";
    $results = mysqli_query($db, $password_update);
    header("Location: index.php");
  }else{
    echo '<script>
   Toastify({
    text: "Unable to Change Password. Please Contact the System Administrator!",
    duration: 4000,
    className: "warning",
    close: true,
    gravity: "top", 
    position: "right", 
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: "#ffc107",
    },
  }).showToast();
    </script>';
    header('Location: forgot-password.php');
  }

}
//Manual Directions Update
if(isset($_POST['manual-direction-btn'])){
  $adm= $_POST['adm'];
  $helpcode= $_POST['code'];
  $lat= 0;
  $long= 0;
  $ip= $_POST['ip'];
  $emergencyType= $_POST['emergency_type'];
  $incident_directions= $_POST['student_manual_direction'];
  $incident_description= $_POST['student_emergency_description'];


  if (empty($adm)) { array_push($errors, "Reg Number is missing"); }
  if (empty($helpcode)) { array_push($errors, "Helpcode is required"); }
  // if (empty($lat)) { array_push($errors, "Latitude is needed"); }
  // if (empty($long)) { array_push($errors, "Longitude is required"); }
  if (empty($ip)) { array_push($errors, "IP Address is needed"); }
  if (empty($emergencyType)) { array_push($errors, "Emergency Type is needed"); }
  if (empty($incident_directions)) { array_push($errors, "Directions are needed"); }

  if (count($errors) == 0) {
    $data_update= "INSERT INTO `request_status`(`helpID`, `ip_address`, `request_latitude`, `request_longitude`, `emergency_type`, `manual_directions`, `emergency_description`, `admNo`)
     VALUES ('$helpcode','$ip','$lat','$long','$emergencyType','$incident_directions','$incident_description','$adm')";
    $result = mysqli_query($db, $data_update);
//Select data from location table
$location_Select_query = "SELECT * FROM request_status WHERE `helpID`='$helpcode' ";
$results = mysqli_query($db, $location_Select_query);
if (mysqli_num_rows($results) == 1) {
  $row = mysqli_fetch_assoc($results);
  //row data
  $regNumber=$row['admNo'];

  //sessions
  $_SESSION['user'] = $regNumber;
  // send_sms_toadmin();
  // send_notification_email($helpcode,$adminName,$adminMail);
  header("Location: dashboard.php");
}else{
  array_push($errors, "Unable to process your request. Contact The System Administrator");
  header("Location: dashboard.php");
}
    header("Location: dashboard.php");
  }else{
    echo '<script>alert("Unable to submit this request, Contact the System Administrator!")</script>';
    header("Location: dashboard.php");
  }
}
ob_end_flush();
?>