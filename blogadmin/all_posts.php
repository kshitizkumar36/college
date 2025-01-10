<?php
include 'header.php';

if($_SESSION['msg'])
{
    echo"<script>alert(".$_SESSION['msg'].")</script>";
     unset($_SESSION['msg']);
}
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

                                   <a href="new_blog.php"> <button type="button" class="btn btn-primary"  id="addButton">
                                        Add
                                    </button></a>
                                </div>

                              

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Menu</th>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
                                            $query1 = "SELECT * FROM `posts` ORDER BY `id` DESC";
                                            $run1 = mysqli_query($connect, $query1);
                                            while ($data = mysqli_fetch_assoc($run1)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $id++; ?></td>
                                                    <td><?php  $menu_id=($data['menu']); 

                                                        $query_menu="SELECT * FROM `menu` WHERE `id`='$menu_id'";
                                                        $run_menu= mysqli_query($connect,$query_menu);
                                                        $data_menu= mysqli_fetch_assoc($run_menu);
                                                        echo $data_menu['menu'];

                                                        ?></td>
                                                    <td><?php echo htmlspecialchars($data['title']); ?></td>
                                                    <td> (<?php echo $data['subtitle']; ?>) </td>
                                                    <td>

                                                        <img height="100" src="../<?php echo htmlspecialchars($data['main_img']); ?>"></td>
                                                    <td>
                                                        <?php
                                                        $status = $data['status'];
                                                        if ($status == 0) 
                                                        {
                                                            ?>
                                                                <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-warning" name="activate_admin">De-Activated</button>
                                                                </form>

                                                            <?php
                                                           
                                                        } else
                                                         {
                                                            ?>
                                                             <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-success" name="deactivate_admin">Activated</button>
                                                                </form>


                                                            <?php
                                                        }
                                                        ?>




                                                    </td>
                                                    <td>
                                                       <a target="_blank" href="edit_post.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-eye"></i></a>


                                                       
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="view_profile.php?view_id=<?php echo $data['user_id']; ?>">
                                                            <?php
                                                            $user_id= $data['user_id'];
                                                            $query_user= "SELECT * FROM `user` WHERE `id`='$user_id'";
                                                            $run_user= mysqli_query($connect,$query_user);
                                                            $data_user= mysqli_fetch_assoc($run_user);
                                                            echo $data_user['username'];
                                                            ?>
                                                        </a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle the Add/Edit form submission
    $('#menuForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize();

        // AJAX request
        $.ajax({
            type: 'POST',
            url: 'php_code/save_menu.php', // The PHP file to process the form
            data: formData,
            success: function(response) {
                alert(response); // Show success message
                $('#menuForm')[0].reset(); // Reset the form
                $('#exampleModal').modal('hide'); // Hide the modal
                location.reload(); // Reload the page to see new data
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error
                alert("An error occurred: " + error); // Show error message
            }
        });
    });

    // Open modal for editing
    $('.editButton').on('click', function() {
        var menuId = $(this).data('id');
        var menuName = $(this).data('name');
        var menuDetails = $(this).data('details');
        var menuIcon = $(this).data('icon');
        var targetPage = $(this).data('target');

        // Populate the form fields with existing data
        $('#menu_id').val(menuId);
        $('#menu_name').val(menuName);
        $('#menu_details').val(menuDetails);
        $('#menu_icon').val(menuIcon);
        $('#target_page').val(targetPage);

        $('#exampleModal').modal('show'); // Show the modal
        $('#exampleModalLabel').text('Edit Data'); // Change the modal title
    });

    // Handle delete button click
    $('.deleteButton').on('click', function() {
        var menuId = $(this).data('id');
        if (confirm("Are you sure you want to delete this menu item?")) {
            // AJAX request to delete the menu item
            $.ajax({
                type: 'POST',
                url: 'php_code/delete_menu.php', // The PHP file to process the deletion
                data: { id: menuId },
                success: function(response) {
                    alert(response); // Show success message
                    location.reload(); // Reload the page to see new data
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error
                    alert("An error occurred: " + error); // Show error message
                }
            });
        }
    });
});
</script>
