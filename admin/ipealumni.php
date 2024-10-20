<?php
include '../baseurl.php';
include 'db_connection.php';

// Fetch column visibility settings
$visibilityQuery = "SELECT column_name, is_visible FROM column_visibility";
$visibilityResult = $conn->query($visibilityQuery);

$visibility = [];
while ($row = $visibilityResult->fetch_assoc()) {
    $visibility[$row['column_name']] = $row['is_visible'];
}

$columns = [
    'sl_no' => 'Sl No.',
    'graduation_institute' => 'Graduation Institute',
    'admission_year' => 'Admission Year',
    'batch_name_no' => 'Batch Name & No',
    'roll_no' => 'Roll No.',
    'name' => 'Name',
    'contact_no' => 'Contact No.',
    'additional_contact' => 'Additional Contact',
    'email_address' => 'Email Address',
    'additional_email' => 'Additional Email',
    'fb_id_link' => 'FB ID Link',
    'linkedin_id_link' => 'LinkedIn ID Link',
    'blood_group' => 'Blood Group',
    'current_occupation' => 'Current Occupation',
    'institution_name' => 'Institution Name',
    'professional_history' => 'Professional History',
    'present_address' => 'Present Address',
    'permanent_address' => 'Permanent Address',
    'area_of_expertise' => 'Area of Expertise',
    'remarks' => 'Remarks',
    'approval' => 'Approval',
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPE Alumni</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            table, th, td {
                border: 1px solid black;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ipealumni.php">IPE Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main">
        <h1>IPE Alumni</h1>

        <!-- Buttons -->
        <button class="btn btn-primary mb-3" onclick="insertAlumni()">Insert New Alumni</button>
        <button class="btn btn-secondary mb-3" onclick="importAlumni()">Import Alumni</button>
        <button class="btn btn-secondary mb-3" onclick="exportAlumni()">Export Alumni</button>
        <button class="btn btn-secondary mb-3" onclick="printAlumni()">Print</button>

        <!-- Hidden form for importing CSV -->
        <form id="importAlumniForm" method="POST" action="import_alumni.php" enctype="multipart/form-data" style="display:none;">
            <input type="file" id="csvFile" name="csvFile" accept=".csv" onchange="submitImportForm()" required>
        </form>

        <!-- Table Responsive Wrapper -->
        <div class="table-responsive">
            <table id="alumniTable" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <?php
                        foreach ($columns as $column => $header) {
                            if ($visibility[$column]) {
                                echo "<th>{$header}</th>";
                            }else {
                                echo "<th style='color:red'>{$header}</th>";
                            }
                        }
                        echo "<th>Action</th>";
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM alumni";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($columns as $column => $header) {
                                if ($visibility[$column]) {
                                    echo "<td>{$row[$column]}</td>";
                                }else {
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
                        echo "<tr><td colspan='22' class='text-center'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container mt-5">
        <h1>Column Visibility Settings</h1>
        <?php
        // Fetch column visibility settings from the database
        $sqlQuery = "SELECT * FROM column_visibility";
        $queryResult = $conn->query($sqlQuery);

        // Prepare an array to hold visibility data
        if ($queryResult->num_rows > 0) {
            echo '<form method="POST" action="update_visibility.php" id="visibilityForm">';

            // Loop through the results and output checkboxes for each column
            while ($rowData = $queryResult->fetch_assoc()) {
                $columnName = $rowData['column_name'];
                $isVisible = $rowData['is_visible'];

                // Assign a unique id to each checkbox
                $inputId = 'column_' . $columnName;

                echo '<div class="form-check">
                            <input type="checkbox" class="form-check-input" id="' . $inputId . '" name="' . $columnName . '" value="' . $isVisible . '" ' . ($isVisible == 1 ? 'checked' : '') . '>
                            <label class="form-check-label" for="' . $inputId . '">' . ucfirst(str_replace("_", " ", $columnName)) . '</label>
                        </div>';
            }
            echo '<input type="submit" class="btn btn-primary mt-3" value="Update Visibility"></form>';
        } else {
            echo "No visibility settings found";
        }
        ?>
    </div>


    <!-- Edit Alumni Modal -->
    <div class="modal fade" id="editAlumniModal" tabindex="-1" role="dialog" aria-labelledby="editAlumniLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editAlumniForm" method="POST" action="update_alumni.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAlumniLabel">Edit Alumni</h5>
                        <button type="button" class="close btn btn-light rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; border: none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="alumni_id">

                        <div class="form-group">
                            <label for="graduation_institute">Graduation Institute</label>
                            <input type="text" class="form-control" name="graduation_institute" required>
                        </div>

                        <div class="form-group">
                            <label for="admission_year">Admission Year</label>
                            <input type="text" class="form-control" name="admission_year" required>
                        </div>

                        <div class="form-group">
                            <label for="batch_name_no">Batch Name/Number</label>
                            <input type="text" class="form-control" name="batch_name_no" required>
                        </div>

                        <div class="form-group">
                            <label for="roll_no">Roll No</label>
                            <input type="text" class="form-control" name="roll_no" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="text" class="form-control" name="contact_no" required>
                        </div>

                        <div class="form-group">
                            <label for="additional_contact">Additional Contact</label>
                            <input type="text" class="form-control" name="additional_contact">
                        </div>

                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" class="form-control" name="email_address" required>
                        </div>

                        <div class="form-group">
                            <label for="additional_email">Additional Email</label>
                            <input type="email" class="form-control" name="additional_email">
                        </div>

                        <div class="form-group">
                            <label for="fb_id_link">Facebook ID/Link</label>
                            <input type="text" class="form-control" name="fb_id_link">
                        </div>

                        <div class="form-group">
                            <label for="linkedin_id_link">LinkedIn ID/Link</label>
                            <input type="text" class="form-control" name="linkedin_id_link">
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group">
                        </div>

                        <div class="form-group">
                            <label for="current_occupation">Current Occupation</label>
                            <input type="text" class="form-control" name="current_occupation">
                        </div>

                        <div class="form-group">
                            <label for="institution_name">Institution Name</label>
                            <input type="text" class="form-control" name="institution_name">
                        </div>

                        <div class="form-group">
                            <label for="professional_history">Professional History</label>
                            <textarea class="form-control" name="professional_history"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="present_address">Present Address</label>
                            <textarea class="form-control" name="present_address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="permanent_address">Permanent Address</label>
                            <textarea class="form-control" name="permanent_address"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="area_of_expertise">Area of Expertise</label>
                            <input type="text" class="form-control" name="area_of_expertise">
                        </div>

                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea class="form-control" name="remarks"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="approval">Approval Status</label>
                            <select class="form-control" name="approval">
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
                ]
            });
        });

        // Function to toggle approval status
        function toggleApproval(id) {
            // Example: Send an AJAX request to update approval status in the backend
            $.ajax({
                url: 'update_approval.php', // Your PHP file to handle approval change
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
                    url: 'delete_alumni.php', // Your PHP file to handle deletion
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
            window.location.href = 'export_alumni.php'; // Trigger file download
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
            window.location.href = '<?php echo $baseurl; ?>/alumniregistration.php';
        }

    </script>
</body>

</html>