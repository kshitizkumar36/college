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
                                                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="php_code/backend.php">
                                                   <!-- Hidden field for menu ID -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label>Enter Youtube Link (Copy Like this)</label>
                                                            <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?--->(v=k7HfZf-OGuk)<---- &list=RDMMk7HfZf-OGuk&start_radio=1" name="link" id="link" required="required">
                                                        </div>

                                                     
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="add_youtube">Save changes</button>
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
                                                <th>Post</th>
                                               
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
                                            $query1 = "SELECT * FROM `youtube` ORDER BY `id` DESC";
                                            $run1 = mysqli_query($connect, $query1);
                                            while ($data = mysqli_fetch_assoc($run1)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $id++; ?></td>
                                                    <td><?php echo htmlspecialchars($data['post']); ?></td>
                                                    
                                                    <td>
                                                       <?php
                                                        $status = $data['status'];
                                                        if ($status == 0) 
                                                        {
                                                            ?>
                                                                <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-warning" name="deactivate_youtube">De-Activated</button>
                                                                </form>

                                                            <?php
                                                           
                                                        } else
                                                         {
                                                            ?>
                                                             <form method="post" action="php_code/backend.php">
                                                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="post_id">
                                                                    <button type="submit" class="badge bg-success" name="activate_youtube">Activated</button>
                                                                </form>


                                                            <?php
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                       
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
