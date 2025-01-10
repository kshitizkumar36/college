<?php
include'../../includes/connect.php';


// function compressImage($source, $destination, $quality) {
//     $imageInfo = getimagesize($source);
//     $mime = $imageInfo['mime'];

//     if ($mime == 'image/jpeg') {
//         $image = imagecreatefromjpeg($source);
//     } elseif ($mime == 'image/png') {
//         $image = imagecreatefrompng($source);
//     } else {
//         return false;
//     }

//     // Compress and save image
//     imagejpeg($image, $destination, $quality);
//     return filesize($destination) <= 200 * 1024;  // Return true if file is 200 KB or smaller
// }

// if (isset($_POST['submitBog'])) {
//     $blog_menu = $_POST['blog_menu'];
//     $title = $_POST['title'];
//     $subtitle = $_POST['subtitle'];

//     $main_file = 'assets/imgs/news/' . time() . $_FILES['main_img']['name'];
//     $img1 = 'assets/imgs/news/' . time() . $_FILES['img1']['name'];
//     $img2 = 'assets/imgs/news/' . time() . $_FILES['img_2']['name'];
//     $img3 = 'assets/imgs/news/' . time() . $_FILES['img_3']['name'];

//     $blog_part_1 = $_POST['blog_part_1'];
//     $blog_part_2 = $_POST['blog_part_2'];
//     $blog_part_3 = $_POST['blog_part_3'];
//     $blog4 = $_POST['blog4'];
//     $youtube = $_POST['youtube'];
//     $user_id = $_POST['user_id'];

//     $query = "INSERT INTO `posts`(`menu`, `title`, `subtitle`, `main_img`, `detail1`, `detail2`, `detail3`, `img1`, `img2`, `img3`, `detail4`, `youtube_link`, `user_id`) 
//               VALUES ('$blog_menu', '$title', '$subtitle', '$main_file', '$blog_part_1', '$blog_part_2', '$blog_part_3', '$img1', '$img2', '$img3', '$blog4', '$youtube', '$user_id')";
//     $run = mysqli_query($connect, $query);

//     if ($run) {
//         // Check and compress main image
//         if ($_FILES['main_img']['size'] > 200 * 1024) {
//             compressImage($_FILES['main_img']['tmp_name'], "../../$main_file", 75);
//         } else {
//             move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
//         }

//         // Check and compress img1
//         if ($_FILES['img1']['size'] > 200 * 1024) {
//             compressImage($_FILES['img1']['tmp_name'], "../../$img1", 75);
//         } else {
//             move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
//         }

//         // Check and compress img2
//         if ($_FILES['img_2']['size'] > 200 * 1024) {
//             compressImage($_FILES['img_2']['tmp_name'], "../../$img2", 75);
//         } else {
//             move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
//         }

//         // Check and compress img3
//         if ($_FILES['img_3']['size'] > 200 * 1024) {
//             compressImage($_FILES['img_3']['tmp_name'], "../../$img3", 75);
//         } else {
//             move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");
//         }

//         $_SESSION['msg'] = 'Post Added Successfully!';
//         header("Location:../posts.php");
//     }
// }



// if(isset($_POST['submitBog']))
// {

//     $blog_menu= $_POST['blog_menu'];
//     $title= $_POST['title'];
//     $subtitle= $_POST['subtitle'];


//     $main_file= $_FILES['main_img']['name'];
  

//                         $main_file= 'assets/imgs/news/'.time().$main_file;

//     $blog_part_1= $_POST['blog_part_1'];
//     $blog_part_2= $_POST['blog_part_2'];
//     $blog_part_3= $_POST['blog_part_3'];

//     $img_1= $_FILES['img1']['name'];
   
//                         $img1= 'assets/imgs/news/'.time().$img_1;


//     $img_2= $_FILES['img_2']['name'];
 
//                          $img2= 'assets/imgs/news/'.time().$img_2;

//     $img_3= $_FILES['img_3']['name'];
   
//                              $img3= 'assets/imgs/news/'.time().$img_3;

//     $blog4= $_POST['blog4'];

//     $youtube= $_POST['youtube'];
//     $user_id= $_POST['user_id'];


//     $query="INSERT INTO `posts`( `menu`, `title`, `subtitle`, `main_img`, `detail1`, `detail2`, `detail3`, `img1`, `img2`, `img3`, `detail4`,`youtube_link`,`user_id`) VALUES ('$blog_menu','$title','$subtitle','$main_file','$blog_part_1','$blog_part_2','$blog_part_3','$img1','$img2','$img3','$blog4','$youtube','$user_id')";
//     $run= mysqli_query($connect,$query);
//     if($run)
//     {


