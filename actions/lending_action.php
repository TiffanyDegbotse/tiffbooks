<?php
// Include the database connection file
require_once '../settings/connection.php';

// Function to fetch book details from the database based on ISBN
function fetch_book_details_from_database($conn, $isbn) {
    // Query to fetch book details
    $sql = "SELECT b.bookname, a.authorname, b.pdf, b.image, g.genrename
            FROM books b
            JOIN author a ON b.authorid = a.authorid
            JOIN genre g ON b.genreid = g.genreid
            WHERE b.ISBN = '$isbn'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch book details from the result set
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        // Handle error or return default values
        return false;
    }
}

// Check if ISBN is set and valid
if (isset($_POST['isbn'])) {
    // Get ISBN from POST data
    $isbn = $_POST['isbn'];

    // Fetch book details from the database
    $book_details = fetch_book_details_from_database($conn, $isbn);

    // Return book details as JSON response
    header('Content-Type: application/json');
    echo json_encode($book_details);
    exit();
    
} else {
    echo "ISBN not provided.";
}

// Close the database connection
mysqli_close($conn);

