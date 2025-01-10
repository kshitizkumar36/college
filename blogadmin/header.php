<?php
include'../includes/connect.php';
$user_id= $_SESSION['user_id'];


$query_for_profile="SELECT * FROM `user` WHERE `id`='$user_id'";
$run_profile_query = mysqli_query($connect,$query_for_profile);
$profile_data= mysqli_fetch_assoc($run_profile_query);



?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - The Tech India</title>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <script src="https://kit.fontawesome.com/687353f40b.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-3b124ff0e0d7a67cd8c995d0aeb1d15a.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css">
    <script type="text/javascript" src="https://beacon-v2.helpscout.net/static/js/vendor.5fe8f3bc.js"></script>
    <script type="text/javascript" src="https://beacon-v2.helpscout.net/static/js/main.a4c5e672.js"></script>



    <link rel="icon" type="image/x-icon" href="../assets/imgs/logo/mylogo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

 
    <script src="assets/js/config.js"></script>
  </head>

  <body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="dashboard.php" class="app-brand-link">
              <img src="../assets/imgs/logo/mylogo.png">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->


            <?php

            if($user_id==1)
            {
              ?>

               <li class="menu-item ">
              <a href="new_blog.php" class="menu-link">
                <i class=" menu-icon fa-solid fa-camera"></i>
                <div data-i18n="Analytics">Create Blog</div>
              </a>
            </li>


            <li class="menu-item active">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

         

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menus</span>
            </li>

             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Blogs</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="posts.php" class="menu-link">
                    <div data-i18n="Account">My Posts</div>
                  </a>
                </li>


                 <li class="menu-item">
                  <a href="all_posts.php" class="menu-link">
                    <div data-i18n="Account">All Posts</div>
                  </a>
                </li>


              
              </ul>
            </li>


            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Master</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="menu.php" class="menu-link">
                    <div data-i18n="Account">Menu</div>
                  </a>
                </li>

                 <li class="menu-item">
                  <a href="youtube.php" class="menu-link">
                    <div data-i18n="Account">Youtubes</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="advertise.php" class="menu-link">
                    <div data-i18n="Account">Advertise</div>
                  </a>
                </li>
              
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Main Slider</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="banner.php" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Banner</div>
                  </a>
                </li>
              
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Author Message</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="author.php" class="menu-link">
                    <div data-i18n="Error">Author</div>
                  </a>
                </li>
                
              </ul>
            </li>

              <?php
            }
            else
            {
              ?>

               <li class="menu-item ">
              <a href="new_blog.php" class="menu-link">
                <i class=" menu-icon fa-solid fa-camera"></i>
                <div data-i18n="Analytics">Create Blog</div>
              </a>
            </li>


          

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menus</span>
            </li>

             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Blogs</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="posts.php" class="menu-link">
                    <div data-i18n="Account">My Posts</div>
                  </a>
                </li>
              
              </ul>
            </li>


          
           
              <?php
            }

            ?>

           
            <!-- Components -->
           

           
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
              

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../<?php echo $profile_data['profile_photo']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../<?php echo $profile_data['profile_photo']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $profile_data['username'];  ?></span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                   
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->


          <?php

          if(isset($_SESSION['msg']))
          {
            $msg= $_SESSION['msg'];

            ?>
            <div class="alert alert-primary"><?php echo $msg; ?></div>
            <?php

            unset($_SESSION['msg']);
          }
        ?>