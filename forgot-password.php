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
    <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6">
       <div class="alert alert-warning mt-3" role="alert" style="text-align: center;">
  ⚠ Please use the email address used to register you account.
</div>
       </div>
       <div class="col-md-3"></div>
   </div>
  
        <div class="row mt-1 login-page-row"> 
      
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-1 login-page">
       
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
                <?php
                include 'errors.php';
                ?>
                 <div class="form-group row">      
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Enter your Username" name="student_username"
                                required />
                        </div>
                    </div>
                <div class="form-group row">      
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Enter your Email Address" name="student_email"
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