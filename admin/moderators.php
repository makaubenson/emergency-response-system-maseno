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
    <table class="table">
        <thead>
          Moderators (Admins)
            <tr >
              <th scope="col" class="table-primary">S.NO</th>
              <th scope="col" class="table-primary">Admin ID</th>
              <th scope="col" class="table-primary">Name</th>
              <th scope="col" class="table-primary">Email</th>
              <th scope="col" class="table-primary">Phone</th>
              <th scope="col" class="table-primary">Rank</th>
<?php
 if($_SESSION['admin_id'] && $_SESSION['admin_rank'] =='super_admin'){
   echo  ' <th scope="col" class="table-primary">Action</th>';
 }
 else{
   //Display Nothing, no column named action if not super admin
 }
?>
              
</tr>
</thead>
<tbody>
        
    <?php
    if($_SESSION['admin_id'] && $_SESSION['admin_rank'] =='super_admin'){
        $data_fetch_query = "SELECT * FROM `admin_details`";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
                $admin_ID = $row['admin_id'];

               

        echo "<tr> <td>" .$row["id"].  "</td>";
        echo "<td>" .$row["admin_id"]."</td>";
        echo "<td>" .$row["admin_firstname"]." ".$row["admin_lastname"]."</td>";
        echo "<td>" .$row["admin_email"]."</td>";
        echo "<td>" .$row["admin_phone"]."</td>";
        echo "<td>" .$row["admin_rank"]."</td> ";
        echo "<td>
        
        <form method ='POST' action='server.php'>
        <input  type='text'   name='adminID' value='$admin_ID'>
        <input type='submit' value='Edit' name='edit-admin-btn' class='btn btn-success'>
        <input type='submit' value='Delete' name='delete-admin-btn' class='btn btn-danger'>
        </form>
        </td> </tr>";
        }
        
        }else{
        echo "<td>"."No Requests Found"."</td>";
        }
        
        } elseif ($_SESSION['admin_id'] && $_SESSION['admin_rank'] =='admin') {
            $data_fetch_query = "SELECT * FROM `admin_details`";
        $data_result = mysqli_query($db, $data_fetch_query);
        if ($data_result->num_rows > 0){
            while($row = $data_result->fetch_assoc()) {
                $team_ID = $row['team_id'];
               

        echo "<tr> <td>" .$row["id"].  "</td>";
        echo "<td>" .$row["admin_id"]."</td>";
        echo "<td>" .$row["admin_firstname"]." ".$row["admin_lastname"]."</td>";
        echo "<td>" .$row["admin_email"]."</td>";
        echo "<td>" .$row["admin_phone"]."</td>";
        echo "<td>" .$row["admin_rank"]."</td> </tr>";
               }
        
        }else{
        echo "<td>"."No Requests Found"."</td>";
        }
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
