<?php
include 'server.php';
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
  <caption>List of Successful Tasks handled by <?php  echo  $_SESSION['team_name']; ?></caption>
  <thead>
      <h3>Successful Tasks</h3>
    <tr class='bg-primary'>
      <th scope="col">Help Code</th>
      <th scope="col">Registration Number</th>
      <th scope="col">Student Name</th>
      <th scope="col">Request Status</th>
      <th scope="col">Time of Request</th>

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
             WHERE rescue_team_tasks.rescue_team_id = '".$_SESSION['team_id']."' AND rescue_team_tasks.team_status ='Successful' ORDER BY timestamp ASC ";
             
            $data_result = mysqli_query($db, $data_fetch_query);
            if ($data_result->num_rows > 0){
                while($row = $data_result->fetch_assoc()) {
                  $student_reg = $row["regNum"];
                  $task_code = $row["helpID"];
             
            echo "<tr> <td>" .$row["helpID"].  "</td>";
            echo "<td>" .$row["regNum"]."</td>";
            echo "<td>" .$row["firstname"]." ".$row["lastname"]. "</td>";
            echo "<td>" .$row["status"]."</td>";
            echo "<td>" .$row["timestamp"]."</td> </tr>";
         
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


<?php include 'components/scripts.php';?>
  </body>
</html>
