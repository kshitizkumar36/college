
<link rel="icon" type="image/png" href="assets/imgs/logo/mylogo.png">

<div class="site-bottom pt-50 pb-50">
        <?php

// Fetch all categories from the menu table
$categoriesSQL = "SELECT * FROM menu";
$categoriesResult = $connect->query($categoriesSQL);

if ($categoriesResult->num_rows > 0): ?>
    <div class="container">
        <div class="row">
            <?php while ($category = $categoriesResult->fetch_assoc()): 
                $categoryId = $category['id'];
                $categoryName = htmlspecialchars($category['menu']);

                // Fetch latest 3 posts for the current category
               $postsSQL = "SELECT *, DATE_FORMAT(created_at, '%d %M') as formatted_date 
             FROM posts 
             WHERE menu = $categoryId 
             ORDER BY created_at DESC 
             LIMIT 3";
$postsResult = $connect->query($postsSQL);

            ?>
            <div class="col-lg-4 col-md-6">
                <div class="sidebar-widget widget-latest-posts mb-30 wow fadeInUp animated">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30"><?= $categoryName ?></h5>
                    </div>
                    <div class="post-block-list post-module-1">
                        <ul class="list-post">
                            <?php if ($postsResult->num_rows > 0): 
                                while ($post = $postsResult->fetch_assoc()):
                                    $postTitle = htmlspecialchars($post['title']);
                                    $postDate = htmlspecialchars($post['formatted_date']);
                                    $postViews = htmlspecialchars($post['views']);
                                    $postThumbnail = htmlspecialchars($post['main_img']);
                                    $postUrl = htmlspecialchars($post['id']);
                            ?>
                            <?php
                                $postUrl='single.php?id='.$postUrl;
                            ?>
                            <li class="mb-30">
                                <div class="d-flex hover-up-2 transition-normal">
                                    <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                        <a class="color-white" href="<?= $postUrl ?>">
                                            <img src="<?= $postThumbnail ?>" alt="<?= $postTitle ?>">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-15 text-limit-2-row font-medium">
                                            <a href="all_posts.php"><?= $postTitle ?></a>
                                        </h6>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on"><?= $postDate ?></span>
                                            <span class="post-by has-dot"><?= $postViews ?> views</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; 
                            else: ?>
                            <li>No posts available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <!-- Categories Carousel Section -->
        <div class="sidebar-widget widget-latest-posts mb-30 mt-20 wow fadeInUp animated">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="mt-5 mb-30">Categories</h5>
            </div>
            <div class="carausel-3-columns">
                <?php
                // Reset category result pointer and fetch all categories again for the carousel
                $categoriesResult->data_seek(0);
                while ($carouselCategory = $categoriesResult->fetch_assoc()):
                    $carouselCategoryId = $carouselCategory['id'];
                     $details = $carouselCategory['details'];
                    $carouselCategoryName = htmlspecialchars($carouselCategory['menu']);
                       


                    // Fetch the first post thumbnail for each category for the carousel
                    $carouselPostSQL = "SELECT * FROM posts WHERE id = $carouselCategoryId LIMIT 1";
                    $carouselPostResult = $connect->query($carouselPostSQL);
                    $carouselThumbnail = "assets/imgs/news/default.jpg"; // Default image
                    $carouselUrl = "#"; // Default URL
                    if ($carouselPostResult->num_rows > 0) {
                        $carouselPost = $carouselPostResult->fetch_assoc();
                        $carouselThumbnail = htmlspecialchars($carouselPost['main_img']);
                        $carouselUrl = htmlspecialchars($carouselPost['id']);
                    }
                ?>
                <div class="carausel-3-columns-item d-flex bg-grey has-border p-25 hover-up-2 transition-normal border-radius-5">
                    <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                        <a class="color-white" href="all_posts.php">
                            <img src="<?= $carouselThumbnail ?>" alt="<?= $carouselCategoryName ?>">
                        </a>
                    </div>
                    <div class="post-content media-body">
                        <h6><a href="<?= $carouselUrl ?>"><?= $carouselCategoryName ?></a></h6>
                        <p class="text-muted font-small"><?= $details ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif;
$connect->close();
?>
    </div>

