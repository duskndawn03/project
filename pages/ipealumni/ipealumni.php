<?php
include '../../config/baseurl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPE Alumni</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/style.css" type="text/css">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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
                    <a href="alumniregistration.php" class="btn btn-primary">Register</a>
                </div>
                <div class="table-responsive">
                    <?php
                    include '../../config/db_connection.php';

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

                    <table id="alumniTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
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
                                echo "<tr><td colspan='" . count($columns_to_display) . "' class='text-center'>No records found</td></tr>";
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

    <!-- Js Plugins -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/mixitup.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/main.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->

    <script>
        $(document).ready(function() {
            $('#alumniTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true, // Enable responsive extension
                columnDefs: [{
                        responsivePriority: 1,
                        targets: -1
                    }, // Prioritize actions column
                    {
                        responsivePriority: 2,
                        targets: 0
                    } // Prioritize the first column (Sl No.)
                ]
            });
        });
    </script>

</body>
</html>