//         move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
//          move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
//           move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
//            move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");



//         $_SESSION['msg']= 'Post Added Successfully!';
//         header("Location:../posts.php");
//     }
    
// }
if(isset($_POST['submitBog'])) {
    $blog_menu = $_POST['blog_menu'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];

    // Get the file extension for main image and rename with timestamp
    $main_file_ext = pathinfo($_FILES['main_img']['name'], PATHINFO_EXTENSION);
    $main_file = time() . '.' . $main_file_ext;

    $blog_part_1 = $_POST['blog_part_1'];
    $blog_part_2 = $_POST['blog_part_2'];
    $blog_part_3 = $_POST['blog_part_3'];

    // Get the file extension for img1 and rename with timestamp
    $img1_ext = pathinfo($_FILES['img1']['name'], PATHINFO_EXTENSION);
    $img1 = time() . '1.' . $img1_ext;

    // Get the file extension for img2 and rename with timestamp
    $img2_ext = pathinfo($_FILES['img_2']['name'], PATHINFO_EXTENSION);
    $img2 = time() . '2.' . $img2_ext;

    // Get the file extension for img3 and rename with timestamp
    $img3_ext = pathinfo($_FILES['img_3']['name'], PATHINFO_EXTENSION);
    $img3 = time() . '3.' . $img3_ext;

    $blog4 = $_POST['blog4'];
    $youtube = $_POST['youtube'];
    $user_id = $_POST['user_id'];

    $query = "INSERT INTO `posts`(`menu`, `title`, `subtitle`, `main_img`, `detail1`, `detail2`, `detail3`, `img1`, `img2`, `img3`, `detail4`, `youtube_link`, `user_id`) VALUES ('$blog_menu','$title','$subtitle','$main_file','$blog_part_1','$blog_part_2','$blog_part_3','$img1','$img2','$img3','$blog4','$youtube','$user_id')";
    $run = mysqli_query($connect, $query);

    if($run) {
        // Move uploaded files to the target directory with new names
        move_uploaded_file($_FILES['main_img']['tmp_name'], "../../assets/imgs/news/$main_file");
        move_uploaded_file($_FILES['img1']['tmp_name'], "../../assets/imgs/news/$img1");
        move_uploaded_file($_FILES['img_2']['tmp_name'], "../../assets/imgs/news/$img2");
        move_uploaded_file($_FILES['img_3']['tmp_name'], "../../assets/imgs/news/$img3");

        $_SESSION['msg'] = 'Post Added Successfully!';
        header("Location:../posts.php");
    }
}




if(isset($_POST['deactivate']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `posts` SET`status`='0' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Post Status Changed';
        header("Location:../posts.php");
    }
}


if(isset($_POST['deactivate_admin']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `posts` SET`status`='0' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Post Status Changed';
        header("Location:../all_posts.php");
    }
}



if(isset($_POST['activate_admin']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `posts` SET `status`='1' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Post Status Changed';
        header("Location:../all_posts.php");
    }
}


if(isset($_POST['activate']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `posts` SET`status`='1' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Post Status Changed';
        header("Location:../posts.php");
    }
}



if(isset($_POST['loginnow']))
{
    $username= $_POST['username'];
     $password= $_POST['password'];

        $query="SELECT * FROM `user` WHERE `email`='$username' AND `password`='$password'";
        $run = mysqli_query($connect,$query);
        $count= mysqli_num_rows($run);
        $data= mysqli_fetch_assoc($run);
        $user_id= $data['id'];

        if($count>0)
        {
            $_SESSION['msg']='Login Successfully';
            $_SESSION['user_id']= $user_id;
            header("Location:../dashboard.php");
        }
        else
        {
            $_SESSION['msg']='Login Failed';
            header("Location:../../index.php");
        }
}


if(isset($_POST['delete_post']))
{
    $post_id= $_POST['post_id'];
    $query="DELETE FROM `POSTS` WHERE `id`='$post_id'";
    $run= mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Post Deleted';
        header("Location:../posts.php");
    }
    else
    {
         $_SESSION['msg']='Post Deletion Failed';
        header("Location:../posts.php");
    }
}



