<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Maseno E-Help</title>
    <link rel="icon" href="./static/img/logo.png" type="image/x-icon" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!--Bootstrap 4 CSS-->
    <link rel="stylesheet" href="./static/bootstrap4/css/bootstrap.min.css" />
    <!--Style Css-->
    <link rel="stylesheet" href="./static/css/style.css" />
  </head>
  <body>
    <div class="form-center">
      <div class="container-fluid" id="login-form">
        <div class="login-header">
          <h2 class="login-heading">Maseno E-Help Login</h2>
          <img src="./static/img/logo.png" class="logo" />
        </div>
        <form class="form-style">
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label"
              >Registration Number</label
            >
            <input
              type="text"
              class="form-control input-length"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Registration"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We'll never share your credentials with anyone else.</small
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control input-length"
              id="exampleInputPassword1"
              placeholder="Password"
            />
          </div>

          <button type="submit" class="btn btn-primary login-btn">
            Sign In
          </button>
          <hr />
          <p>
            Don't have an account?
            <a class="btn btn-success" href="register.php">Register Here</a>
          </p>
        </form>
      </div>
    </div>

    <!--Bootstrap 4 scripts-->
    <script
      src="./static/bootstrap4/jquery.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="./static/bootstrap4/popper.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="./static/bootstrap4/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <!-- End Bootstrap 4 scripts-->
  </body>
</html>
