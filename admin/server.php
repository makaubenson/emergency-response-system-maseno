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
        request_status.admNo,request_status.timestamp,
        student_details.regNum,student_details.firstname,student_details.lastname,student_details.phonenumber
        FROM request_status
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
      $student_name = $_POST['studentName'];
      $student_phonenumber = $_POST['student_phone'];
      $request_helpcode = $_POST['student_helpcode'];
      $student_status = $_POST['student_status'];
      $request_time = $_POST['time_of_request'];
      $moderator_id = $_POST['admin_id'];
      $moderator_name = $_POST['admin_name'];
      $selected_team_id = $_POST['team'];

      if (empty($student_name)) {
        array_push($errors, "Student name is required");
      }
      if (empty($student_phonenumber)) {
        array_push($errors, "Student phone number is required");
      }
      if (empty($request_helpcode)) {
        array_push($errors, "Student help code is required");
      }
      if (empty($student_status)) {
        array_push($errors, "Student status is required");
      }
      if (empty($request_time)) {
        array_push($errors, "Request time is required");
      }      
      if (empty($selected_team_id)) {
        array_push($errors, "No team was selected");
      }

      if (count($errors) == 0) {
        $insert_query = "INSERT INTO `rescue_team_tasks`(`task_help_code`,`assigning_admin_id`,
         `team_status`,`rescue_team_id`)
         VALUES ('$request_helpcode','$moderator_id','Assigned','$selected_team_id')";
        
        $fetch_results = mysqli_query($db, $insert_query);

          header('location: inqueue.php');
        }else{
          array_push($errors, "Unable to fetch data");
          header('location: view.php');
        }
      }
    
// Rescue Team Re-Assignment
if (isset($_POST['reassign-btn'])) {
  $request_help_code = $_POST['help_code_2'];
  
  if (empty($request_help_code)) {
    array_push($errors, "Help code is missing");
  }

  if (count($errors) == 0) {
    //Select Data from DB
    $select_query = "SELECT request_status.*, rescue_team_tasks.*, student_details.*
    FROM request_status 
    INNER JOIN rescue_team_tasks ON request_status.helpID = rescue_team_tasks.task_help_code
    INNER JOIN student_details ON request_status.admNo = student_details.regNum
    WHERE request_status.helpID = '$request_help_code'";
  

  $fetch_results = mysqli_query($db, $select_query);
        if (mysqli_num_rows($fetch_results) == 1) {
          $row = mysqli_fetch_assoc($fetch_results);
        // end generate random alphanumeric character
          //row data
          $student_fname=$row['firstname'];
          $student_lname=$row['lastname'];
          $student_phone=$row['phonenumber'];
          $request_helpcode=$row['helpID'];
          $team_status=$row['team_status'];
          $team_assignment_time=$row['assignment_time'];

          //sessions
          $_SESSION['fname'] = $student_fname;
          $_SESSION['lname'] =$student_lname;
          $_SESSION['phone'] = $student_phone;
          $_SESSION['helpID'] =$request_helpcode;
          $_SESSION['team_status'] =$team_status;
          $_SESSION['team_assignment_time'] =$team_assignment_time;

          header('location: reassign.php');
    }else{
      array_push($errors, "Unable to fetch data");
      header('location: inqueue.php');
    }
  }

}


?>