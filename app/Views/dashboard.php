<?php require("layouts/header.php");?>


    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Hi, <?php echo $userName; ?> welcome back!</h2>
              
            </div>
            <div class="az-content-header-right">
              <div class="media">
                <div class="media-body">
                  <label>Start Date</label>
                  <h6>Oct 10, 2018</h6>
                </div><!-- media-body -->
              </div><!-- media -->
              
              <div class="media">
                <div class="media-body">
                  <label>Event Category</label>
                  <h6>All Categories</h6>
                </div><!-- media-body -->
              </div><!-- media -->
              <a href="" class="btn btn-purple">Check</a>
            </div>
          </div><!-- az-dashboard-one-title -->

          <?php
          if($profile == 0){
            require("form.php");
          }else{
            require("data.php");
          }
          ?>

        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->

    

    <?php require("layouts/footer.php");?>