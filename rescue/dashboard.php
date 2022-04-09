<?php
include 'server.php';
// Get Location from IP Address using PHP
// Use the IP Geolocation API to get the user’s location from IP using PHP.

// Call API via HTTP GET request using cURL in PHP.
// Convert API JSON response to array using json_decode() function.
// Retrieve IP data from API response.
// IP address 
// $userIP = $_SERVER['REMOTE_ADDR'];
 
//static ip address
$ip = "165.105.70.4"; 

//Get IP Address of User in PHP
// $ip = $_SERVER['REMOTE_ADDR']; 

//call api
$url = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);

//decode json data
$getInfo = json_decode($url); 

// print_r($getInfo);
    
//print the array to see the fields if you wish.

// echo "<table border='1' width='50%' align='center'><tr><td>COUNTRY:</td><td>";
// echo $getInfo->geoplugin_countryName;
// echo "</td></tr><tr><td>CITY:</td><td>";
// echo $getInfo->geoplugin_city;
// echo "</td></tr><tr><td>STATE OR REGION:</td><td>";
// echo $getInfo->geoplugin_region;
// echo "</td></tr><tr><td>IP ADDRESS:</td><td>";
// echo $getInfo->geoplugin_request;
// echo "</td></tr><tr><td>COUNTRY CODE:</td><td>";
// echo $getInfo->geoplugin_countryCode;
// echo "</td></tr><tr><td>LATITUTE:</td><td>";
// echo $getInfo->geoplugin_latitude;
// echo "</td></tr><tr><td>LONGITUDE:</td><td>";
// echo $getInfo->geoplugin_longitude;
// echo "</td></tr><tr><td>TIMEZONE:</td><td>";
// echo $getInfo->geoplugin_timezone;
// echo "</td></tr><tr></table>";

?>


<!DOCTYPE html>
<html lang="en">
<?php
include './components/header.php';
?>
  <body>
    <?php
    include './components/navbar.php';
    ?>
<div class="container mt-4">
<table class="table">
  <?php
  include 'errors.php';
  ?>
  <caption>List of Tasks assigned to <?php  echo  $_SESSION['team_name']; ?></caption>
  <thead>
      <h3>Assigned Tasks</h3>
    <tr class='bg-primary'>
      <th scope="col">Help Code</th>
      <th scope="col">Registration Number</th>
      <th scope="col">Student Name</th>
      <th scope="col">Request Status</th>
      <th scope="col">Time of Request</th>
      <th scope="col">Team Status </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        
        <?php
        if( $_SESSION['team_id']){
            $data_fetch_query = "SELECT request_status.helpID, request_status.ip_address, request_status.request_latitude, 
            request_status.request_longitude, request_status.status, request_status.admNo, request_status.timestamp,
            student_details.firstname,student_details.lastname,student_details.regNum,
            rescue_team_tasks.task_help_code, rescue_team_tasks.rescue_team_id, rescue_team_tasks.team_status
             FROM ((request_status
             INNER JOIN student_details ON request_status.admNo = student_details.regNum)
             INNER JOIN  rescue_team_tasks ON request_status.helpID =  rescue_team_tasks.task_help_code)
             WHERE rescue_team_tasks.rescue_team_id = '".$_SESSION['team_id']."' AND rescue_team_tasks.team_status ='Assigned' ORDER BY timestamp ASC ";
             
            $data_result = mysqli_query($db, $data_fetch_query);
            if ($data_result->num_rows > 0){
                while($row = $data_result->fetch_assoc()) {
                  $student_reg = $row["regNum"];
                  $task_code = $row["helpID"];
             
            echo "<tr> <td>" .$row["helpID"].  "</td>";
            echo "<td>" .$row["regNum"]."</td>";
            echo "<td>" .$row["firstname"]."</td>";
            echo "<td>" .$row["status"]."</td>";
            echo "<td>" .$row["timestamp"]."</td>";
            echo "<td>" .$row["team_status"]."</td>";
         
            echo "<td>
            
            <form method ='POST' action='server.php'>
            <input  type='text'  name='task_code' value='$task_code'>
            <input  type='text'  name='rescue_ip' value='$getInfo->geoplugin_request'>
            <input  type='text'  name='rescue_latitude' value='$getInfo->geoplugin_latitude'>
            <input  type='text'  name='rescue_longitude' value='$getInfo->geoplugin_longitude'>
          
                <input  type='text'  name='student_reg' value='$student_reg'>
            <input type='submit' value='Respond' name='respond-btn' class='btn btn-primary'>
         
            </form>
            </td> </tr>";
            }
            
            }else{
            echo "<td>"."No Requests Found"."</td>";
            }
            
            } else{
                echo "<td>"."No Data Found"."</td>";
            }
    
    ?>
              </tbody>
</table>
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
