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
  echo 'Message: ' .$e->getMessage();
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
    $registrationNumber= $_POST['regno'];
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

    $query = "INSERT INTO student_details(`regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`) 
              VALUES('$registrationNumber','$firstName','$lastName','$emailAddress','$phoneNumber','$password')";
    mysqli_query($db, $query);
    header('location: index.php');
    }else{
      header('location: register.php');
    }
}




?>