// if(isset($_POST['update_blog']))
// {
//     $post_id= $_POST['post_id'];
//     $blog_menu= $_POST['blog_menu'];
//     $title= $_POST['title'];
//     $subtitle= $_POST['subtitle'];


     

//                         if(isset($_FILES['main_img']['name'] ))
//                         {

//                             $main_file= $_FILES['main_img']['name']; 
//                         $main_file= 'assets/imgs/news/'.time().$main_file;

//                                $update_query="UPDATE `posts` SET `main_img`='$main_file' WHERE `id`='$post_id'";
//                                $run= mysqli_query($connect,$update_query);
//                                 if($run)
//                                 {
//                                       move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
//                                          // move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
//                                          //  move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
//                                          //   move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");
//                                 }
                              
//                         }

//     $blog_part_1= $_POST['blog_part_1'];
//     $blog_part_2= $_POST['blog_part_2'];
//     $blog_part_3= $_POST['blog_part_3'];

   

//                          if(isset($_FILES['img1']['name']))
//                         {

//                         $img_1= $_FILES['img1']['name'];

//                         $img1= 'assets/imgs/news/'.time().$img_1;

//                                $update_query="UPDATE `posts` SET `img1`='$img1' WHERE `id`='$post_id'";
//                                $run= mysqli_query($connect,$update_query);
//                                 if($run)
//                                 {
//                                       // move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
//                                          move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
//                                          //  move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
//                                          //   move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");
//                                 }
                              
//                         }


  

//                             if(isset($_FILES['img_2']['name']))
//                         {
//                             $img_2= $_FILES['img_2']['name'];

//                               $img2= 'assets/imgs/news/'.time().$img_2;

//                                $update_query="UPDATE `posts` SET `img2`='$img2' WHERE `id`='$post_id'";
//                                $run= mysqli_query($connect,$update_query);
//                                 if($run)
//                                 {
//                                       // move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
//                                          // move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
//                                           move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
//                                          //   move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");
//                                 }
                              
//                         }

  

   

//                              if(isset($_FILES['img_3']['name']))
//                         {
//                             $img_3= $_FILES['img_3']['name'];

//                              $img3= 'assets/imgs/news/'.time().$img_3;

//                                $update_query="UPDATE `posts` SET `img3`='$img3' WHERE `id`='$post_id'";
//                                $run= mysqli_query($connect,$update_query);
//                                 if($run)
//                                 {
//                                       // move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
//                                          // move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
//                                           // move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
//                                            move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");
//                                 }
                              
//                         }



//     $blog4= $_POST['blog4'];
//     $youtube= $_POST['youtube'];
//      $user_id= $_POST['user_id'];


//                 $update_query="UPDATE `posts` SET `menu`='$blog_menu',`title`='$title',`subtitle`='$subtitle',`detail1`='$blog_part_1',`detail2`='$blog_part_2',`detail3`='$blog_part_3',`detail4`='$blog4',`youtube_link`='$youtube',`user_id`='$user_id' WHERE `id`='$post_id'";

//                 $run= mysqli_query($connect,$update_query);
//                 if($run)
//                 {
//                     $_SESSION['msg']='Blog Updated Successfully';
//                     header("Location:../posts.php");
//                 }
//                 else
//                 {
//                       $_SESSION['msg']='Blog Updation Failed';
//                     header("Location:../posts.php");
//                 }
// }


