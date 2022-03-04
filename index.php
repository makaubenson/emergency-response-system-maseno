<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="./static/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./static/css/style.css">
    <title>Student | Login</title>
  </head>
  <body style="background-color: #d2d6de;">
    <div class="container">
      <div class="row mt-5 login-page-row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 login-page">
          
        <div class="col-md-12 mb-2 login-page-header" >
            <h2 class="text-center" style="color: #fff">Maseno E-Help Login</h2>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6 text-center">
                <img
                  src="./static/img/logo.png"
                  class="img-fluid"
                  height="100"
                  width="100"
                />
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>


          <form method="post" action="server.php" enctype="multipart/form-data" class="login-form">
            <div class="form-group row">
              <?php
                include 'errors.php';
                ?>
              <label for="inputEmail3" class="col-sm-2 col-form-label"
                >Username</label
              >
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="Username"
                  name="regno" required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label"
                >Password</label
              >
              <div class="col-sm-10">
                <input
                  type="password"
                  class="form-control"
                  id="inputPassword3"
                  placeholder="Password"
                  name="password" required
                />
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12">
                <button
                  type="submit"
                  name="login_btn"
                  class="btn btn-primary btn-block"
                >
                  Sign in
                </button>
              </div>
            </div>
<hr>
            <!--Register-->
             <div class="row">
             <div class="col-sm-12 register-col">
               <p class="lead">Don't have an account yet? <a href="./register.php" class="btn btn-success">Register Here</a></p>
             </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    
  </body>
</html>
