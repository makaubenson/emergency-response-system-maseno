<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './includes/header.php'; ?>
  <body>
    <?php include './includes/navbar.php'; ?>

  <div class="row m-3">
    <div class="col-md-12">
<div class="table-responsive-lg">
    <table class="table" style='color:black; font-weight:normal'>
        <thead>
          <h6  style='color:blue; font-weight:normal'>
          Successful Responses</h6>
            <tr >
              <!-- <th scope="col" class="table-primary">S.NO</th> -->
              <th scope="col" class="table-primary">Student Name</th>
              <th scope="col" class="table-primary">Phone</th>
              <th scope="col" class="table-primary">Help Code</th>
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
        INNER JOIN student_details ON request_status.admNo = student_details.regNum  WHERE request_status.status ='Successful' order by request_status.timestamp DESC;";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {

            $help_code=$row["helpID"];
            $request_status=$row["status"];

       
        echo "<tr> <td>" .$row["firstname"]. " ".$row["lastname"]. "</td>";
        echo "<td>" .$row["phonenumber"]."</td>";
        echo "<td>" .$row["helpID"]."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='help_code' value='$help_code'>
        <input type='submit' value='View' name='view-requests-being-attended-btn' class='btn btn-primary'>
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
