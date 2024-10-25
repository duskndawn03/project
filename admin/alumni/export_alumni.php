<?php
// Include database connection
include '../db_connection.php';

// Set headers to trigger a CSV file download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=alumni_export.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Add the column headers to the CSV file
fputcsv($output, array('sl_no', 'graduation_institute', 'admission_year', 'batch_name_no', 'roll_no', 'name', 'contact_no', 'additional_contact', 'email_address', 'additional_email', 'fb_id_link', 'linkedin_id_link', 'blood_group', 'current_occupation', 'institution_name', 'professional_history', 'present_address', 'permanent_address', 'area_of_expertise', 'remarks', 'approval'));

// Query the database to get all alumni data
$sql = "SELECT * FROM alumni";
$result = $conn->query($sql);

// Add rows to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Close the file pointer
fclose($output);

// Close the database connection
$conn->close();
exit();
?>
