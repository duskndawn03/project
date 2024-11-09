<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni</title>

    <!-- Latest Bootstrap CSS (v5.3.2) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <!-- DataTables Responsive Extension CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <style>
        .main {
            padding: 20px;
        }

        @media print {

            /* Hide all buttons on the page when printing */
            .btn {
                display: none;
            }

            /* Optionally, adjust table for better printing */
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <div class="main">
        <h1>IPE Alumni</h1>

        <!-- Buttons -->
        <button class="btn btn-primary mb-3" onclick="insertAlumni()">Single insert</button>
        <button class="btn btn-secondary mb-3" onclick="importAlumni()">Batch import</button>
        <button class="btn btn-secondary mb-3" onclick="exportAlumni()">Export</button>
        <button class="btn btn-secondary mb-3" onclick="printAlumni()">Print</button>

        <!-- Hidden form for importing CSV -->
        <form id="importAlumniForm" method="POST" action="<?= site_url('alumni/importAlumni'); ?>" enctype="multipart/form-data" style="display:none;">
            <input type="file" id="csvFile" name="csvFile" accept=".csv" onchange="submitImportForm()" required>
        </form>

        <!-- Table Responsive Wrapper -->
        <div class="table-responsive border">
            <table id="alumniTable" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th> <!-- Serial Number Column -->
                        <?php
                        // Loop through columns and check if they are visible based on $visibility
                        foreach ($columns as $column => $header) {
                            if ($visibility[$column]) {
                                echo "<th>{$header}</th>";
                            } else {
                                echo "<th style='color:red'>{$header}</th>";
                            }
                        }
                        echo "<th>Action</th>"; // Actions column
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through alumni data passed from controller
                    if (!empty($alumni)) {
                        foreach ($alumni as $index => $row) {
                            echo "<tr>";
                            echo "<td></td>"; // Empty cell for the serial number (DataTable handles this)
                            foreach ($columns as $column => $header) {
                                if ($visibility[$column]) {
                                    echo "<td>{$row[$column]}</td>";
                                } else {
                                    echo "<td style='color:red'>{$row[$column]}</td>";
                                }
                            }
                            echo "<td>
                        <button class='btn btn-info btn-sm' onclick='editAlumni({$row['sl_no']})'>Edit</button>
                        <button class='btn btn-danger btn-sm' onclick='deleteAlumni({$row['sl_no']})'>Delete</button>
                        <button class='btn btn-sm " . ($row['approval'] == 'pending' ? 'btn-warning' : 'btn-success') . "' onclick='toggleApproval({$row['sl_no']})'>
                            " . ($row['approval'] == 'granted' ? 'Granted' : 'Pending') . "
                        </button>
                    </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='23' class='text-center'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Column Visibility Settings Section -->
        <div class="container-fluid mt-2">
            <h1>Column Visibility Settings</h1>
            <!-- Form for updating column visibility -->
            <form method="POST" action="<?= site_url('alumni/updateVisibility') ?>" id="visibilityForm">
                <?php
                // Loop through the visibility settings and create checkboxes for each column
                foreach ($columns as $column => $header) {
                    // Determine the checked state of the checkbox based on visibility
                    $isChecked = isset($visibility[$column]) && $visibility[$column] == 1 ? 'checked' : '';
                    
                    // Add hidden field to send "0" when unchecked
                    echo '<div class="form-check">
                            <!-- Hidden field to ensure 0 is sent when checkbox is unchecked -->
                            <input type="hidden" name="' . $column . '" value="0">
                            <input type="checkbox" class="form-check-input" name="' . $column . '" value="1" ' . $isChecked . '>
                            <label class="form-check-label">' . ucfirst(str_replace("_", " ", $column)) . '</label>
                        </div>';
                }
                ?>
                <input type="submit" class="btn btn-primary mt-3" value="Update Visibility">
            </form>
        </div>


        <!-- Edit Alumni Modal -->
        <div class="modal fade" id="editAlumniModal" tabindex="-1" role="dialog" aria-labelledby="editAlumniLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editAlumniForm" method="POST" action="<?= site_url('alumni/update') ?>">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAlumniLabel">Edit Alumni</h5>
                            <button type="button" class="close btn btn-light rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; border: none;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="sl_no" id="alumniId">

                            <div class="form-group">
                                <label for="graduation_institute">Graduation Institute</label>
                                <input type="text" class="form-control" name="graduation_institute" id="graduation_institute" required>
                            </div>
                            <div class="form-group">
                                <label for="admission_year">Admission Year</label>
                                <input type="text" class="form-control" name="admission_year" id="admission_year" required>
                            </div>
                            <div class="form-group">
                                <label for="batch_name_no">Batch Name/Number</label>
                                <input type="text" class="form-control" name="batch_name_no" id="batch_name_no" required>
                            </div>
                            <div class="form-group">
                                <label for="roll_no">Roll No</label>
                                <input type="text" class="form-control" name="roll_no" id="roll_no" required>
                            </div>

                            <!-- Additional form fields here as needed... -->

                            <div class="form-group">
                                <label for="approval">Approval Status</label>
                                <select class="form-control" name="approval" id="approval">
                                    <option value="pending">Pending</option>
                                    <option value="granted">Granted</option>
                                </select>
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


        <!-- jQuery and DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

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
                    ],
                    "createdRow": function(row, data, index) {
                        // Add the serial number to the first column
                        $('td', row).eq(0).html(index + 1);
                    }
                });
            });

            // Function to toggle approval status
            function toggleApproval(id) {
                // Example: Send an AJAX request to update approval status in the backend
                $.ajax({
                    url: '<?= site_url('alumni/updateApproval'); ?>', // Your url to handle approval change
                    type: 'POST',
                    data: {
                        alumni_id: id
                    },
                    success: function(response) {
                        location.reload(); // Reload page after updating
                    },
                    error: function(err) {
                        console.error('Error updating approval:', err);
                    }
                });
            }

            function editAlumni(id) {
                // Use AJAX to get the existing data of the alumni from the server
                $.ajax({
                    url: 'get_alumni.php', // PHP script to fetch existing data
                    type: 'POST',
                    data: {
                        alumni_id: id
                    },
                    success: function(response) {
                        // Parse the JSON response
                        let alumniData = JSON.parse(response);

                        // Populate the modal with existing data
                        $('#editAlumniModal').find('input[name="graduation_institute"]').val(alumniData.graduation_institute || '');
                        $('#editAlumniModal').find('input[name="admission_year"]').val(alumniData.admission_year || '');
                        $('#editAlumniModal').find('input[name="batch_name_no"]').val(alumniData.batch_name_no || '');
                        $('#editAlumniModal').find('input[name="roll_no"]').val(alumniData.roll_no || '');
                        $('#editAlumniModal').find('input[name="name"]').val(alumniData.name || '');
                        $('#editAlumniModal').find('input[name="contact_no"]').val(alumniData.contact_no || '');
                        $('#editAlumniModal').find('input[name="email_address"]').val(alumniData.email_address || '');
                        $('#editAlumniModal').find('input[name="additional_contact"]').val(alumniData.additional_contact || '');
                        $('#editAlumniModal').find('input[name="additional_email"]').val(alumniData.additional_email || '');
                        $('#editAlumniModal').find('input[name="fb_id_link"]').val(alumniData.fb_id_link || '');
                        $('#editAlumniModal').find('input[name="linkedin_id_link"]').val(alumniData.linkedin_id_link || '');
                        $('#editAlumniModal').find('input[name="blood_group"]').val(alumniData.blood_group || '');
                        $('#editAlumniModal').find('input[name="current_occupation"]').val(alumniData.current_occupation || '');
                        $('#editAlumniModal').find('input[name="institution_name"]').val(alumniData.institution_name || '');
                        $('#editAlumniModal').find('textarea[name="professional_history"]').val(alumniData.professional_history || '');
                        $('#editAlumniModal').find('textarea[name="present_address"]').val(alumniData.present_address || '');
                        $('#editAlumniModal').find('textarea[name="permanent_address"]').val(alumniData.permanent_address || '');
                        $('#editAlumniModal').find('input[name="area_of_expertise"]').val(alumniData.area_of_expertise || '');
                        $('#editAlumniModal').find('textarea[name="remarks"]').val(alumniData.remarks || '');
                        $('#editAlumniModal').find('select[name="approval"]').val(alumniData.approval || '');

                        // Store alumni ID in a hidden field to send with the update
                        $('#editAlumniModal').find('input[name="alumni_id"]').val(id);

                        // Show the modal for editing
                        $('#editAlumniModal').modal('show');
                    },
                    error: function(err) {
                        console.error('Error fetching alumni data:', err);
                    }
                });
            }

            function deleteAlumni(id) {
                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: '<?= site_url('alumni/deleteAlumni')?>', // Your PHP file to handle deletion
                        type: 'POST',
                        data: {
                            alumni_id: id
                        },
                        success: function(response) {
                            location.reload(); // Reload page after deletion
                        },
                        error: function(err) {
                            console.error('Error deleting record:', err);
                        }
                    });
                }
            }

            function exportAlumni() {
                window.location.href = '<?= site_url('alumni/exportAlumni')?>'; // Trigger file download
            }

            function printAlumni() {
                window.print();
            }

            function importAlumni() {
                // Trigger the hidden file input when the button is clicked
                document.getElementById('csvFile').click();
            }

            function submitImportForm() {
                // Submit the form once the file is selected
                document.getElementById('importAlumniForm').submit();
            }

            function insertAlumni() {
                window.location.href = 'https://ipework.rf.gd/pages/alumni/alumnireg.php';
            }
        </script>
</body>

</html>