<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>
  <body>
    <div class="container-fluid" id="mynav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php
     if($_SESSION['admin_id']){ ?>
      <li class="nav-item active">
      <a class="nav-link" href="javascript:void(0)">
      <?php echo "Welcome ". "<strong style='color:white;'>".$_SESSION['admin_firstname']." ".$_SESSION['admin_lastname']."</strong>  <br>"."<strong style='color:#21B941;'> ".$_SESSION['admin_rank']."</strong>";  ?> </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link btn btn-danger" href="logout.php">Logout </a>
      </li>
         <?php
  }
 ?>
    </ul>
  </div>
</nav>
</div>
<div class="container mt-4">
<div class="table-responsive-lg">
    <table class="table">
        <thead>
            <tr >
              <th scope="col" class="table-primary">S.NO</th>
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
        INNER JOIN student_details ON request_status.admNo = student_details.regNum  WHERE request_status.status ='Pending' order by request_status.id;";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {

            $help_code=$row["helpID"];
            $request_status=$row["status"];

        echo "<tr> <td>" . $row["id"]. "</td>";
        echo "<td>" .$row["firstname"]. " ".$row["lastname"]. "</td>";
        echo "<td>" .$row["phonenumber"]."</td>";
        echo "<td>" .$row["helpID"]."</td>";
        echo "<td>" .$row["timestamp"]."</td>";
        echo "<td>
        
        <form method ='POST' action=''>
        <input hidden type='text' name='help_code' value='$help_code'>
        <input type='submit' value='View' class='btn btn-primary'>
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



    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
  </body>
</html>
