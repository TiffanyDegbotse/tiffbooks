<?php
// Include the database connection file
require_once '../settings/connection.php';

// Check if ISBN is provided in the URL
if(isset($_GET['isbn'])) {
    // Retrieve ISBN from the URL
    $isbn = $_GET['isbn'];

    // Update the book status to 1 (lending)
    $updateSql = "UPDATE bookstatus SET bookstatus = 1 WHERE ISBN = '$isbn'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        // Redirect to borrowing_view page
        header("Location:../admin/available_books.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        echo "Error updating book status: " . mysqli_error($conn);
    }
} else {
    echo "ISBN is missing in the URL.";
}

// Close the database connection
mysqli_close($conn);
