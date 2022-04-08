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
<div class="row">
  <div class="col-md-4">
  <button class='btn btn-primary' onclick="window.location.href='add_team.php'">Add New Team</button>
  </div>
  <div class="col-md-4">
  <button class='btn btn-success' onclick="window.location.href='add_member.php'">Add Team Member</button>
  </div>
  <div class="col-md-4">
  </div>
</div>

    <table class="table" style='color:black; font-weight:normal'>
        <thead>
          Rescue Teams
            <tr >
              <th scope="col" class="table-primary">S.NO</th>
              <th scope="col" class="table-primary">Team ID</th>
              <th scope="col" class="table-primary">Team Name</th>
              <th scope="col" class="table-primary">Team Username</th>
              <th scope="col" class="table-primary">Phone Number</th>
              <th scope="col" class="table-primary">Team Email</th>
              <th scope="col" class="table-primary">Action</th>
            </tr>
          </thead>
          <tbody>
        
    <?php
    if($_SESSION['admin_id']){
        $data_fetch_query = "SELECT * FROM `rescue_team`";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
                $team_ID = $row['team_id'];

        echo "<tr> <td>" .$row["id"].  "</td>";
        echo "<td>" .$row["team_id"]."</td>";
        echo "<td>" .$row["team_name"]."</td>";
        echo "<td>" .$row["team_username"]."</td>";
        echo "<td>" .$row["team_phone"]."</td>";
        echo "<td>" .$row["team_email"]."</td>";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text' hidden name='teamID' value='$team_ID'>
        <input type='submit' value='Edit' name='edit-team-btn' class='btn btn-success'>
        <input type='submit' value='Delete' name='delete-team-btn' class='btn btn-danger'>
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
