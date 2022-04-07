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

    // Viewing Tasks
    if (isset($_POST['view-btn'])) {
      $request_helpcode = $_POST['help_code'];
   
      if (empty($request_helpcode)) {
        array_push($errors, "This request lacks a help code");
      }
    
      if (count($errors) == 0) {
        $fetch_query = "SELECT request_status.helpID,request_status.status,
        request_status.admNo,request_status.timestamp,rescue_team_tasks.task_help_code,
        rescue_team_tasks.rescue_team_id,rescue_team_tasks.team_status,student_details.regNum, 
        student_details.firstname,student_details.lastname,student_details.phonenumber
        FROM request_status
        INNER JOIN rescue_team_tasks ON request_status.helpID = rescue_team_tasks.task_help_code  
        INNER JOIN student_details ON request_status.admNo = student_details.regNum
        WHERE request_status.helpID = '$request_helpcode'";
        
    
        $fetch_results = mysqli_query($db, $fetch_query);
        if (mysqli_num_rows($fetch_results) == 1) {
          $row = mysqli_fetch_assoc($fetch_results);
        // end generate random alphanumeric character
          //row data
          $student_fname=$row['firstname'];
          $student_lname=$row['lastname'];
          $student_phone=$row['phonenumber'];
          $request_helpcode=$row['helpID'];
          $request_status=$row['status'];
          $request_time=$row['timestamp'];

          //sessions
          $_SESSION['firstname'] = $student_fname;
          $_SESSION['lastname'] =$student_lname;
          $_SESSION['phonenumber'] = $student_phone;
          $_SESSION['request_helpcode'] =$request_helpcode;
          $_SESSION['request_status'] =$request_status;
          $_SESSION['request_time'] =$request_time;

          header('location: view.php');
        }else{
          array_push($errors, "Unable to fetch data");
          header('location: inqueue.php');
        }
      }
    }

    // Rescue Team Assignment
    if (isset($_POST['update-team-btn'])) {
      $selected_team_id = $_POST['team'];
   
      if (empty($selected_team_id)) {
        array_push($errors, "No team was selected");
      }
    
      if (count($errors) == 0) {
        $update_team_query = "";
        
    
        $fetch_results = mysqli_query($db, $fetch_query);
        if (mysqli_num_rows($fetch_results) == 1) {
          $row = mysqli_fetch_assoc($fetch_results);
        // end generate random alphanumeric character
          //row data
          $student_fname=$row['firstname'];
          $student_lname=$row['lastname'];
          $student_phone=$row['phonenumber'];
          $request_helpcode=$row['helpID'];
          $request_status=$row['status'];
          $request_time=$row['timestamp'];

          //sessions
          $_SESSION['firstname'] = $student_fname;
          $_SESSION['lastname'] =$student_lname;
          $_SESSION['phonenumber'] = $student_phone;
          $_SESSION['request_helpcode'] =$request_helpcode;
          $_SESSION['request_status'] =$request_status;
          $_SESSION['request_time'] =$request_time;

          header('location: view.php');
        }else{
          array_push($errors, "Unable to fetch data");
          header('location: inqueue.php');
        }
      }
    }



?>