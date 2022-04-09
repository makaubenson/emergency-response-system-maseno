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
//$ip = "165.105.70.4"; 

//Get IP Address of User in PHP
$ip = $_SERVER['REMOTE_ADDR']; 

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
<?php
include './components/header.php';
?>
  <body>
    <?php
    include './components/navbar.php';
    ?>

<div class="container mt-3" >
<!--Cards-->
<div class="row " style="text-align: center;">
<!--start of one Card -->
<!-- IP address -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Your IP Address</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ip ; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-wifi fa-2x text-gray-300" style="color:#e83e8c"></i>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!--end of one Card -->
                        <!--start of one Card -->
<!-- IP address -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Your Longitude</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $getInfo->geoplugin_longitude;?> </div>
              </div>
              <div class="col-auto">
                  <i class="fa-solid fa-location-crosshairs fa-2x text-gray-300" style="color:#007bff"></i>
              </div>
          </div>
      </div>
  </div>
</div>
                        <!--end of one Card -->
                                      <!--start of one Card -->
<!-- IP address -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Your Latitude</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $getInfo->geoplugin_latitude; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-location-dot fa-2x text-gray-300" style="color:#ffaa00"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end of one Card -->
<!--end of Cards-->
</div>
</div>

<!--Request Help Section-->
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4 text-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Do you need Help?</h5>
        <p class="card-text">Please click the button below to request for help.</p>
        <form method="post" action="">
          <?php include 'errors.php';?>
  <div class="row">
  
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control" hidden name="ipaddress" value="<?php echo $ip ; ?>">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control" hidden  name="longitude" value="<?php echo $getInfo->geoplugin_longitude; ?>">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control" hidden  name="latitude" value="<?php echo $getInfo->geoplugin_latitude; ?>">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control"  hidden name="username" value="<?php echo $_SESSION['username'];  ?>">
    </div>
    <div class="col-sm-12 pb-1">
      <input type="text" class="form-control"  hidden name="helpcode" value="<?php echo $_SESSION['helpcode'];  ?>">
    </div>
  </div>
  <!-- <a href="#" class="btn btn-danger btn-block"  type='submit' name="help-btn">I Need Help</a> -->
  <button type="submit" class="btn btn-danger btn-block mb-2" name="help-btn">I Need Help</button>
  <!--#############################################-->


</form>

<?php

     if($_SESSION['user']){ ?>
     <div class="row">
  <div class="col-sm-12">
      <div class="card">
  <div class="card-body">
  <div class="alert alert-success" role="alert">
   <span style="color:#e83e8c;font-weight:bold">Help Is On The Way.</span> <br><span class="btn btn-warning">Note: </span> Please Do not move away from this location. A team has been dispatched to help you. Keep Calm!!!
</div>
  <p><?php echo "Your Help Code is  ". "<strong style='color:blue;'>". $_SESSION['helpcode']."</strong>  <br>";  ?> </a></p>
  
</div>
</div>
  </div>
     </div>
 <?php
  }
 ?>

      </div>
    </div>
  </div>
  <div class="col-sm-4 mb-5"></div>
</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6210deff1ffac05b1d7aaea6/1fs8ue637';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <!--Bootstrap 4 scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- End Bootstrap 4 scripts-->
<!-- modal script -->
<script src="./static/js/app.js"></script>
  </body>
</html>
