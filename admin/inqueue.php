<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './includes/header.php'; ?>
  <body>
    <?php include './includes/navbar.php'; ?>

  <div class="row m-3">
    <div class="col-md-7">
<div class="table-responsive-lg">
    <table class="table">
        <thead>
          Requests not assigned a response team
            <tr >
              <!-- <th scope="col" class="table-primary">S.NO</th> -->
              <th scope="col" class="table-primary">Student Name</th>
              <th scope="col" class="table-primary">Phone</th>
              <th scope="col" class="table-primary">Help Code</th>
              <th scope="col" class="table-primary">Time of Request</th>
              <th scope="col" class="table-primary">Action</th>
            </tr>
          </thead>
          <tbody>
        
    <?php
    if($_SESSION['admin_id']){
        $data_fetch_query = "SELECT request_status.id, request_status.helpID,request_status.status,
        request_status.admNo,request_status.timestamp,student_details.regNum,student_details.regNum,
        student_details.firstname,student_details.lastname,student_details.phonenumber
        FROM request_status
        INNER JOIN student_details ON request_status.admNo = student_details.regNum  WHERE request_status.status ='Pending' order by request_status.timestamp DESC;";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {

            $help_code=$row["helpID"];
            $request_status=$row["status"];

       
        echo "<tr> <td>" .$row["firstname"]. " ".$row["lastname"]. "</td>";
        echo "<td>" .$row["phonenumber"]."</td>";
        echo "<td>" .$row["helpID"]."</td>";
        echo "<td>" .$row["timestamp"]."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='help_code' value='$help_code'>
        <input type='submit' value='View' name='view-btn' class='btn btn-primary'>
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
    
  </div>
  <div class="col-md-5">
    <div class="table-responsive-lg">
        <table class="table">
            <thead>
              Requests assigned response team but not being attended to.
                <tr >
                  <!-- <th scope="col" class="table-info">S.NO</th> -->
                  <th scope="col" class="table-danger">Student Name</th>
                  <th scope="col" class="table-danger">Help Code</th>
                  <th scope="col" class="table-danger">Team Assigned</th>
                  <th scope="col" class="table-danger">Time of Assignment</th>
                  <th scope="col" class="table-danger">Action</th>
                </tr>
              </thead>
              <tbody>
            
        <?php
        if($_SESSION['admin_id']){
          $data_fetch_query = "SELECT request_status.id, request_status.helpID,request_status.status,
          request_status.admNo,request_status.timestamp,student_details.regNum,student_details.regNum,
          student_details.firstname,student_details.lastname,student_details.phonenumber, rescue_team_tasks.*
          FROM request_status
          INNER JOIN student_details ON request_status.admNo = student_details.regNum
          INNER JOIN rescue_team_tasks ON request_status.helpID = rescue_team_tasks.task_help_code
          WHERE request_status.status ='Assigned' order by request_status.timestamp DESC;";
            $data_result = mysqli_query($db, $data_fetch_query);
            if ($data_result->num_rows > 0){
                while($row = $data_result->fetch_assoc()) {
    
                $help_code=$row["helpID"];
                $request_status=$row["status"];
    
          
            echo "<tr> <td>" .$row["firstname"]. " ".$row["lastname"]. "</td>";
            echo "<td>" .$row["helpID"]."</td>";
            echo "<td>" .$row["rescue_team_id"]."</td>";
            echo "<td>" .$row["assignment_time"]."</td>";
            echo "<td>
            
            <form method ='POST' action='server.php'>
            <input hidden type='text' name='help_code_2' value='$help_code'>
            <input type='submit' name='reassign-btn' value='Re-assign Team' class='btn btn-success'>
            </form>
            </td> </tr>";
            }
            
            }else{
            echo "<td>"."No Data is available"."</td>";
            }
            
            } else{
                echo "<td>"."No Data Found"."</td>";
            }
    
    ?>
              </tbody>
        </table>
      </div>
        
      </div>
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
