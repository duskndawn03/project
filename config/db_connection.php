<?php
// Database connection
$conn = new mysqli(
    'sql102.infinityfree.com', // Server name
    'if0_37597009',            // Username
    'AxczMz9ydpN',          // Password
    'if0_37597009_ipework'     // Database name
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
