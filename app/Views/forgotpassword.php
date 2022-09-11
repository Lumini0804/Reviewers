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
          <h4><?php 
          if(session()->getFlashdata('message') !== NULL ){
            echo session()->getFlashdata('message');
          }else{
            echo "Reset Your Password";
          }
          ?></h4>

          <form action="<?= base_url('forgotpassword');?>" method="post">
            
            <div class="form-group">
              <label>Enter your email and we'll send you an email, how to reset your password.</label>
              <input type="text" class="form-control" placeholder="Enter your email" value="<?= set_value('email'); ?>" name="email" >
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>

        
            
            <button class="btn btn-az-primary btn-block">Send</button>
            

            <p><a href="<?= base_url();?>">Go back to home page</a></p>
            
          </form>
        </div>
    </div>
</div><!-- az-signup-header -->

    

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
