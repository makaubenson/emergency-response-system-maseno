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
  <caption>List of requests made by <?php  echo  $_SESSION['firstname'].' '. $_SESSION['lastname']; ?></caption>
  <thead>
      <h3>Requests</h3>
    <tr class='bg-primary'>
      <th scope="col">Help Code</th>
      <th scope="col">Registration Number</th>
      <th scope="col">Time of Request</th>
      <th scope="col">Request Status</th>
      
    </tr>
  </thead>
  <tbody>
        
        <?php
        if($_SESSION['username']){
            $reg_num = $_SESSION['username'];
            $data_fetch_query = "SELECT * FROM `request_status` WHERE admNo='$reg_num'";
             
            $data_result = mysqli_query($db, $data_fetch_query);
            if ($data_result->num_rows > 0){
                while($row = $data_result->fetch_assoc()) {
             
            echo "<tr> <td>" .$row["helpID"].  "</td>";
            echo "<td>" .$row["admNo"]."</td>";
            echo "<td>" .$row["timestamp"]."</td>";
            echo "<td>" .$row["status"]."</td> </tr>";
               
           
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
