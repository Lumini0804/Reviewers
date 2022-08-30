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
     
    <div class="az-signup-wrapper">
      <div class="az-column-signup-left">
        <div>
      
          <img src="public/img/logo.png" alt="logo-image" width=100px height=100px />
          <h1 class="az-logo">reviewers</h1>
          <ul style="list-style-type:disc">
          <li><b>REVIEWERS is a platform to manage reviews of social sites</li></b><br>
          <li><b>REVIEWERS is a platform to manage reviews of web pages</li></b><br>
          <li><b>Very helpful for busy clients</li></b><br><br>
          <pli>Register our site and see for yourself why you need REVIEWERS</li></ul>
          <a href="<?= base_url('register');?>" class="btn btn-outline-indigo">Sign Up</a>
        </div>
      </div><!-- az-column-signup-left -->
      <!-- az-column-signup -->
      <div class="az-card-signin">
        <h1 class="az-logo">Reviewers</h1>
        <div class="az-signin-header">
          <h2>Welcome back!</h2>
          <h4>
          <?php 
          if(session()->getFlashdata('message') !== NULL ){
            echo session()->getFlashdata('message');

          }else{
            echo "Please sign in to continue";
          }
          ?>
          </h4>

          <form action="<?= base_url('login');?>" method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Enter your email" value="<?= set_value('email'); ?>" name="email">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Enter your password" value="<?= set_value('password'); ?>" name="password">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
            </div>
            <button class="btn btn-az-primary btn-block">Sign In</button>
          </form>

        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
          <p><a href="">Forgot password?<a href="<?= base_url('forgotpassword');?>"></a></p>
          <p><a href="">Don't have an account? <a href="<?= base_url('register');?>">Create an Account</a></p>
        </div><!-- az-signin-footer -->
      </div>
    </div><!-- az-signup-wrapper -->


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
