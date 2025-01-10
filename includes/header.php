<!-- https://wp.alithemes.com/html/stories/demo/category.html -->

<?php include'includes/connect.php'; ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<link rel="icon" type="image/png" href="assets/imgs/logo/mylogo.png">
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .insta-feed {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .insta-feed li {
        flex: 1 1 calc(50% - 15px); /* Two items per row */
        box-sizing: border-box;
    }

    .insta-feed li iframe {
        border-radius: 5px;
        width: 100%;
        height: 200px; /* Adjust height as needed */
    }

    /* Responsive layout for smaller screens */
    @media (max-width: 768px) {
        .insta-feed li {
            flex: 1 1 100%;
        }
    }
</style>
    <style>
  .border-radius-5 {
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
  }
  .play-video:hover {
    opacity: 0.9;
    transition: opacity 0.3s;
  }
</style>
<!-- language translator script  -->
 <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>




    <!-- Font awesome -->
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



</head>

<body>
    <div class="scroll-progress primary-bg"></div>
    <!-- Start Preloader -->
    <!--     <div class="preloader text-center">
        <div class="circle"></div>
    </div> -->
    <!--Offcanvas sidebar-->
    <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
        <button class="off-canvas-close"><i class="fa-solid fa-icons"></i></button>
        <div class="sidebar-inner">
            <!--Categories-->
            <div class="sidebar-widget widget_categories mb-50 mt-30">
                <div class="widget-header-2 position-relative">
                    <h5 class="mt-5 mb-15">Hot topics</h5>
                </div>
                <div class="widget_nav_menu">
                    <ul>

                        <?php
                            $query_n="SELECT *  FROM `menu` WHERE `status`=1";
                            $run_n= mysqli_query($connect,$query_n);
                            while($bird=  mysqli_fetch_assoc($run_n))
                            {
                                $mid= $bird['id'];
                                $query_m="SELECT *  FROM `posts` WHERE `menu`=$mid";
                                 $run_m= mysqli_query($connect,$query_m);
                                 $mcount= mysqli_num_rows($run_m);
                            ?>
                            <li class="cat-item cat-item-2"><a href="explore.php"><?php echo $bird['menu']; ?></a> <span class="post-count"><?php echo $mcount; ?></span></li>
                            <?php
                            }


                        ?>
                        
                     
                    </ul>
                </div>
            </div>
            <!--Latest-->
            <div class="sidebar-widget widget-latest-posts mb-50">
                <div class="widget-header-2 position-relative mb-30">
                    <h5 class="mt-5 mb-30">Don't miss</h5>
                </div>
                <div class="post-block-list post-module-1 post-module-5">
                    <ul class="list-post">

                            <?php
                           
                                $hot_query="SELECT *  FROM `posts` WHERE `status`= '1' AND `hot`= '1' ";
                                 $hot_run= mysqli_query($connect,$hot_query);
                                while($hot_data= mysqli_num_rows($hot_run))
                                {
                            ?>


                        <li class="mb-30">
                            <div class="d-flex hover-up-2 transition-normal">
                                <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                    <a class="color-white" href="single.php?id=<?php echo $hot_data['id']; ?>">
                                        <img src="<?php echo $hot_data['main_img']; ?>" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.php?id=<?php echo $hot_data['id']; ?>"><?php echo $hot_data['title']; ?></a></h6>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on"><?php echo $hot_data['created_at']; ?></span>
                                        <span class="post-by has-dot"><?php echo $hot_data['views']; ?> views</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!--Ads-->
            <div class="sidebar-widget widget-ads">
                <div class="widget-header-2 position-relative mb-30">
                    <h5 class="mt-5 mb-30">Advertise banner</h5>
                </div>

                <?php
                    $queryad="SELECT * FROM `advertise` WHERE `status`=1";
                    $runad= mysqli_query($connect,$queryad);
                    $datad =mysqli_fetch_assoc($runad);

                ?>
                <a target="_blank" href="<?php echo $datad['link']; ?>" target="_blank">
                    <img class="advertise-img border-radius-5" src="<?php echo $datad['img']; ?>" alt="">
                </a>
            </div>
        </div>
    </aside>
    <!-- Start Header -->
    <header class="main-header header-style-1 font-heading">
        <div class="header-top">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-md-3 col-xs-6">
                        <a href="index.php">
                            <img class="logo" src="assets/imgs/logo/mylogo.png" alt="The Tech India">
                           

                        </a>
                    </div>
                    <div class="col-md-9 col-xs-6 text-right header-top-right ">
                        <ul class="list-inline nav-topbar d-none d-md-inline">
                          

                            <li class="list-inline-item">
                                  <div id="google_translate_element"></div>
                              </li>
                        </ul>
                        <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                        <button class="search-icon d-none d-md-inline"><span class="mr-15 text-muted font-small"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <button  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow" title="Click Here to be Creator"><i class="fa-solid fa-camera"></i>  </button>

                        <a href="blogadmin/index.php"> <button  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-radius bg-success text-white ml-15 font-small box-shadow"> <i class="fa-solid fa-right-to-bracket"></i> &emsp;Login</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky">
            <div class="container align-self-center position-relative">
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="main-nav d-none d-lg-block float-left">
                    <nav>
                        <!--Desktop menu-->
                        <ul class="main-menu d-none d-lg-inline font-small">
                           
                           
                           <?php

                            $query1="SELECT * FROM `menu` WHERE `status`=1";
                            $run1= mysqli_query($connect,$query1);
                            while($data1= mysqli_fetch_assoc($run1))
                            {
                            ?>
                            <li> <a href="<?php echo $data1['target_page']; ?>"> <?php echo $data1['icon']; ?> <?php echo $data1['menu']; ?></a> </li>
                            <?php
                            }


                           ?>
                          
                        </ul>
                        <!--Mobile menu-->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li class="menu-item-has-children">
                                <a href="#">Menus</a>
                                <ul class="sub-menu text-muted font-small">
                                     <?php

                            $query1="SELECT * FROM `menu` WHERE `status`=1";
                            $run1= mysqli_query($connect,$query1);
                            while($data1= mysqli_fetch_assoc($run1))
                            {
                            ?>
                             <li><a href="<?php echo $data1['target_page']; ?>"><?php echo $data1['menu']; ?></a></li>
                        
                            <?php
                            }


                           ?>
                                   
                                </ul>
                            </li>
                           
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                    </ul>
                    <div class="off-canvas-toggle-cover d-inline-block">
                        <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>
    <!--Start search form-->
    <div class="main-search-form">
        <div class="container">
            <div class=" pt-50 pb-50 ">
                <div class="row mb-20">
                    <div class="col-12 align-self-center main-search-form-cover m-auto">
                        <p class="text-center"><span class="search-text-bg">Search</span></p>
                     <form action="#" class="search-header" id="searchForm">
    <div class="input-group w-100">
        <input type="text" id="searchQuery" class="form-control" placeholder="Search stories, places, and people" onkeyup="showSuggestions()" autocomplete="off">
        <div class="input-group-append">
            <button class="btn btn-search bg-white" type="button" onclick="performSearch()">
                <i class="elegant-icon icon_search"></i>
            </button>
        </div>
    </div>
    <!-- Suggestions will be displayed here -->
    <div id="suggestions" class="suggestions-box"></div>
</form>


                            <script type="text/javascript">
                            function showSuggestions() {
    const query = document.getElementById("searchQuery").value;

    // Clear suggestions if the query is empty
    if (query.trim() === "") {
        document.getElementById("suggestions").innerHTML = "";
        return;
    }

    // AJAX request to fetch suggestions
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "php_code/suggest.php?query=" + encodeURIComponent(query), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            let suggestionsHtml = "";

            if (response.length > 0) {
                // Generate the HTML for each suggestion
                response.forEach(item => {
                    suggestionsHtml += `<div class="suggestion-item" onclick="redirectToPost(${item.id})">${item.title}</div>`;
                });
            } else {
                suggestionsHtml = "<div class='suggestion-item'>No results found</div>";
            }

            document.getElementById("suggestions").innerHTML = suggestionsHtml;
        }
    };
    xhr.send();
}

