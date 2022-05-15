<?php 
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
   $db = mysqli_connect('localhost', 'benson', 'benson', 'maseno_e_help');
  //  $db = mysqli_connect('localhost', 'blinxcok_benson', 'aFek]Np@ZVPZ', 'blinxcok_maseno_e_help');
//echo 'Database Connected Successfully';
}
catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
  echo 'Database Connection Failed.';
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
 $helpCode= strtoupper(random_string(6));
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
  $token_key = 'token';
  $encrypted_token_key = sha1($token_key);
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
  $mail->setFrom('blinxcorporation@gmail.com');
  $mail->FromName = $student_name;

  $mail->addAddress($student_mail);               //Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');


  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Reset Password Notification';


$email_template = "
<html>
<body style='background:rgb(216, 210, 210);'>
<h2 style='color:black;'>Hello, $student_name </h2>
<h3> You are receiving this email because we received a password reset request for your account.</h3>
<h3>If you are the one who initiated this process please <a href='http://localhost/maseno-E-help/password-change.php?$encrypted_token_key=$token' style='font-weight:bold;'>Click Here</a> to RESET your password, else IGNORE this Email.</h3>
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
  $student_email = $_POST['student_email'];
$token = md5(rand());//generating token

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

if($token_update_result){
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
  $email_address = $_POST['student_mail'];
  $password1 = $_POST['student_pass1'];
  $password2 = $_POST['student_pass2'];


  if (empty($email_address)) { array_push($errors, "Email Address is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if (empty($password2)) { array_push($errors, "Confirm Password is required"); }
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }
  if (count($errors) == 0) {
    $password = md5($password2);//encrypt the password before saving in the database
    $password_update = "UPDATE `student_details` SET `password`='$password' WHERE emailaddress = ' $email_address' ";
    $results = mysqli_query($db, $password_update);
    header("Location: password-change.php");
  }

}
//15

?>