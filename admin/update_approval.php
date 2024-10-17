<?php
// Database connection
include 'db_connection.php';

// Check if alumni_id is sent via POST
if (isset($_POST['alumni_id'])) {
    $alumni_id = $_POST['alumni_id'];

    // First, retrieve the current approval status of the alumni
    $stmt = $conn->prepare("SELECT approval FROM alumni WHERE sl_no = ?");
    $stmt->bind_param("i", $alumni_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentApproval = $row['approval'];

        // Toggle approval status
        $newApproval = ($currentApproval === 'pending') ? 'granted' : 'pending';

        // Update the approval status in the database
        $updateStmt = $conn->prepare("UPDATE alumni SET approval = ? WHERE sl_no = ?");
        $updateStmt->bind_param("si", $newApproval, $alumni_id);

        if ($updateStmt->execute()) {
            echo json_encode(["status" => "success", "newApproval" => $newApproval]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update approval status."]);
        }

        $updateStmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Alumni not found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "No alumni ID provided."]);
}

$conn->close();
?>
