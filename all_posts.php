

<?php include'includes/header.php';  ?>

 <main>
        <!--archive header-->
        <div class="archive-header pt-50 text-center">
            <div class="container">
                <h2 class="font-weight-900">All Posts</h2>
                    <a href="index.php" >
                    <span><i class="fa-solid fa-house"></i></span></a> Explore More
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <div class="container">
            <div class="loop-list loop-list-style-1">
                <div class="row">


                    <?php

    $post_query="SELECT * FROM `posts` WHERE `status`='1'";
    $post_run= mysqli_query($connect,$post_query);
   while( $post_data= mysqli_fetch_assoc($post_run))
{

    $menu_id= $post_data['menu'];
    $menu_query="SELECT * FROM `menu` WHERE `id`='$menu_id'";
    $menu_run= mysqli_query($connect,$menu_query);
    $menu_data= mysqli_fetch_assoc($menu_run);
?>


                    <article class="col-md-6 mb-40 wow fadeInUp  animated">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(<?php echo $post_data['main_img']; ?>)">
                                <a class="img-link" href="single.php?id=<?php echo $post_data['id']; ?>"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="single.php?id=<?php echo $post_data['id']; ?>"><span class="post-cat text-info"><?php echo $menu_data['menu']; ?></span></a>
                                    <a href="single.php?id=<?php echo $post_data['id']; ?>"><span class="post-cat text-success"><?php echo $menu_data['icon']; ?></span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.php?id=<?php echo $post_data['id']; ?>"><?php echo $post_data['title']; ?></a>
                                    </h5>
                                    <div class="post-excerpt mb-25 font-small text-muted">
                                        <p><?php echo $post_data['subtitle']; ?></p>
                                    </div>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on"><?php echo $post_data['created_at']; ?></span>
                                        <span class="time-reading has-dot">12 mins read</span>
                                        <span class="post-by has-dot"><?php echo $post_data['views']; ?> views</span>
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
           <!--  <div class="row mt-50">
                <div class="col-12">
                    <div class="pagination-area mb-30 wow fadeInUp animated">
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
                    </div>
                </div>
            </div> -->
        </div>
    </main>
    <!-- End Main content -->
   
    </div>
    <!--end site-bottom-->
   <?php include'includes/footer.php';  ?>