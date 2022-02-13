<?php
include 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student Registratrion</title>
    <link rel="icon" href="./static/img/logo.png" type="image/x-icon" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!--Bootstrap 4 CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Style Css-->
    <link rel="stylesheet" href="./static/css/style.css" />
  </head>
  <body>
    <div class="form-center-register">
      <div class="container-fluid" id="register-form">
        <div class="register-header">
          <h2 class="register-heading">Maseno E-Help Register</h2>
          <img src="./static/img/logo.png" class="register-logo" />
        </div>
        <form class="register-form-style" method="post" action="server.php">
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label-register"
              >Registration Number</label
            >
            <input
              type="text"
              class="form-control register-input-length"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Registration Number"name="regno"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label-register"
              >First Name</label
            >
            <input
              type="text"
              class="form-control register-input-length"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="First Name" name="firstname"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label-register"
              >Last Name</label
            >
            <input
              type="text"
              class="form-control register-input-length"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Last Name" name="lastname"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label-register"
              >Email Address</label
            >
            <input
              type="email"
              class="form-control register-input-length"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Email Address"name="emailaddress"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label-register"
              >Phone</label
            >
            <input
              type="number"
              class="form-control register-input-length"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Phone Number"name="phone"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="form-label-register"
              >Password</label
            >
            <input
              type="password"
              class="form-control register-input-length"
              id="exampleInputPassword1"
              placeholder="Password"name="password"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="form-label-register"
              >Confirm Password</label
            >
            <input
              type="password"
              class="form-control register-input-length"
              id="exampleInputPassword1"
              placeholder="Confirm Password"name="confirmpassword"
              required
            />
          </div>

          <button type="submit" name="register_btn" class="btn btn-success register-btn">
            Register
          </button>
          <hr />
          <div class="login-page-section">
            <p>
              Already have an account?
              <a class="btn btn-primary" href="./index.php">Login Here</a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <!--Bootstrap 4 scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- End Bootstrap 4 scripts-->
  </body>
</html>
