<?php
include 'header.php';
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <!-- Content wrapper -->
                <div class="card">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <!-- Button trigger modal -->
                                    The Author Message
                                </div>

                               <?php

                               $query_author= "SELECT * FROM `author_msg` WHERE `id`='1'";
                               $run_author= mysqli_query($connect,$query_author);
                               $data= mysqli_fetch_assoc($run_author);
                               ?>

                                <div class="card-body">
                                   <form method="post" action="php_code/backend.php" enctype="multipart/form-data">
                                       <div class="row">
                                           <div class="col-sm-12">
                                               <label>Photo</label>
                                               <img height="100" src="../<?php echo $data['photo']; ?>">
                                               <input type="file"  class="form-control" name="photo">
                                           </div>

                                           <div class="col-sm-12">
                                               <label>Badge</label>
                                               <input type="text"  value="<?php echo $data['badge']; ?>" class="form-control" name="badge">
                                           </div>

                                             <div class="col-sm-12">
                                               <label>Heading</label>
                                               <input type="text"  value="<?php echo $data['heading']; ?>" class="form-control" name="heading">
                                           </div>

                                             <div class="col-sm-12">
                                               <label>Content</label>
                                               <textarea id="author" class="form-control" name="content">
                                                   <?php
                                                   echo $data['content'];
                                                   ?>
                                               </textarea>
                                           </div>

                                            <div class="col-sm-12 mt-2 text-center">
                                           <button class="btn btn-success" type="submit" name="author_update">Update</button>
                                       </div>
                                       </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script>
            ClassicEditor
                .create(document.querySelector('#author'))
                .catch(error => {
                    console.error(error);
                });
        </script>