if (isset($_POST['update_blog'])) {
    $post_id = $_POST['post_id'];
    $blog_menu = $_POST['blog_menu'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $blog_part_1 = $_POST['blog_part_1'];
    $blog_part_2 = $_POST['blog_part_2'];
    $blog_part_3 = $_POST['blog_part_3'];
    $blog4 = $_POST['blog4'];
    $youtube = $_POST['youtube'];
    $user_id = $_POST['user_id'];

    // Initialize variables for images to be updated
    $main_file = $img1 = $img2 = $img3 = null;

    // Main image upload
    if (isset($_FILES['main_img']['name']) && $_FILES['main_img']['error'] == 0) {
        $main_file = 'assets/imgs/news/' . time() . $_FILES['main_img']['name'];
        move_uploaded_file($_FILES['main_img']['tmp_name'], "../../$main_file");
    }

    // Image 1 upload
    if (isset($_FILES['img1']['name']) && $_FILES['img1']['error'] == 0) {
        $img1 = 'assets/imgs/news/' . time() . $_FILES['img1']['name'];
        move_uploaded_file($_FILES['img1']['tmp_name'], "../../$img1");
    }

    // Image 2 upload
    if (isset($_FILES['img_2']['name']) && $_FILES['img_2']['error'] == 0) {
        $img2 = 'assets/imgs/news/' . time() . $_FILES['img_2']['name'];
        move_uploaded_file($_FILES['img_2']['tmp_name'], "../../$img2");
    }

    // Image 3 upload
    if (isset($_FILES['img_3']['name']) && $_FILES['img_3']['error'] == 0) {
        $img3 = 'assets/imgs/news/' . time() . $_FILES['img_3']['name'];
        move_uploaded_file($_FILES['img_3']['tmp_name'], "../../$img3");
    }

    // Build the update query
    $update_query = "UPDATE `posts` SET 
        `menu` = '$blog_menu', 
        `title` = '$title', 
        `subtitle` = '$subtitle', 
        `detail1` = '$blog_part_1', 
        `detail2` = '$blog_part_2', 
        `detail3` = '$blog_part_3', 
        `detail4` = '$blog4', 
        `youtube_link` = '$youtube', 
        `user_id` = '$user_id'";

    // Add image columns only if they were uploaded
    if ($main_file) $update_query .= ", `main_img` = '$main_file'";
    if ($img1) $update_query .= ", `img1` = '$img1'";
    if ($img2) $update_query .= ", `img2` = '$img2'";
    if ($img3) $update_query .= ", `img3` = '$img3'";

    $update_query .= " WHERE `id` = '$post_id'";

    $run = mysqli_query($connect, $update_query);
    if ($run) {
        $_SESSION['msg'] = 'Blog Updated Successfully';
    } else {
        $_SESSION['msg'] = 'Blog Update Failed';
    }
    header("Location:../posts.php");
}




if(isset($_POST['update_profile']))
{
    $username= $_POST['username'];
    $city= $_POST['city'];
    $state= $_POST['state'];
    $country= $_POST['country'];
    $facebook= $_POST['facebook'];
    $instagram= $_POST['instagram'];
    $whatsapp= $_POST['whatsapp'];
    $about= $_POST['about'];
    $user_id= $_POST['user_id'];
    $password= $_POST['password'];
   

   $query="UPDATE `user` SET `password`='$password',`username`='$username',`country`='$country',`state`='$state',`city`='$city',`facebook`='$facebook',`insta`='$instagram',`whatsapp`='$whatsapp',`about`='$about' WHERE `id`='$user_id'";
   $run = mysqli_query($connect,$query);
   if($run)
   {
    $_SESSION['msg']= 'Profile Updated Successfully';
    header("Location:../profile.php");
   }
   else
   {
    $_SESSION['msg']= 'Profile Updation Failed!';
    header("Location:../profile.php");
   }
}






if(isset($_POST['update_photo']))
{
    $user_id= $_POST['user_id'];
    $photo= $_FILES['profile_photo']['name'];
    $photo= 'assets/imgs/news/'.time().$photo;

    $query1="SELECT * FROM `user` WHERE `id`='$user_id'";
    $run1= mysqli_query($connect,$query1);
    $data= mysqli_fetch_assoc($run1);

    $filename= '../../'.$data['profile_photo'];
     

    $query="UPDATE `user` SET `profile_photo`='$photo' WHERE `id`='$user_id'";
    $run= mysqli_query($connect,$query);
     if($run)
   {

     unlink($filename);
    move_uploaded_file($_FILES['profile_photo']['tmp_name'], "../../$photo");
    $_SESSION['msg']= 'Profile Updated Successfully';
    header("Location:../profile.php");
   }
   else
   {
    $_SESSION['msg']= 'Profile Updation Failed!';
    header("Location:../profile.php");
   }
}



if(isset($_POST['slider_img']))
{
    $category= $_POST['category'];
    $subcategory= $_POST['subcategory'];
    $banner_title= $_POST['banner_title'];
    $category= $_POST['category'];


    $photo= $_FILES['photo']['name'];
    $photo= 'assets/imgs/news/'.time().$photo;

    $query="INSERT INTO `banner`( `title`, `category1`, `category2`, `image`) VALUES ('$banner_title','$category','$subcategory','$photo')";
    $run= mysqli_query($connect,$query);
    if($run)
    {

    move_uploaded_file($_FILES['photo']['tmp_name'], "../../$photo");
    $_SESSION['msg']= 'Banner Updated Successfully';
    header("Location:../banner.php");
   }
   else
   {
    $_SESSION['msg']= 'Banner Updation Failed!';
    header("Location:../banner.php");
   }


}





if(isset($_POST['deactivate_banner']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `banner` SET`status`='0' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Banner Status Changed';
        header("Location:../banner.php");
    }
}

if(isset($_POST['deactivate_youtube']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `youtube` SET`status`='1' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']=' Status Changed';
        header("Location:../youtube.php");
    }
}

if(isset($_POST['activate_youtube']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `youtube` SET`status`='0' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']=' Status Changed';
        header("Location:../youtube.php");
    }
}



if(isset($_POST['activate_banner']))
{
    $id= $_POST['post_id'];
    $query="UPDATE `banner` SET`status`='1' WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Banner Status Changed';
        header("Location:../banner.php");
    }
}



