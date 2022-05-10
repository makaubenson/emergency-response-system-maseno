<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Password Reset</title>
  <?php
include './components/header.php';
?>
  </head>

<body style="background-color: #d2d6de;">
    <div class="container">

        <div class="row mt-5 login-page-row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5 login-page">

                <div class="col-md-12 mb-2 login-page-header">
                    <h2 class="text-center" style="color: #fff">Password Reset</h2>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">
                            <img src="./static/img/logo.png" class="img-fluid" height="100" width="100" />
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>


                <form method="post" action="server.php" enctype="multipart/form-data" class="login-form">
                    <div class="form-group row">
                        <?php
            include 'errors.php';
            ?>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Enter your Email Address" name="regno"
                                required />
                        </div>
                    </div>
              

                    <div class="form-group row">
                    <div class="col-sm-3">
                          
                        </div>
                        <div class="col-sm-6">
                        <button type="submit" name="password_reset_btn" class="btn btn-info btn-block p-2">
                              <strong> Reset Password</strong>
                            </button>
                        </div>
                        <div class="col-sm-3">
                          
                        </div>
                    </div>
                    <hr>
           
             <!-- <div class="row">
             <div class="col-sm-12 register-col">
               <p class="lead">Don't have an account yet? <a href="./register.php" class="btn btn-success">Register Here</a></p>
             </div>
            </div> -->
                    <!-- <hr> -->
                    <!--Register-->
                    <!-- <div class="row">
                        <div class="col-sm-12 register-col">
                            <p class="lead"> <a href="./rescue/index.php" class="btn btn-success">Rescue Team Login</a>
                            </p>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
  <?php 
  include 'components/scripts.php';
  ?>

</body>

</html>