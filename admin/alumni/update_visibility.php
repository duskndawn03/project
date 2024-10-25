<?php
// Include your DB connection file
include '../config/db_connection.php';

// Prepare to update visibility settings
// Fetch all column names first to ensure you handle all columns
$sqlQuery = "SELECT column_name FROM column_visibility";
$queryResult = $conn->query($sqlQuery);
$allColumns = [];

// Store all column names in an array
if ($queryResult->num_rows > 0) {
    while ($rowData = $queryResult->fetch_assoc()) {
        $allColumns[] = $rowData['column_name'];
    }
}

// Now loop through all columns to update their visibility settings
foreach ($allColumns as $columnName) {
    // Check if the column is present in $_POST (checkbox is checked)
    $isVisible = isset($_POST[$columnName]) ? 1 : 0;

    // Prepare SQL statement to update visibility
    $sqlUpdate = "UPDATE column_visibility SET is_visible = ? WHERE column_name = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("is", $isVisible, $columnName);
    
    // Execute the update
    $stmt->execute();
}

// Close the statement and connection
$stmt->close();

// Redirect back to the original page after updating
header("Location: https://ipework.free.nf/admin/ipealumni.php");
exit();
?>
