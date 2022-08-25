<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>REVIEWERS</title>

    <!-- vendor css -->
    <link href="<?= base_url('public/lib/fontawesome-free/css/all.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('public/lib/ionicons/css/ionicons.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('public/lib/typicons.font/typicons.css');?>" rel="stylesheet">
    <link href="<?= base_url('public/lib/flag-icon-css/css/flag-icon.min.css');?>" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?= base_url('public/css/azia.css');?>">

    
    

  </head>
  <body>

<div class="az-header">
  <div class="container">
    <div class="az-header-left">
      <a href="index.html" class="az-logo">REVIEWERS</a>
      <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
    </div><!-- az-header-left -->
    <div class="az-header-menu">
      <div class="az-header-menu-header">
        <a href="index.html" class="az-logo"><span></span> azia</a>
        <a href="" class="close">&times;</a>
      </div><!-- az-header-menu-header -->
      <ul class="nav">
        <li class="nav-item active show">
          <a href="index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
        </li>
       
      </ul>
    </div><!-- az-header-menu -->

    <div class="az-header-right">
      
     
      
        <a href="#" class="az-header-search-link"><i class="fas fa-search"></i></a>
      <div class="dropdown az-header-notification">


      
        <a href="" class="new"><i class="typcn typcn-bell"></i></a>
        <div class="dropdown-menu">
          <div class="az-dropdown-header mg-b-20 d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <h6 class="az-notification-title">Notifications</h6>
          <p class="az-notification-text">You have 2 unread notification</p>
          <div class="az-notification-list">
            <div class="media new">
              <div class="az-img-user"><img src="../img/faces/face2.jpg" alt=""></div>
              <div class="media-body">
                <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                <span>Mar 15 12:32pm</span>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media new">
              <div class="az-img-user online"><img src="../img/faces/face3.jpg" alt=""></div>
              <div class="media-body">
                <p><strong>Joyce Chua</strong> just created a new blog post</p>
                <span>Mar 13 04:16am</span>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="az-img-user"><img src="../img/faces/face4.jpg" alt=""></div> 
              <div class="media-body">
                <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                <span>Mar 13 02:56am</span>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="az-img-user"><img src="../img/faces/face5.jpg" alt=""></div>
              <div class="media-body">
                <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                <span>Mar 12 10:40pm</span>
              </div><!-- media-body -->
            </div><!-- media -->
          </div><!-- az-notification-list -->
          <div class="dropdown-footer"><a href="">View All Notifications</a></div>
        </div><!-- dropdown-menu -->
      </div><!-- az-header-notification -->
      <div class="dropdown az-profile-menu">
        <a href="" class="az-img-user"><img src="<?= base_url('public/img/faces/face1.jpg');?>" alt=""></a>
        <div class="dropdown-menu">
          <div class="az-dropdown-header d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <div class="az-header-profile">
            <div class="az-img-user">
              <img src="<?= base_url('public/img/faces/face1.jpg');?>" alt="">
            </div><!-- az-img-user -->
            <h6><?php echo $userName; ?></h6>
            <span>Premium Member</span>
          </div><!-- az-header-profile -->

          <a href="<?= base_url('/dashboard/myprofile');?>" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
          <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
          <a href="logout" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
        </div><!-- dropdown-menu -->
      </div>
    </div><!-- az-header-right -->
  </div><!-- container -->
</div><!-- az-header -->