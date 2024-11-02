<?php
include '../../config/baseurl.php';
include '../../config/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPE Alumni</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <!-- DataTables Responsive Extension CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

</head>

<body>
    <?php include '../../includes/header.php';?>
    <!-- Header Section End -->

    <!-- Table Section Begin -->

    <div class="container-fluid">
        <div class="row">
            <!-- Left Advertisement -->
            <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
                <div class="card">
                    <img src="<?php echo $baseurl; ?>/assets/img/blog/blog-7.jpg" class="card-img-top" alt="Advertisement 1">
                    <div class="card-body">
                        <h5 class="card-title">Ad 1</h5>
                        <p class="card-text">Description for the first advertisement.</p>
                    </div>
                </div>
            </div>

            <!-- Center Table -->
            <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-center mb-4">Alumni Information</h2>
                    <!-- Register Button -->
                    <a href="alumnireg.php" class="btn btn-primary">Register</a>
                </div>
                <div class="table-responsive border">
                    <?php

                    // Fetch the visible columns
                    $visibility_sql = "SELECT column_name FROM column_visibility WHERE is_visible = 1";
                    $visibility_result = $conn->query($visibility_sql);

                    $visible_columns = [];
                    if ($visibility_result->num_rows > 0) {
                        while ($row = $visibility_result->fetch_assoc()) {
                            $visible_columns[] = $row['column_name'];
                        }
                    }

                    // Exclude 'approval' column from visible columns, and filter records where approval is not 'pending'
                    $columns_to_display = array_diff($visible_columns, ['approval']);

                    // Build the SELECT query dynamically based on visible columns
                    $select_columns = implode(', ', $columns_to_display);
                    $sql = "SELECT $select_columns FROM alumni WHERE approval != 'pending'";
                    $result = $conn->query($sql);
                    ?>

                    <table id="alumniTable" class="table table-bordered nowrap border" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th> <!-- New column for serial numbers -->
                                <?php foreach ($columns_to_display as $column): ?>
                                    <th><?php echo ucfirst(str_replace('_', ' ', $column)); ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td></td>"; // Empty cell for the serial number
                                    foreach ($columns_to_display as $column) {
                                        if ($column === 'fb_id_link' || $column === 'linkedin_id_link') {
                                            echo "<td><a href='{$row[$column]}'>" . ucfirst(explode('_', $column)[0]) . "</a></td>";
                                        } else {
                                            echo "<td>{$row[$column]}</td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='" . count($columns_to_display + 1) . "' class='text-center'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Advertisement -->
            <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
                <div class="card">
                    <img src="<?php echo $baseurl; ?>/assets/img/blog/blog-7.jpg" class="card-img-top" alt="Advertisement 2">
                    <div class="card-body">
                        <h5 class="card-title">Ad 2</h5>
                        <p class="card-text">Description for the second advertisement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Table Section End -->

    <!-- Footer Section Begin -->
    <?php include '../../includes/footer.php';?>

    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#alumniTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true, // Enable responsive extension
                columnDefs: [
                    { responsivePriority: 1, targets: 0 }, // Serial number
                    { responsivePriority: 2, targets: 5 }, // Name
                    { responsivePriority: 3, targets: 4 }, // Roll no
                    { responsivePriority: 4, targets: 1 }, // Graduation institute
                    { responsivePriority: 5, targets: 3 }  // Batch name no
                ],
                "createdRow": function(row, data, index) {
                    // Add the serial number to the first column
                    $('td', row).eq(0).html(index + 1);
                }
            });
        });
    </script>

</body>
</html>