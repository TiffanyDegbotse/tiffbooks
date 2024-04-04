<?php
// Include the connection file
include '../settings/connection.php';

// Check if book_id is set in the GET URL
if(isset($_GET['book_id'])) {
    // Retrieve book_id from the GET URL
    $bookId = $_GET['book_id'];

    // Write your DELETE query
    $sql = "DELETE FROM books WHERE ISBN = $bookId";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to chore display page if deletion was successful
        header('Location: ../admin/storybooks_view.php');
        exit();
    } else {
        // Display error message if deletion failed
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect to chore display page if product_id is not set in the GET URL
    header('Location: ../add/storybooks_view.php');
    exit();
}

// Close the connection
$conn->close();