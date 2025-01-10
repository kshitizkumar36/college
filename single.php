<?php


$id= $_GET['id'];

if($id==NULL)
{
    header("Location: all_posts.php");
    exit();

}

if (!is_numeric($id) || (int)$id != $id) {
    echo "ID is not a valid integer.";
    // Redirect or handle the error
    header("Location: all_posts.php");
    exit();
}

?>



<?php include'includes/header.php';

 $query="SELECT * FROM `posts` WHERE `id`=$id";
     $run= mysqli_query($connect,$query);

    $count= mysqli_num_rows($run);
    if($count<=0)
    {
        header("Location: all_posts.php");
    exit();
    }
  ?>



<?php
    $query="SELECT * FROM `posts` WHERE `id`=$id";
    $run= mysqli_query($connect,$query);
    $data= mysqli_fetch_assoc($run);
    $older_view= $data['views'];
    $new_view= $older_view+1;
    $query_view= "UPDATE `posts` SET `views`='$new_view' WHERE `id`='$id'";
    $run_view= mysqli_query($connect,$query_view);
        if(!$run_view)
        {
            echo"<script>alert('View is not Recorded for this Post!!!')</script>";
        }


?>

    <title><?php echo $data['subtitle']; ?> !!</title>

<link rel="icon" type="image/png" href="assets/imgs/logo/mylogo.png">
    <meta property="og:title" content="Your Post Title">
    <meta property="og:description" content="<?php echo $data['title']; ?>">
    <meta property="og:image" content="https://thetechindia.in/<?php echo $data['main_img']; ?>">
    <meta property="og:url" content="https://thetechindia.in/single.php?id=<?php  echo $data['id']; ?>">
    <meta property="og:type" content="website">

    <!-- Favicon (Title Bar Image) -->
    <link rel="icon" type="image/png" href="https://thetechindia.in/<?php echo $data['main_img']; ?>">



    <main class="bg-grey pb-30">
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-50">
                <h1 class="entry-title mb-50 font-weight-900">
                   <?php echo $data['title']; ?>
                </h1>

                <?php
                    $user_id= $data['user_id'];
                    $query_user= "SELECT * FROM `user` WHERE `id`='$user_id'";
                    $run_user= mysqli_query($connect,$query_user);
                    $userd= mysqli_fetch_assoc($run_user);

                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="entry-meta align-items-center meta-2 font-small color-muted">
                            <p class="mb-5">
                                <a class="author-avatar" href="#"><img class="img-circle" src="<?php echo $userd['profile_photo']; ?>" alt=""></a>
                                By <a href="#"><span class="author-name font-weight-bold"><?php echo $userd['username']; ?></span></a>
                            </p>
                            <span class="mr-10">  <?php echo $data['created_at']; ?></span>
                            <span class="has-dot"> 8 mins read</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right d-none d-md-inline">
                        <ul class="header-social-network d-inline-block list-inline mr-15">
                            <li class="list-inline-item text-muted"><span>Share this: </span></li>
                            <li class="list-inline-item"><a title="Click here to share on Facebook" class="social-icon fb text-xs-center"  target="_blank" onclick="shareOnFacebook()"><i class="fa-brands fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a  title="Click here to share on Instagram" class="social-icon tw text-xs-center" target="_blank" onclick="shareOnInstagram()"><i class="fa-brands fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a title="Click here to share on Twitter" class="social-icon pt text-xs-center" target="_blank" onclick="shareOnTwitter()"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end single header-->
            <figure class="image mb-30 m-auto text-center border-radius-10">
                <img class="border-radius-10" src="<?php echo $data['main_img']; ?>" alt="post-title" />
            </figure>
            <!--figure-->
            <article class="entry-wraper mb-50">
                <div class="excerpt mb-30">
                    <p> <?php echo $data['detail1']; ?></p>
                </div>
                <div class="entry-main-content dropcap wow fadeIn animated">
                    <p> <?php echo $data['detail2']; ?></p>
                    <hr class="wp-block-separator is-style-dots">
                    <p><?php echo $data['detail3']; ?></p>
                    <figure class="wp-block-gallery columns-3 wp-block-image">
                        <ul class="blocks-gallery-grid">
                            <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="<?php echo $data['img1']; ?>" alt=""></a></li>
                            <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="<?php echo $data['img2']; ?>" alt=""></a></li>
                            <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="<?php echo $data['img3']; ?>" alt=""></a></li>
                        </ul>
                        <figcaption> <i class="ti-credit-card mr-5"></i>Image credit: <?php echo $userd['username']; ?> </figcaption>
                    </figure>
                    <hr class="section-divider">
                    <p><?php echo $data['detail4']; ?></p>
                    <h2><?php echo $data['subtitle']; ?></h2>
                    <p><?php echo $data['detail4']; ?></p>
                   
                    <!--Begin Subcrible-->
                    <div class="border-radius-10 border bg-white mb-30 p-30 wow fadeIn animated">
                        <div class="row justify-content-between">
                            <div class="col-md-5 mb-2 mb-md-0">
                                <h5 class="font-weight-bold secondfont mb-30 mt-0">Become a member</h5>
                                <p class="font-small">Get the latest news right in your inbox. We never spam!</p>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Enter your e-mail address">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Subcrible-->
                   
                </div>
              
                <!--related posts-->
                <div class="related-posts">
                    <div class="post-module-3">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Related posts</h5>
                        </div>
                        <div class="loop-list loop-list-style-1">


                                <?php

                          

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
                                                    <li><a class="fb" onclick="shareOnFacebook()" title="Share on Facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                                    <li><a class="tw" onclick="shareOnInstagram()" target="_blank" title="Tweet now"><i class="fa-brands fa-instagram"></i></a></li>
                                                    <li><a class="pt" onclick="shareOnTwitter()" target="_blank" title="Pin it"><i class="fa-brands fa-square-x-twitter"></i></a></li>

                          

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
                </div>
                <!--More posts-->
                 <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1";
                            $run= mysqli_query($connect,$query);
                            $count= mysqli_num_rows($run);
                            $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `id`='$my_id'";
                            $run= mysqli_query($connect,$sql);
                            $data= mysqli_fetch_assoc($run);

                        ?>

                <div class="single-more-articles border-radius-5">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">You might be interested in</h5>
                        <button class="single-more-articles-close"><i class="elegant-icon icon_close"></i></button>
                    </div>
                    <div class="post-block-list post-module-1 post-module-5">
                        <ul class="list-post">
                            <li class="mb-30">
                                <div class="d-flex hover-up-2 transition-normal">
                                    <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                        <a class="color-white" href="single.php?id=<?php echo $data['id']; ?>">
                                            <img src="<?php echo $data['main_img']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a></h6>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on"><?php echo $data['created_at']; ?></span>
                                            <span class="post-by has-dot"><?php echo $data['views']; ?> views</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                             <?php

                            $query="SELECT * FROM `posts` WHERE `status`=1";
                            $run= mysqli_query($connect,$query);
                            $count= mysqli_num_rows($run);
                            $my_id= rand(1,$count);

                            $sql= "SELECT * FROM `posts` WHERE `id`='$my_id'";
                            $run= mysqli_query($connect,$sql);
                            $data= mysqli_fetch_assoc($run);

                        ?>
                            <li class="mb-10">
                                <div class="d-flex hover-up-2 transition-normal">
                                    <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                        <a class="color-white" href="single.php?id=<?php echo $data['id']; ?>">
                                            <img src="<?php echo $data['main_img'];?>" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.php?id=<?php echo $data['id']; ?>"><?php  echo $data['title']; ?></a></h6>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on"><?php  echo $data['created_at']; ?></span>
                                            <span class="post-by has-dot"><?php  echo $data['views']; ?> views</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Comments-->
                  <div class="entry-bottom mt-50 mb-30 wow fadeIn animated">
                    <div class="tags">
                       <!--  <span>Tags: </span>
                        <a href="category.html" rel="tag">deer</a>
                        <a href="category.html" rel="tag">nature</a>
                        <a href="category.html" rel="tag">conserve</a> -->
                    </div>
                </div>
                <div class="single-social-share clearfix wow fadeIn animated">
                    <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                        <span class="hit-count mr-15"><i class="fa-solid fa-comment"></i>

                            <?php
                                $comment_query1="SELECT * FROM `comments` WHERE `post_id`='$id'";
                                $run_comment= mysqli_query($connect,$comment_query1);
                                $count= mysqli_num_rows($run_comment);

                            ?>

                        <?php echo $count; ?> comments</span>
                    </div>
                    <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                          <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank"  onclick="shareOnFacebook()"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank"  onclick="shareOnInstagram()"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank"  onclick="shareOnTwitter()"><i class="fa-brands fa-square-x-twitter"></i></a></li>


                       


                    </ul>
                </div>
                <!--author box-->
                <div class="author-bio p-30 mt-50 border-radius-10 bg-white wow fadeIn animated">
                    <div class="author-image mb-30">
                        <a href="#"><img src="<?php echo $userd['profile_photo']; ?>" alt="" class="avatar"></a>
                    </div>
                    <div class="author-info">
                        <h4 class="font-weight-bold mb-20"><span class="vcard author"><span class="fn"><a href="all_posts.php" title="Posted by Barbara Cartland" rel="author"><?php echo $userd['username']; ?></a></span></span>
                        </h4>
                        <h5 class="text-muted">About author</h5>
                        <div class="author-description text-muted"><?php echo $userd['about']; ?> </div>

                        <?php

                            $user_id= $userd['id'];
                            $queryuser="SELECT * FROM `posts` WHERE `user_id`='$user_id'";
                            $runuser= mysqli_query($connect,$queryuser);
                            $count_post= mysqli_num_rows($runuser);                        ?>
                        <a href="all_posts.php" class="author-bio-link mb-md-0 mb-3">View all posts (<?php echo $count_post; ?>)</a>
                        <div class="author-social">
                            <ul class="author-social-icons">
                                <li class="author-social-link-facebook"><a href="<?php echo $userd['facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                <li class="author-social-link-twitter"><a href="<?php echo $userd['insta']; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="author-social-link-pinterest"><a href="<?php echo $userd['whatsapp']; ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="comments-area">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Comments</h5>
                    </div>
                    <div class="comment-list wow fadeIn animated">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="assets/imgs/authors/author-4.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                      
                                    </p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list wow fadeIn animated">

                        <?php
                            $comment_query2="SELECT * FROM `comments` WHERE `post_id`='$id'";
                            $run_query2=mysqli_query($connect,$comment_query2);
                            while($data_query2= mysqli_fetch_assoc($run_query2))
                            {

                                $userkaid=$data_query2['user_id'];
                                $userkaquery="SELECT * FROM `user` WHERE `id`='$userkaid'";
                                $userrun= mysqli_query($connect,$userkaquery);
                                $datame= mysqli_fetch_assoc($userrun);
                        ?>
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img style="height: 50px; width: 50px;"  src="<?php echo $datame['profile_photo']; ?>" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        <?php echo $data_query2['comment']; ?>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#"><?php echo $datame['username']; ?></a>
                                            </h5>
                                            <p class="date"><?php echo $data_query2['created_at']; ?> </p>
                                        </div>
                                        <div class="reply-btn">
                                            <!-- <a href="#" class="btn-reply">Reply</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php


                        }
                    ?>
                      
                </div>
                <!--comment form-->
                <div class="comment-form wow fadeIn animated">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Leave a Reply</h5>
                    </div>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn button button-contactForm">Post Comment</button>
                        </div>
                    </form>
                </div>
            </article>
        </div>
        <!--container-->
    </main>
   
    <!--end site-bottom-->
    <?php include'includes/footer.php';  ?>