function redirectToPost(id) {
    // Redirect to the selected post
    window.location.href = "single.php?id=" + id;
}

function performSearch() {
    const query = document.getElementById("searchQuery").value;
    if (query.trim() !== "") {
        showSuggestions(); // Show suggestions if available
    }
}


                            </script>

                    </div>
                </div>
                <div class="row mt-80 text-center">
                    <div class="col-12 font-small suggested-area">
                        <h5 class="suggested font-heading mb-20 text-muted"> <strong>Suggested keywords:</strong></h5>
                        <ul class="list-inline d-inline-block">
                            <?php 
                                $query_sug= "SELECT * FROM `menu` WHERE `status`=1";
                                $run_sug= mysqli_query($connect,$query_sug);
                                while($suggest= mysqli_fetch_assoc($run_sug))
                                {

                                ?>

                                     <li class="list-inline-item"><a href="<?php echo $suggest['target_page']; ?>"><?php echo $suggest['icon']; ?> <?php echo $suggest['menu']; ?></a></li>

                                <?php
                                }
                            ?>
                          
                        </ul>
                    </div>
                </div>
              <!--   <div class="row mt-80">


                    <div class="col-lg-4">
                        <div class="d-flex bg-grey has-border p-25 hover-up-2 transition-normal border-radius-5 mb-30">
                            <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html">
                                    <img src="assets/imgs/news/thumb-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6> <a href="category.html">Travel Tips</a> </h6>
                                <p class="text-muted font-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex bg-grey has-border p-25 hover-up-2 transition-normal border-radius-5 mb-30">
                            <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html">
                                    <img src="assets/imgs/news/thumb-4.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6> <a href="category.html">Lifestyle</a> </h6>
                                <p class="text-muted font-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6">
                        <div class="d-flex bg-grey has-border p-25 hover-up-2 transition-normal border-radius-5 mb-30">
                            <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html">
                                    <img src="assets/imgs/news/thumb-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6> <a href="category.html">Hotel Review</a> </h6>
                                <p class="text-muted font-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>









