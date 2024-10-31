<?php

session_start(); // Start the session
error_reporting(E_ALL);
ini_set('display_errors', 1);

// echo "<pre>";
// echo var_dump($_POST);
// echo "</pre>";
// exit();
include "../config/db_connection.php"; // Adjusted path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $graduation_institute = $_POST['graduation_institute'] ?? null;
    $admission_year = $_POST['admission_year'] ?? null; // year(4)
    $batch_name_no = $_POST['batch_name_no'] ?? null;
    $roll_no = $_POST['roll_no'] ?? null;
    $name = $_POST['name'] ?? null;
    $contact_no = $_POST['contact_no'] ?? null;
    $additional_contact = $_POST['additional_contact'] ?? null;
    $email_address = $_POST['email_address'] ?? null;
    $additional_email = $_POST['additional_email'] ?? null;
    $fb_id_link = $_POST['fb_id_link'] ?? null;
    $linkedin_id_link = $_POST['linkedin_id_link'] ?? null;
    $blood_group = $_POST['blood_group'] ?? null;
    $current_occupation = $_POST['current_occupation'] ?? null;
    $institution_name = $_POST['institution_name'] ?? null;
    $professional_history = $_POST['professional_history'] ?? null;
    $present_address = $_POST['present_address'] ?? null;
    $permanent_address = $_POST['permanent_address'] ?? null;
    $area_of_expertise = $_POST['area_of_expertise'] ?? null;
    $remarks = $_POST['remarks'] ?? null;
    $approval = 'pending'; // Default approval status

    // Prepare the SQL statement
    $sql = "INSERT INTO alumni (graduation_institute, admission_year, batch_name_no, roll_no, name, contact_no, additional_contact, email_address, additional_email, fb_id_link, linkedin_id_link, blood_group, current_occupation, institution_name, professional_history, present_address, permanent_address, area_of_expertise, remarks, approval) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param('ssssssssssssssssssss', 
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
        $approval
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message in session and redirect back to the original page
        $_SESSION['success_message'] = 'Registration successful';
        header("Location: /pages/alumni/alumnireg.php"); // Redirect back to the registration page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
