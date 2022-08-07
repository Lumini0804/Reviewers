<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    

    <!-- vendor css -->
    <link href="<?= base_url('public/lib/fontawesome-free/css/all.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('public/lib/ionicons/css/ionicons.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('public/lib/typicons.font/typicons.css');?>" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?= base_url('public/css/azia.css');?>">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      
    <div class="az-column-signup">
      <h1 class="az-logo">reviewers</h1>
        <div class="az-signup-header">
          <h4>It's free to signup and only takes a minute.</h4>

          <form action="<?= base_url('register');?>" method="post">
            <div class="form-group">
              <label>Firstname &amp; Lastname</label>
              <input type="text" class="form-control" placeholder="Enter your firstname and lastname" value="<?= set_value('name'); ?>" name="name">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>

            </div><!-- form-group -->
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Enter your email" value="<?= set_value('email'); ?>" name="email" >
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>

            <div class="form-group">
              <label>Mobile Number</label>
              <input type="text" class="form-control" placeholder="Enter your mobile number" value="<?= set_value('mobile'); ?>" name="mobile" >
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'mobile') : '' ?></span>
            </div>



            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Enter your password" value="<?= set_value('password'); ?>" name="password">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" placeholder="Confirm your password" value="<?= set_value('confirm_password'); ?>" name="confirm_password">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirm_password') : '' ?></span>
            </div>
            
            
            <button class="btn btn-az-primary btn-block">Create Account</button>
            <div class="row row-xs">
              <div class="col-sm-6"><button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button></div>
              <div class="col-sm-6 mg-t-10 mg-sm-t-0"><button class="btn btn-primary btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button></div>
            </div><!-- row -->
          </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
          <p>Already have an account? <a href="<?= base_url('login');?>">Sign In</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->


    <script src="<?= base_url('public/lib/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('public/lib/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('public/lib/ionicons/ionicons.js');?>"></script>
    <script src="<?= base_url('public/js/jquery.cookie.js');?>"></script>
    
    <script src="<?= base_url('public/js/azia.js');?>"></script>


    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>
</html>
