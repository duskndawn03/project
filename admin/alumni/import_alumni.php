<?php
// Database connection
include '../db_connection.php';

if (isset($_POST) && isset($_FILES['csvFile'])) {
    $fileName = $_FILES['csvFile']['tmp_name'];

    if ($_FILES['csvFile']['size'] > 0) {
        // Open the file
        $file = fopen($fileName, "r");

        // Skip the first row if it's a header
        fgetcsv($file);

        // Loop through each row of the file
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            // Assign CSV data to variables
            $graduation_institute = $column[0];
            $admission_year = $column[1];
            $batch_name_no = $column[2];
            $roll_no = $column[3];
            $name = $column[4];
            $contact_no = $column[5];
            $additional_contact = $column[6];
            $email_address = $column[7];
            $additional_email = $column[8];
            $fb_id_link = $column[9];
            $linkedin_id_link = $column[10];
            $blood_group = $column[11];
            $current_occupation = $column[12];
            $institution_name = $column[13];
            $professional_history = $column[14];
            $present_address = $column[15];
            $permanent_address = $column[16];
            $area_of_expertise = $column[17];
            $remarks = $column[18];
            $approval = $column[19];

            // Prepare SQL query to insert alumni data
            $sqlInsert = "
                INSERT INTO alumni (
                    graduation_institute, 
                    admission_year, 
                    batch_name_no, 
                    roll_no, 
                    name, 
                    contact_no, 
                    additional_contact, 
                    email_address, 
                    additional_email, 
                    fb_id_link, 
                    linkedin_id_link, 
                    blood_group, 
                    current_occupation, 
                    institution_name, 
                    professional_history, 
                    present_address, 
                    permanent_address, 
                    area_of_expertise, 
                    remarks, 
                    approval
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )";

            // Prepare and bind
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param(
                "ssssssssssssssssssss", 
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

            // Execute statement
            if (!$stmt->execute()) {
                echo "Error inserting row: " . $stmt->error;
            }
        }

        // Close the file and the statement
        fclose($file);
        $stmt->close();

        // Redirect after successful import
        header("Location: https://ipework.free.nf/admin/ipealumni.php");
        exit();
    } else {
        echo "Error: Please upload a valid CSV file.";
    }
} else {
    echo "No file uploaded.";
}

// Close the database connection
$conn->close();
?>
