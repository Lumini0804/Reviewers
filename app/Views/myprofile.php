<?php require("layouts/header.php");?>

<div class="az-content az-content-dashboard">
      <div class="container">
         <div class="az-content-body">


      
    <div class="az-column-signup">
      <h1 class="az-logo">reviewers</h1>
        <div class="az-signup-header">
          <h4>It's free to edit your profile details and only takes a minute.</h4>

          <form action="<?= base_url('myprofile');?>" method="post">
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
            
            
            <button class="btn btn-az-primary btn-block">Submit Details</button>
          </form>
        </div>

        <div class="az-signup-footer">
      </div>
      
    </div>



</div>
</div>
</div>

    <?php require("layouts/footer.php");?>