<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><img src="assets/imgs/logo/mylogo.png"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <!-- form start here -->
 <form id="signupForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('password', this)">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required onkeyup="checkPasswordMatch()">
                <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('confirmPassword', this)">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
            <small id="passwordError" class="text-danger"></small>
        </div>
       



<script>
function togglePasswordVisibility(fieldId, icon) {
    const passwordField = document.getElementById(fieldId);
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
    } else {
        passwordField.type = "password";
        icon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
    }
}

function checkPasswordMatch() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const errorDisplay = document.getElementById("passwordError");

    if (password !== confirmPassword) {
        errorDisplay.innerText = "Passwords do not match.";
    } else {
        errorDisplay.innerText = "";
    }
}

document.getElementById("signupForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Collect form data
    const formData = new FormData(this);

    // AJAX request
    fetch("php_code/signup.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const messageDiv = document.getElementById("message");
        messageDiv.innerHTML = "";
        if (data.status === "success") {
            messageDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
            document.getElementById("signupForm").reset(); // Reset the form
        } else {
            messageDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
  $("#signupForm").on("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    // Collect form data
    const formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      password: $("#password").val(),
    };

    // Send data via AJAX
    $.ajax({
      url: "php_code/sign_up.php", // URL to your PHP file
      type: "POST",
      data: formData,
      dataType: "json",
      success: function(response) {
        if (response.status === "success") {
          alert(response.message); // Show success message
          console.log(response.message);
          $("#signupForm")[0].reset(); // Optionally reset the form
        } else {
          alert(response.message); // Show error message
          console.log(response.message);
        }
      },
      error: function(xhr, status, error) {
        alert("An error occurred: " + error); // Show error message
      }
    });
  });
});
</script>



                <!-- form ends here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Leave</button>
         <button type="submit" class="btn btn-primary">Became a Creator</button>
    </form>

        <div id="signupStatus"></div>
      </div>
    </div>
  </div>
</div>