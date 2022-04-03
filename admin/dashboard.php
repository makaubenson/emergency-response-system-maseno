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
  <head>
    <title>Admin Dashboard</title>
    <link rel="icon" href="./static/img/logo.png" type="image/x-icon" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=yes"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap 4 CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Style Css-->
    <link rel="stylesheet" href="./static/css/style.css" />
  </head>
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
                       <a href="javascript:void(0)"> Requests In Queue </div>
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
                    <a href="javascript:void(0)">Requests Being Attended</div>
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
                    <a href="javascript:void(0)">Successful Requests</div>
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
                    <a href="javascript:void(0)">Failed Requests</div>
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
                        <a href="javascript:void(0)"> Rescue Teams</div>
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
                      <a href="javascript:void(0)"> Student Users</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-users fa-2x"style="color:#e83e8c"></i>
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
                      <a href="javascript:void(0)"> Moderators (Admins)</div>
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
                      <a href="javascript:void(0)"> Paramedics</div>
                        
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
