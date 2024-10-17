<?php
// Database connection
include 'db_connection.php';

// Check if alumni_id is provided
if (isset($_POST['alumni_id'])) {
    $alumni_id = $_POST['alumni_id'];

    // Prepare SQL query to fetch alumni details
    $stmt = $conn->prepare("SELECT * FROM alumni WHERE sl_no = ?");
    $stmt->bind_param("i", $alumni_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch data as associative array and return it as JSON
    if ($result->num_rows > 0) {
        $alumniData = $result->fetch_assoc();
        echo json_encode($alumniData);
    } else {
        echo json_encode(["status" => "error", "message" => "Alumni not found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "No alumni ID provided"]);
}

$conn->close();
?>
