<?php
// Database connection
include 'db_connection.php';

// Check if alumni_id is provided
if (isset($_POST['alumni_id'])) {
    $alumni_id = $_POST['alumni_id'];
    $graduation_institute = $_POST['graduation_institute'];
    $admission_year = $_POST['admission_year'];
    $batch_name_no = $_POST['batch_name_no'];
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $additional_contact = $_POST['additional_contact'];
    $email_address = $_POST['email_address'];
    $additional_email = $_POST['additional_email'];
    $fb_id_link = $_POST['fb_id_link'];
    $linkedin_id_link = $_POST['linkedin_id_link'];
    $blood_group = $_POST['blood_group'];
    $current_occupation = $_POST['current_occupation'];
    $institution_name = $_POST['institution_name'];
    $professional_history = $_POST['professional_history'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $area_of_expertise = $_POST['area_of_expertise'];
    $remarks = $_POST['remarks'];
    $approval = $_POST['approval'];

    // Prepare SQL query to update alumni data
    $stmt = $conn->prepare("
        UPDATE alumni
        SET graduation_institute = ?, admission_year = ?, batch_name_no = ?, roll_no = ?, name = ?, contact_no = ?, additional_contact = ?, email_address = ?, additional_email = ?, fb_id_link = ?, linkedin_id_link = ?, blood_group = ?, current_occupation = ?, institution_name = ?, professional_history = ?, present_address = ?, permanent_address = ?, area_of_expertise = ?, remarks = ?, approval = ?
        WHERE sl_no = ?");
    
    // Bind the parameters to the prepared statement
    $stmt->bind_param("ssssssssssssssssssssi", 
        $graduation_institute, 
        $admission_year, 
        $batch_name_no, 
        $roll_no, 
        $name, 
        $contact_no, 
        $additional_contact, 
        $email_address, 
        $additional_email, 
        $fb_id_link, 
        $linkedin_id_link, 
        $blood_group, 
        $current_occupation, 
        $institution_name, 
        $professional_history, 
        $present_address, 
        $permanent_address, 
        $area_of_expertise, 
        $remarks, 
        $approval, 
        $alumni_id
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the main page after successful update
        header("Location: https://ipework.free.nf/admin/ipealumni.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Alumni ID is required.";
}

// Close the database connection
$conn->close();
?>