<!-- Footer Start-->
    <footer class="pt-50 pb-20 bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="sidebar-widget wow fadeInUp animated mb-30">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">About me</h5>
                        </div>
                        <div class="textwidget">
                            <p>
                                Start writing, no matter what. The water does not flow until the faucet is turned on.
                            </p>
                            <p><strong class="color-black">Address</strong><br>
                                Your Heart <br>
                                You are my loved one. I love you....</p>
                            <p><strong class="color-black">Follow me</strong><br>
                                <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="tw" href="#" target="_blank" title="Tweet now"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="pt" href="#" target="_blank" title="Pin it"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="sidebar-widget widget_categories wow fadeInUp animated mb-30" data-wow-delay="0.1s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Produ to be</h5>
                        </div>
                        <ul class="font-small">
                        
                            <li class="cat-item cat-item-2"><a href="#">I</a></li>
                            <li class="cat-item cat-item-4"><a href="#">N</a></li>
                            <li class="cat-item cat-item-5"><a href="#">D</a></li>
                            <li class="cat-item cat-item-6"><a href="#">I</a></li>
                            <li class="cat-item cat-item-7"><a href="#">A</a></li>
                            <li class="cat-item cat-item-2"><a href="#">N</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sidebar-widget widget_tagcloud wow fadeInUp animated mb-30" data-wow-delay="0.2s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30"># HashTags</h5>
                        </div>
                        <div class="tagcloud mt-50">
                            <?php  
                            include'connect.php';
                            $query="SELECT * FROM `menu` WHERE `status`= 1 ";
                            $run= mysqli_query($connect,$query);
                            while($data= mysqli_fetch_assoc($run))
                            {


                                ?>
                                     <a class="tag-cloud-link" href="<?php echo $data['target_page']; ?>"><?php echo $data['menu']; ?></a>


                                <?php
                            }
                            ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar-widget widget_newsletter wow fadeInUp animated mb-30" data-wow-delay="0.3s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Newsletter</h5>
                        </div>
                        <div class="newsletter">
                            <p class="font-medium">"If you subscribe to me, I'll feel on top of the world!".</p>
                           <form method="post" class="input-group form-subcriber mt-30 d-flex">
    <input type="email" name="email" class="form-control bg-white font-small" placeholder="Enter your email" required>
    <button class="btn bg-primary text-white" type="submit">Subscribe</button>
    <label class="mt-20">
        <input class="mr-5" name="agree" type="checkbox" value="1" required> I agree to the 
        <a href="#" target="_blank">terms &amp; conditions</a>
    </label>
    <!-- Container for displaying the message -->
    <div id="message" style="margin-top: 10px;"></div>
</form>


                            <script>
    document.querySelector('.form-subcriber').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Prepare form data
        const formData = new FormData(this);

        // Send AJAX request to subscribe.php
        fetch('php_code/subscribe.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Get the message container or create one if it doesn't exist
            let messageDiv = document.getElementById('message');
            if (!messageDiv) {
                messageDiv = document.createElement('div');
                messageDiv.id = 'message';
                this.appendChild(messageDiv);
            }

            // Display the message and set its color based on the status
            messageDiv.innerText = data.message;
            messageDiv.style.color = data.status === 'success' ? 'green' : 'red';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy-right pt-30 mt-20 wow fadeInUp animated">
                <p class="float-md-left font-small text-muted">© 2024, The Tech India ! Story of Indian Technology </p>
                <p class="float-md-right font-small text-muted">
                    Design by <a href="https://kshitizkumar.com/" target="_blank">Kshitiz</a> | All rights reserved
                </p>
            </div>
        </div>
    </footer>

    <title>The Tech India : Story of Our Pride !!</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/mylogo.png">
    
    
    <!-- End Footer -->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery.slicknav.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/jquery.ticker.js"></script>
    <script src="assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="assets/js/vendor/jquery.sticky.js"></script>
    <script src="assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- NewsBoard JS -->
    <script async src="//www.instagram.com/embed.js"></script>

    <script src="assets/js/main.js"></script>


    <script type="text/javascript">
//         function shareOnFacebook() {
//     // Get the current URL
//     const postId = new URLSearchParams(window.location.search).get("id");
//     const url = `http://thetechindia.in/single.php?id=${postId}`;

//     // Facebook Share Dialog URL
//     const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;

//     // Open the Share Dialog in a new window
//     window.open(facebookShareUrl, 'facebook-share-dialog', 'width=800,height=600');




// }


function shareOnInstagram() {
    const postId = new URLSearchParams(window.location.search).get("id");
    const url = `http://thetechindia.in/single.php?id=${postId}`;

    // Direct Instagram Story sharing only works on mobile, so this uses the app protocol
    const instagramUrl = `instagram://story-camera?backgroundImageUrl=${encodeURIComponent(url)}`;

    // Open Instagram app if installed
    window.location.href = instagramUrl;
}


function shareOnTwitter() {
    // Get the current post ID
    const postId = new URLSearchParams(window.location.search).get("id");
    const url = `http://thetechindia.in/single.php?id=${postId}`;
    const text = "Check out this post!"; // You can customize this message

    // Twitter Share Dialog URL
    const twitterShareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;

    // Open the Share Dialog in a new window
    window.open(twitterShareUrl, 'twitter-share-dialog', 'width=800,height=600');
}


    </script>


<!-- signup scripts -->



</body>

</html>