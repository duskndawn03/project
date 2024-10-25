<?php
include '../../config/config.php'; // Make sure to adjust path for DB connection

header('Content-Type: application/json');

// Get the search query from the AJAX request
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

if ($searchQuery !== '') {
    // Query to search by name, author, or category
    $sql = "SELECT * FROM book_details WHERE 
            book_details_name LIKE '%$searchQuery%' OR 
            book_details_author LIKE '%$searchQuery%' OR 
            book_details_category LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    $books = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = [
                'name' => htmlspecialchars($row['book_details_name']),
                'author' => htmlspecialchars($row['book_details_author']),
                'category' => htmlspecialchars($row['book_details_category']),
                'image' => htmlspecialchars($baseurl . '/assets/img/shop/' . $row['book_details_image']),
            ];
        }
    }

    // Return the results as JSON
    echo json_encode($books);
} else {
    echo json_encode([]); // Return an empty array if no search term
}
?>
