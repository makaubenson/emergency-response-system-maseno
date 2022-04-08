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
$ip = "208.78.12.1"; 

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
  <?php include './includes/header.php'; ?>
  <body>
  <?php include './includes/navbar.php'; ?>

<div class="container mt-3" >
<!--Cards-->
<div class="row " style="text-align: center;">
<!--start of one Card -->

<div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                       <a href="./inqueue.php"> Requests In Queue </div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-arrows-rotate fa-2x"style="color:#e83e8c"></i>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--end of one Card -->
  <!--start of one Card -->
<div class="col-xl-3 col-md-6 mb-4 mt-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <a href="./attending.php">Requests Being Attended</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-truck-medical fa-2x"style="color:#e83e8c"></i>
              </a>
              </div>
          </div>
      </div>
  </div>
</div>
  <!--end of one Card -->
  <!--start of one Card -->
<div class="col-xl-3 col-md-6 mb-4 mt-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <a href="./successful.php">Successful Requests</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-check-double fa-2x"style="color:#e83e8c"></i>
              </a>
              </div>
          </div>
      </div>
  </div>
</div>
<!--end of one Card -->
 <!--start of one Card -->
<div class="col-xl-3 col-md-6 mb-4 mt-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <a href="./failed.php">Failed Requests</div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-triangle-exclamation fa-2x"style="color:#e83e8c"></i>
              </a>
              </div>
          </div>
      </div>
  </div>
</div>
<!--end of one Card -->
<!--end of Cards-->
</div>

<!--Second Row-->
<div class="row " style="text-align: center;">
  <!--start of one Card -->
  <div class="col-xl-3 col-md-6 mb-4 mt-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="./team.php"> Rescue Teams</div>
                  </div>
                  <div class="col-auto">
                      <!-- <i class="fa-solid fa-wifi fa-2x text-gray-300" style="color:#e83e8c"></i> -->
                      <i class="fa-solid fa-person fa-2x"style="color:#e83e8c"></i>
                  </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!--end of one Card -->

    <!--start of one Card -->
  <div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <a href="./moderators.php"> Moderators (Admins)</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-user-ninja fa-2x"style="color:#e83e8c"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--end of one Card -->
   <!--start of one Card -->
  <div class="col-xl-3 col-md-6 mb-4 mt-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <a href="./paramedics.php"> Paramedics</div>
                        
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-user-doctor fa-2x"style="color:#e83e8c"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--end of one Card -->
  <!--end of Cards-->
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
