<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './includes/header.php'; ?>
  <body>
    <?php include './includes/navbar.php'; ?>

  <div class="row m-3">
    <div class="col-md-3"></div>
    <div class="col-md-6">
<div class="table-responsive-lg">
    <table class="table" style='color:black; font-weight:normal'>
        <thead>
         Paramedics
            <tr >
              <!-- <th scope="col" class="table-primary">S.NO</th> -->
              <th scope="col" class="table-primary">First Name</th>
              <th scope="col" class="table-primary">Last Name</th>
              <th scope="col" class="table-primary">Email Address</th>
              <th scope="col" class="table-primary">Phone Number</th>
              <th scope="col" class="table-primary">Team ID</th>
             
            </tr>
          </thead>
          <tbody>
        
    <?php
    if($_SESSION['admin_id']){
        $data_fetch_query = "SELECT * FROM `rescue_team_members` WHERE role_id='MSU/001B/022'";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
                $role_id = $row['role_id'];

        echo "<tr> <td>" .$row["fname"].  "</td>";
        echo "<td>" .$row["lname"]."</td>";
        echo "<td>" .$row["email"]."</td>";
        echo "<td>" .$row["phone"]."</td>";
        echo "<td>".$row["rescue_team_id"]."</td> </tr>";
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
<div class="col-md-3"></div>
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
