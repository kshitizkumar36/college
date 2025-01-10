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
                                                <h5 class="modal-title" id="exampleModalLabel">Add/Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="menuForm">
                                                    <input type="hidden" name="menu_id" id="menu_id"> <!-- Hidden field for menu ID -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label>Enter Menu Name</label>
                                                            <input type="text" class="form-control" name="menu_name" id="menu_name" required="required">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Enter Menu Details</label>
                                                            <input type="text" class="form-control" name="menu_details" id="menu_details" required="required">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Enter Menu Icon</label>
                                                            <input type="text" class="form-control" placeholder="Take it from Font Awesome" name="menu_icon" id="menu_icon" required="required">
                                                        </div>

                                                        <div class="col-12">
                                                            <label>Enter Menu Target Page</label>
                                                            <input type="text" class="form-control" value="all_posts.php" name="target_page" id="target_page" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Icon</th>
                                                <th>Target Page</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
                                            $query1 = "SELECT * FROM `menu` ORDER BY `id` DESC";
                                            $run1 = mysqli_query($connect, $query1);
                                            while ($data = mysqli_fetch_assoc($run1)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $id++; ?></td>
                                                    <td><?php echo htmlspecialchars($data['menu']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['details']); ?></td>
                                                    <td> (<?php echo $data['icon']; ?>) &emsp;<?php echo htmlspecialchars($data['icon']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['target_page']); ?></td>
                                                    <td>
                                                        <?php
                                                        $status = $data['status'];
                                                        if ($status == 0) {
                                                            echo '<span class="badge bg-danger">De-Activated</span>';
                                                        } else {
                                                            echo '<span class="badge bg-success">Activated</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <!-- Edit button with data attributes -->
                                                        <button class="btn btn-warning btn-sm editButton" data-id="<?php echo $data['id']; ?>" data-name="<?php echo htmlspecialchars($data['menu']); ?>" data-details="<?php echo htmlspecialchars($data['details']); ?>" data-icon="<?php echo htmlspecialchars($data['icon']); ?>" data-target="<?php echo htmlspecialchars($data['target_page']); ?>">Edit</button>
                                                        <button class="btn btn-danger btn-sm deleteButton" data-id="<?php echo $data['id']; ?>">Delete</button>
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