if(isset($_POST['delete_banner']))
{
    $id= $_POST['post_id'];
    $query="DELETE FROM  `banner` WHERE `id`='$id'";
    $run=  mysqli_query($connect,$query);
    if($run)
    {
        $_SESSION['msg']='Banner Deleted';
        header("Location:../banner.php");
    }
    else
    {
         $_SESSION['msg']='Banner Deletion Failed';
        header("Location:../banner.php");
    }
}

if (isset($_POST['author_update'])) {
    $badge = $_POST['badge'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    // Check if a new photo is uploaded
    if (isset($_FILES['photo']['name']) && $_FILES['photo']['error'] == 0) {
        // Fetch the current photo path from the database to delete it later
        $result = mysqli_query($connect, "SELECT `photo` FROM `author_msg` WHERE `id` = 1");
        $row = mysqli_fetch_assoc($result);
        $oldPhoto = "../../" . $row['photo']; // Adjust path for deletion

        // Sanitize and generate a unique name for the new photo
        $photo = 'assets/imgs/authors/' . time() . basename($_FILES['photo']['name']);

        // Update query with the new photo path
        $query = "UPDATE `author_msg` SET `photo` = '$photo', `badge` = '$badge', `heading` = '$heading', `content` = '$content' WHERE `id` = 1";
    } else {
        // Update query without changing the photo
        $query = "UPDATE `author_msg` SET `badge` = '$badge', `heading` = '$heading', `content` = '$content' WHERE `id` = 1";
    }

    // Execute the query
    $run = mysqli_query($connect, $query);
    if ($run) {
        // Only move the file if a new photo was uploaded
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['error'] == 0) {
            // Move the new file to the specified directory
            move_uploaded_file($_FILES['photo']['tmp_name'], "../../$photo");

            // Delete the old photo if it exists
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }
        }

        $_SESSION['msg'] = 'Message Updated';
        header("Location: ../author.php");
        exit;
    } else {
        $_SESSION['msg'] = 'Message Updation Failed';
        header("Location: ../author.php");
        exit;
    }
}




if(isset($_POST['add_youtube']))

{
    $link= $_POST['link'];
    $query="INSERT INTO `youtube`( `post`) VALUES ('$link')";
    $run= mysqli_query($connect,$query);
     if($run)
    {
        $_SESSION['msg']='youtube Added';
        header("Location:../youtube.php");
    }
    else
    {
         $_SESSION['msg']='youtube Addition Failed';
        header("Location:../youtube.php");
    }

}




if(isset($_POST['advertise']))
{
    // Retrieve the existing photo path from the database
    $getQuery = "SELECT `img` FROM `advertise` WHERE `id`=1";
    $result = mysqli_query($connect, $getQuery);
    $row = mysqli_fetch_assoc($result);
    $oldPhoto = "../../" . $row['img']; // Prepend the path for deletion

    // Prepare new photo upload path
    $photo = $_FILES['photo']['name'];
    $photo = 'assets/imgs/ads/' . time() . $photo;
    $link = $_POST['link'];

    // Update query
    $query = "UPDATE `advertise` SET `link`='$link', `img`='$photo' WHERE `id`=1";
    $run = mysqli_query($connect, $query);

    if ($run)
    {
        // Delete the old photo if it exists
        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }

        // Move the new uploaded file
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../$photo");

        $_SESSION['msg'] = 'Data Updated';
        header("Location: ../advertise.php");
    }
    else
    {
        $_SESSION['msg'] = 'Data Updation Failed';
        header("Location: ../advertise.php");
    }
}







?>
