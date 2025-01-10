<?php

$view_id= $_GET['view_id'];
include 'header.php';

$query_for_profile="SELECT * FROM `user` WHERE `id`='$view_id'";
$run_profile_query = mysqli_query($connect,$query_for_profile);
$profile_data= mysqli_fetch_assoc($run_profile_query);




?>


<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
          
<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-6">
      <div class="user-profile-header-banner">
        <img style="height: 300px; width:100%;" src="../assets/imgs/news/hptu1.jpg" alt="Banner image" class="rounded-top">
      </div>
      <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
        <div  class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
          <img  style="height:150px; width:150px;" src="../<?php echo $profile_data['profile_photo']; ?>" alt="Profile Picture" class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img">
        </div>

        <div class="flex-grow-1 mt-3 mt-lg-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4 class="mb-2 mt-lg-7"><?php echo $profile_data['username']; ?></h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
               
                <li class="list-inline-item">
                  <i class='bx bx-map me-2 align-top'></i><span class="fw-medium"><?php echo $profile_data['city']; ?>,<?php echo $profile_data['state']; ?>,<?php echo $profile_data['country']; ?></span>
                </li>
                <li class="list-inline-item">
                  <i class='bx bx-calendar me-2 align-top'></i><span class="fw-medium"> Joined <?php echo $profile_data['created_at']; ?></span>
                </li>
              </ul>


        
            </div>

             
           
              <?php $status=  $profile_data['status']; 
                if($status==1)
                {
                ?>
                 <a href="javascript:void(0)" class="btn btn-success mb-1">
                <i class='bx bx-user-check bx-sm me-2'></i>Verified
                </a>
                <?php
                }
                else
                {
                ?>
                 <a href="javascript:void(0)" class="btn btn-danger mb-1">
                <i class='bx bx-user-check bx-sm me-2'></i>Not Verified
                </a>
                <?php
                  
                }

              ?>
              
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<br><br>

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-6">
      <div class="card-body">
        <form method="post" action="php_code/backend.php" >
        <small class="card-text text-uppercase text-muted small">About</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-4"><i class="bx bx-user"></i><span class="fw-medium mx-2">Full Name:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['username']; ?>" name="username">


            <li class="d-flex align-items-center mb-4"><i class="bx bx-user"></i><span class="fw-medium mx-2">Email:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['email']; ?>" name="">


             <li class="d-flex align-items-center mb-4"><i class="bx bx-user"></i><span class="fw-medium mx-2">Password:</span> <span>
            <input  disabled type="text" class="form-control" value="<?php echo $profile_data['password']; ?>" name="password">

          </span></li>
          <li class="d-flex align-items-center mb-4"><i class="bx bx-check"></i><span class="fw-medium mx-2">Status:</span> <span>
            <?php
              if($profile_data['status']==1)
              {
                echo"Active";
              }
              else
              {
                echo"Not Active";
              }

            ?>
          </span></li>
         
          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">City:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['city']; ?>" name="city">
          </span></li>

          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">State:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['state']; ?>" name="state">
          </span></li>
          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">Country:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['country']; ?>" name="country">
          </span></li>


          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">Facebook:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['facebook']; ?>" name="facebook">
          </span></li>

          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">Instagram:</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['insta']; ?>" name="instagram">
          </span></li>

          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">Whatsapp :</span> <span>
            <input disabled type="text" class="form-control" value="<?php echo $profile_data['whatsapp']; ?>" name="whatsapp">
          </span></li>

          <li class="d-flex align-items-center mb-4"><i class="bx bx-flag"></i><span class="fw-medium mx-2">About:</span> <span>
          </span>
          <textarea disabled name="about" class="form-control"><?php echo $profile_data['about']; ?> </textarea>
        </li>

        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">

        

      </form>


      </div>
    </div>
    <!--/ About User -->
   
  </div>
  <div class="col-xl-8 col-lg-7 col-md-7">
    <!-- Activity Timeline -->
    <div class="card card-action mb-6">
      <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0"><i class='bx bx-bar-chart-alt-2 bx-lg text-body me-4'></i>Activity Timeline</h5>
      </div>
      <div class="card-body pt-3">
        <ul class="timeline mb-0">
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-primary"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-3">
                <h6 class="mb-0">Total Blogs Posted :</h6>
                <?php
                  $query1="SELECT * FROM `posts` WHERE `user_id`='$user_id'";
                  $run1= mysqli_query($connect,$query1);
                  $total_blogs= mysqli_num_rows($run1);

                ?>
                <small class="text-muted"><span class="badge bg-primary"><?php echo $total_blogs; ?></span> Blogs</small>
              </div>
            </div>
          </li>



           <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-primary"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-3">
                <h6 class="mb-0">Total Blogs Approved by Admin :</h6>
                 <?php
                  $query1="SELECT * FROM `posts` WHERE `user_id`='$user_id' AND `status`=1";
                  $run1= mysqli_query($connect,$query1);
                  $approved_blogs= mysqli_num_rows($run1);

                ?>
                <small class="text-muted"><span class="badge bg-success"><?php echo $approved_blogs; ?></span> Blogs</small>
              </div>
            </div>
          </li>
        
        
        </ul>
      </div>
    </div>
    <!--/ Activity Timeline -->
  
    
  </div>
</div>
<!--/ User Profile Content -->
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php
include 'footer.php';
?>

