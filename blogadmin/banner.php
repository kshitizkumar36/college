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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addButton">
                                        Add
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form  method="post" action="php_code/backend.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="menu_id" id="menu_id"> <!-- Hidden field for menu ID -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label>Choose Category</label>
                                                           <select class="form-control" name="category">
                                                               <option selected disabled>Please Select</option>
                                                               <?php
                                                               $query_menu="SELECT *  FROM `menu` WHERE `status`=1";
                                                               $run_menu= mysqli_query($connect,$query_menu);
                                                               while($data_menu= mysqli_fetch_assoc($run_menu))
                                                               {
                                                                ?>
                                                                <option><?php echo $data_menu['menu']; ?></option>
                                                                <?php
                                                               }

                                                               ?>
                                                           </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Enter Sub Category</label>
                                                            <input type="text" class="form-control" name="subcategory" id="subcategory" required="required">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Title of the Banner</label>
                                                            <input type="text" class="form-control"  name="banner_title" id="banner_title" required="required">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Upload Banner  (3000px width : 1144px height)</label>
                                                            <input type="file" class="form-control" name="photo" id="photo" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="slider_img" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Menu</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Img</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
                                            $query1 = "SELECT * FROM `banner` ORDER BY `id` DESC";
                                            $run1 = mysqli_query($connect, $query1);
                                            while ($data = mysqli_fetch_assoc($run1)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $id++; ?></td>
                                                    <td><?php echo htmlspecialchars($data['category1']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['category2']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['title']); ?></td>
                                                    <td>
                                                        <img height="100" src="../<?php echo $data['image']; ?>">
                                                    </td>
                                                    <td>
                                                         <?php
                                                        $status = $data['status'];
                                                        if ($status == 0) 
                                                        {
                                                            ?>
                                                                <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-warning" name="activate_banner">De-Activated</button>
                                                                </form>

                                                            <?php
                                                           
                                                        } else
                                                         {
                                                            ?>
                                                             <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-success" name="deactivate_banner">Activated</button>
                                                                </form>


                                                            <?php
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                      <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-danger" name="delete_banner">Delete</button>
                                                                </form>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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

