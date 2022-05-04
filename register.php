<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './components/header.php';
?>
  <body style="background-color: #d2d6de">
    <div class="container register-page-section">
      <div class="row mt-2 register-page-row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 register-page">
          <div class="col-md-12 mb-2 register-page-header">
            <h2 class="text-center" style="color: #fff">
              Maseno E-Help Register
            </h2>

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
          <form
            method="post"
            action="server.php"
            enctype="multipart/form-data"
            class="register-form"
          >
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"
                >Username</label
              >
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="Registration Number"
                  name="regno"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"
                >First Name</label
              >
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="First Name"
                  name="firstname"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"
                >Last name</label
              >
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="Last Name"
                  name="lastname"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"
                >Email</label
              >
              <div class="col-sm-10">
                <input
                  type="email"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="Email Address"
                  name="emailaddress"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"
                >Phone</label
              >
              <div class="col-sm-10">
                <input
                  type="number"
                  class="form-control"
                  id="inputEmail3"
                  placeholder="Phone Number"
                  name="phone"
                  required
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
                  name="password"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label"
                >Confirm Password</label
              >
              <div class="col-sm-10">
                <input
                  type="password"
                  class="form-control"
                  id="inputPassword3"
                  placeholder="Password"

                  name="confirmpassword"
                  required
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <button
                  type="submit"
                  class="btn btn-outline-success btn-block"
                  name="register_btn"
                >
                  Register
                </button>
              </div>
            </div>

            <hr />
            <!--Login-->
            <div class="row">
              <div class="col-sm-12 login-col">
                <p class="lead">
                  Already have an account ?
                  <a href="./index.php" class="btn btn-success">Login Here</a>
                </p>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
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
