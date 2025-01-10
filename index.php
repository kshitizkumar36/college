<?php

include'includes/header.php';
?>
    <!-- Start Main content -->
    <main>       
        <div class="featured-slider-2">
            <div class="featured-slider-2-items">

                <?php

if ($connect->connect_error)
 {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT id, title, category1, category2, DATE_FORMAT(date, '%d %M %Y') as formatted_date, views, image, thumb FROM banner WHERE `status`=1";
$result = $connect->query($sql);

if ($result->num_rows > 0)
 {

    while ($row = $result->fetch_assoc()) 
    {
   ?>


         <div class="slider-single">
                    <div class="post-thumb position-relative">
                        <div class="thumb-overlay position-relative" style="background-image: url(<?php echo $row['image']; ?>)">
                            <div class="post-content-overlay">
                                <div class="container">
                                    <div class="entry-meta meta-0 font-small mb-20">
                                        <a href="single.php?id=<?php echo $data['id']; ?>" tabindex="0"><span class="post-cat text-info text-uppercase"><?php echo $row['category1']; ?></span></a>
                                        <a href="single.php?id=<?php echo $data['id']; ?>" tabindex="0"><span class="post-cat text-warning text-uppercase"><?php echo $row['category2']; ?></span></a>
                                    </div>
                                    <h1 class="post-title mb-20 font-weight-900 text-white">
                                        <a class="text-white" href="single.php?id=<?php echo $data['id']; ?>" tabindex="0"><?php echo $row['title']; ?></a>
                                    </h1>
                                    <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                        <span class="post-on"><?php echo $row['formatted_date']; ?></span>
                                        <span class="hit-count has-dot"><?php echo $row['views']; ?> Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
    }


}

?>


              
            </div>
            <div class="container position-relative">
                <div class="arrow-cover color-white"></div>
                <div class="featured-slider-2-nav-cover">
                    <div class="featured-slider-2-nav">

                              <?php

if ($connect->connect_error)
 {
    die("Connection failed: " . $connect->connect_error);
}


$result = $connect->query($sql);

if ($result->num_rows > 0)
 {

    while ($data = $result->fetch_assoc()) 
    {
   ?>

                            <div class="slider-post-thumb mr-15 mt-20 position-relative">
                            <div class="d-flex hover-up-2 transition-normal">
                                <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5">
                                    <img class="border-radius-5" src="<?php echo $data['image']; ?>" alt="">
                                </div>
                                <div class="post-content media-body text-white">
                                    <h5 class="post-title mb-15 text-limit-2-row"><?php echo $data['title']; ?></h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on text-white"><?php echo $data['formatted_date']; ?></span>
                                        <span class="post-by has-dot text-white"><?php echo $data['views']; ?> views</span>
                                    </div>
                                </div>
                            </div>
                        </div>


   <?php

   }
}
?>
                                               
                    </div>
                </div>
            </div>
        </div>      
        <!-- End feature -->
        <div class="container">
            <div class="hot-tags pt-30 pb-30 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">Featured posts</h5>
                        </div>
                        <div class="col-md-8 text-md-right font-small align-self-center">
                            <p class="d-inline-block mr-5 mb-0"><i class="elegant-icon  icon_tag_alt mr-5 text-muted"></i>Hot tags:</p>
                            <ul class="list-inline d-inline-block tags">
                                <li class="list-inline-item"><a href="#"># The Tech India</a></li>
                                <li class="list-inline-item"><a href="#"># Story</a></li>
                                <li class="list-inline-item"><a href="#"># Incidents</a></li>
                                <li class="list-inline-item"><a href="#"># Coding</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loop-grid mb-30">
                <div class="row">
                    <div class="col-lg-8 mb-30">
                        <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1";
                            $run= mysqli_query($connect,$query);
                            $count= mysqli_num_rows($run);
                            $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `id`='$my_id'";
                            $run= mysqli_query($connect,$sql);
                            $data= mysqli_fetch_assoc($run);

                        ?>
                        <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow fadeInUp animated">
                            <div class="arrow-cover"></div>

                            <div class="slide-fade">

<?php 


 $message = $data['title'];
                                $url = "http://thetechindia.in/single.php?id=".$data['id']."";
                                $whatsappMessage = $message . " " . $url; ?>

                                
                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url('<?php echo $data['main_img'];?>')">
                                        <a class="img-link" href="single.php?id=<?php echo $data['id']; ?>"></a>
                                        <span class="top-left-icon bg-success"><a href="https://wa.me/?text=<?php echo $whatsappMessage; ?>"><i class="text-white fa-brands fa-whatsapp"></i></a></span>
                                         <?php $menu= $data['menu']; 
                                                        $query2="SELECT * FROM `menu` WHERE `id`='$menu'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);
                                                        ?>
                                        <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-info text-uppercase">(<?php echo $data['menu']; ?></span></a>
                                                <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-success text-uppercase">
                                                    <?php $menu= $data['menu']; 
                                                        $query2="SELECT * FROM `menu` WHERE `id`='$menu'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);
                                                        echo $data2['menu'];
                                                        ?>
                                                </span></a>
                                            </div>
                                            <h3 class="post-title font-weight-900 mb-20">
                                                <a class="text-white" href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data2['details']; ?></a>
                                            </h3>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on"><?php echo $data['created_at']; ?></span>
                                                <span class="hit-count has-dot"><?php echo $data['views']; ?> Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1";
                            $run= mysqli_query($connect,$query);
                            $count= mysqli_num_rows($run);
                            $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `id`='$my_id'";
                            $run= mysqli_query($connect,$sql);
                            $data= mysqli_fetch_assoc($run);

                        ?>
                        <?php $menu= $data['menu']; 
                                                        $query2="SELECT * FROM `menu` WHERE `id`='$menu'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);
                                                        ?>

                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url(<?php echo $data['main_img']; ?>)">
                                        <a class="img-link" href="single.php?id=<?php echo $data['id']; ?>"></a>
                                        <span class="top-left-icon bg-danger"><i class="elegant-icon icon_image"></i></span>
                                        <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-info text-uppercase"><?php echo $data2['menu']; ?></span></a>
                                            </div>
                                            <h3 class="post-title font-weight-900 mb-20">
                                                <a class="text-white" href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
                                            </h3>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on"><?php echo $data['created_at']; ?></span>
                                                <span class="hit-count has-dot"><?php echo $data['view']; ?> Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1 ORDER BY `id` DESC";
                            $run= mysqli_query($connect,$query);
                           while($data= mysqli_fetch_assoc($run))
                            {

                                $message = $data['title'];
                                $url = "http://thetechindia.in/single.php?id=".$data['id']."";
                                $whatsappMessage = $message . " " . $url;
                            ?>
                             <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(<?php echo $data['main_img']; ?>)">
                                <a class="img-link" href="single.php?id=<?php echo $data['id']; ?>"></a>
                                <a href="https://wa.me/?text=<?php echo $whatsappMessage; ?>"><span class="top-right-icon bg-success"><i class="fa-brands fa-whatsapp"></i></span></a>
                                <ul class="social-share">
                                      <li class="list-inline-item text-muted"><span><i class="fa-solid fa-share"></i> </span></li>
                                    <li><a class="fb"  onclick="shareOnFacebook()" title="Share " target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a class="tw"  onclick="shareOnInstagram()" target="_blank" title="Tweet now"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a class="pt"  onclick="shareOnTwitter()" target="_blank" title="Pin it"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">

                                <?php
                                        $mid= $data['id'];
                                       $query2="SELECT * FROM `menu` WHERE `id`='$mid'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);
                                ?>
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-info"><?php echo $data2['menu']; ?></span></a>
                                    <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-success"><?php echo $data['subtitle']; ?></span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on"><?php echo $data['created_at']; ?> </span>
                                        <span class="time-reading has-dot">12 mins read</span>
                                        <span class="post-by has-dot"><?php echo $data['views']; ?> views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                            <?php
                            }

                           

                        ?>


                   
                </div>
            </div>
        </div>
        <div class="bg-grey pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-module-2">
                            <div class="widget-header-1 position-relative mb-30  wow fadeInUp animated">
                                <h5 class="mt-5 mb-30">The Tech Era</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">
                                <div class="row">

                                     <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1 AND `menu`= 10";
                            $run= mysqli_query($connect,$query);
                            $count= mysqli_num_rows($run);
                            $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `id`='$my_id'";
                            $run= mysqli_query($connect,$sql);
                           while( $data= mysqli_fetch_assoc($run))
                           {

                                $mid= $data['menu'];
                               $query2="SELECT * FROM `menu` WHERE `id`='$mid'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);


                        ?>
                                    <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                        <div class="post-card-1 border-radius-10 hover-up">
                                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(<?php echo $data['main_img']; ?>)">
                                                <a class="img-link" href="single.php?id=<?php echo $data['id']; ?>"></a>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" onclick="shareOnFacebook()" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" onclick="shareOnInstagram()" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" onclick="shareOnTwitter()" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="post-content p-30">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-info"><?php echo $data2['menu']; ?></span></a>
                                                    <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-success"><?php echo $data['subtitle']; ?></span></a>
                                                </div>
                                                <div class="d-flex post-card-content">
                                                    <h5 class="post-title mb-20 font-weight-900">
                                                        <a href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title'];  ?></a>
                                                    </h5>
                                                    <div class="post-excerpt mb-25 font-small text-muted">
                                                        <p><?php echo $data['detail1'];  ?>...</p>
                                                    </div>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on"><?php echo $data['created_at'];  ?></span>
                                                        <span class="time-reading has-dot">12 mins read</span>
                                                        <span class="post-by has-dot"><?php echo $data['views'];  ?> views</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>


                                    <?php


                                    }

                                ?>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="post-module-3">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Latest posts</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">

                                <?php

                            // $query="SELECT * FROM `posts` WHERE `status`=1 ORDER BY `id` DESC";
                            // $run= mysqli_query($connect,$query);
                            // $count= mysqli_num_rows($run);
                            // $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `status`=1 ORDER BY `id` DESC";
                            $run= mysqli_query($connect,$sql);
                           while( $data= mysqli_fetch_assoc($run))
                           {

                                $mid= $data['menu'];
                               $query2="SELECT * FROM `menu` WHERE `id`='$mid'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);


                        ?>
                              


                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url('<?php echo $data['main_img'];?>')">
                                                    <a class="img-link" href="single.php?id=<?php echo $data['id']; ?>"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                                    <li><a class="fb"  onclick="shareOnFacebook()"  title="Share on Facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                                    <li><a class="tw"  onclick="shareOnInstagram()"  target="_blank" title="Tweet now"><i class="fa-brands fa-instagram"></i></a></li>
                                                    <li><a class="pt"  onclick="shareOnTwitter()"  target="_blank" title="Pin it"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="single.php?id=<?php echo $data['id']; ?>"><span class="post-cat text-danger"><b><?php echo $data2['icon']; ?></b></span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
                                                    <span class="post-format-icon "><?php echo $data2['menu']; ?></span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on"><?php echo $data['created_at']; ?></span>
                                                    <span class="time-reading has-dot">11 mins read</span>
                                                    <span class="post-by has-dot"><?php echo $data['views']; ?> views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <?php


                                }

                            ?>
                                
                            </div>
                        </div>
                      <!--   <div class="pagination-area mb-30 wow fadeInUp animated">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#">04</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_right"></i></a></li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="widget-area">
                            <div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">
                                <?php
                                $author_query="SELECT * FROM `author_msg` WHERE `status`=1";
                                $run_author= mysqli_query($connect,$author_query);
                                $data_author= mysqli_fetch_assoc($run_author);
                                ?>
                                <img class="about-author-img mb-25" src="<?php echo $data_author['photo']; ?>" alt="">
                                <span class="badge bg-info"> <?php echo $data_author['badge']; ?>!!</span>

                                <h5 class="mb-20"><?php echo $data_author['heading']; ?> </h5>

                                <p class="font-medium text-muted"><?php echo $data_author['content']; ?></p>
                                <strong>Follow me: </strong>
                                <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                    <li class="list-inline-item"><a class="fb" href="https://www.facebook.com/kshitiz.kumar.182/" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="tw" href="https://www.instagram.com/kshitiz.bilashpur/" target="_blank" title="Insta"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="pt" href="https://www.youtube.com/@itsme_kshitiz" target="_blank" title="Pin it"><i class="fa-brands fa-youtube"></i></a></li>
                                      <li class="list-inline-item"><a class="pt" href="https://x.com/itsme_kshitiz" target="_blank" title="Pin it"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">
                                <div class="widget-header-1 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">Most popular</h5>
                                </div>

                                   <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1 AND `popular`=1 ORDER BY `id` DESC";
                            $run= mysqli_query($connect,$query);
                            $count= mysqli_num_rows($run);
                            $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `id`='$my_id'";
                            $run= mysqli_query($connect,$sql);
                           while( $data= mysqli_fetch_assoc($run))
                           {

                                $mid= $data['menu'];
                               $query2="SELECT * FROM `menu` WHERE `id`='$mid'";
                                                        $run2= mysqli_query($connect,$query2);
                                                        $data2= mysqli_fetch_assoc($run2);


                        ?>
                          


                                <div class="post-block-list post-module-1">
                                    <ul class="list-post">
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on"><?php echo $data['created_at']; ?></span>
                                                        <span class="post-by has-dot"><?php echo $data['views']; ?> views</span>
                                                    </div>
                                                </div>
                                                <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.php?id=<?php echo $data['id']; ?>">
                                                        <img src="<?php echo $data['main_img']; ?>" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        <?php
                                        }

                                        ?>
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">
                                <div class="widget-header-1 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">Last comments</h5>
                                </div>
                                <div class="post-block-list post-module-2">
                                    <ul class="list-post">
                                        

                                                <?php

                                                $comment_query="SELECT * FROM `comments` WHERE `status`=1";
                                                $run_comment= mysqli_query($connect,$comment_query);
                                               while($data_comment= mysqli_fetch_assoc($run_comment))
                                               {
                                                $user_id= $data_comment['user_id'];
                                                $post_id= $data_comment['post_id'];

                                                $user_query="SELECT * FROM `user` WHERE `id`='$user_id'";
                                                $data_user= mysqli_query($connect,$user_query);
                                                $user_data= mysqli_fetch_assoc($data_user);
                                                ?>
                                                <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="commented_posts.php?user_id=<?php  echo $user_data['id']; ?>">
                                                        <img src="<?php
                                                        if($user_data['profile_photo']==NULL)
                                                        {
                                                            echo"assets/imgs/authors/default.jpg";
                                                        }
                                                        else
                                                        {
                                                         echo $user_data['profile_photo'];
                                                         } ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <p class="mb-10"><a href="commented_posts.php?user_id=<?php  echo $user_data['id']; ?>"><strong><?php echo $user_data['username']; ?></strong></a>
                                                        <span class="ml-15 font-small text-muted has-dot"><?php echo $data_comment['created_at']; ?></span>
                                                    </p>
                                                    <p class="text-muted font-small"><?php echo $data_comment['comment']; ?>...</p>
                                                </div>
                                            </div>
                                        </li>


                                    <?php } ?>
                                       
                                    </ul>
                                </div>
                            </div>
                         <div class="sidebar-widget widget_instagram wow fadeInUp animated">
    <div class="widget-header-1 position-relative mb-30">
        <h5 class="mt-5 mb-30">Trending...</h5>
    </div>

    <div class="instagram-gellay">
        <ul class="insta-feed">
            <?php
            $insta_query = "SELECT * FROM `youtube` WHERE `status`=1";
            $run_query = mysqli_query($connect, $insta_query);
            while($data_insta = mysqli_fetch_assoc($run_query))
            {
                ?>

                <li>
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $data_insta['post']; ?>?si=jJkBO3vDI_QtgDl0"
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                            encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                </li>
               

                <?php
            }
            ?>
        </ul>
    </div>
</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main content -->
   
    
    <?php

include'includes/footer.php';
    ?>