<?php
// Database connection
$conn = new mysqli(
    'sql312.infinityfree.com', // Server name
    'if0_37327540',            // Username
    'gCO3gr9sy4XcYx',          // Password
    'if0_37327540_ipework'     // Database name
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
