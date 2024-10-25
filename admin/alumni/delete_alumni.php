<?php
// Database connection
include '../db_connection.php';

// Get the POST input from the AJAX request
// Since the data is sent as form data, you can access it via $_POST
$id = isset($_POST['alumni_id']) ? $_POST['alumni_id'] : null;

// Check if the ID is valid
if ($id !== null) {
    // Prepare the query to delete alumni by ID
    $stmt = $conn->prepare("DELETE FROM alumni WHERE sl_no = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid alumni ID."]);
}

?>
