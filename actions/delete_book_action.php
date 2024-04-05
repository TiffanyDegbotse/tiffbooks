<?php
// Include the connection file
include '../settings/connection.php';

// Check if book_id is set in the GET URL
if(isset($_GET['book_id'])) {
    // Retrieve book_id from the GET URL
    $bookId = $_GET['book_id'];

    // Check if there are any related records in the readingstatus table
    $check_sql = "SELECT * FROM readingstatus WHERE ISBN = $bookId";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // If there are related records in readingstatus table, delete them first
        $delete_reading_sql = "DELETE FROM readingstatus WHERE ISBN = $bookId";
        if ($conn->query($delete_reading_sql) === TRUE) {
            // Check if there are any related records in the bookstatus table
            $check_bookstatus_sql = "SELECT * FROM bookstatus WHERE ISBN = $bookId";
            $check_bookstatus_result = $conn->query($check_bookstatus_sql);

            if ($check_bookstatus_result->num_rows > 0) {
                // If there are related records in bookstatus table, delete them
                $delete_bookstatus_sql = "DELETE FROM bookstatus WHERE ISBN = $bookId";
                if ($conn->query($delete_bookstatus_sql) === TRUE) {
                    // Proceed with deleting the book record
                    $delete_book_sql = "DELETE FROM books WHERE ISBN = $bookId";
                    if ($conn->query($delete_book_sql) === TRUE) {
                        // Redirect to book display page if deletion was successful
                        header('Location: ../admin/storybooks_view.php');
                        exit();
                    } else {
                        // Display error message if deletion of book record failed
                        echo "Error deleting book record: " . $conn->error;
                    }
                } else {
                    // Display error message if deletion of bookstatus records failed
                    echo "Error deleting bookstatus records: " . $conn->error;
                }
            } else {
                // If there are no related records in the bookstatus table, proceed with deleting the book record directly
                $delete_book_sql = "DELETE FROM books WHERE ISBN = $bookId";
                if ($conn->query($delete_book_sql) === TRUE) {
                    // Redirect to book display page if deletion was successful
                    header('Location: ../admin/storybooks_view.php');
                    exit();
                } else {
                    // Display error message if deletion of book record failed
                    echo "Error deleting book record: " . $conn->error;
                }
            }
        } else {
            // Display error message if deletion of readingstatus records failed
            echo "Error deleting readingstatus records: " . $conn->error;
        }
    } else {
        // If there are no related records in the readingstatus table, proceed with checking bookstatus table
        $check_bookstatus_sql = "SELECT * FROM bookstatus WHERE ISBN = $bookId";
        $check_bookstatus_result = $conn->query($check_bookstatus_sql);

        if ($check_bookstatus_result->num_rows > 0) {
            // If there are related records in bookstatus table, delete them
            $delete_bookstatus_sql = "DELETE FROM bookstatus WHERE ISBN = $bookId";
            if ($conn->query($delete_bookstatus_sql) === TRUE) {
                // Proceed with deleting the book record
                $delete_book_sql = "DELETE FROM books WHERE ISBN = $bookId";
                if ($conn->query($delete_book_sql) === TRUE) {
                    // Redirect to book display page if deletion was successful
                    header('Location: ../admin/storybooks_view.php');
                    exit();
                } else {
                    // Display error message if deletion of book record failed
                    echo "Error deleting book record: " . $conn->error;
                }
            } else {
                // Display error message if deletion of bookstatus records failed
                echo "Error deleting bookstatus records: " . $conn->error;
            }
        } else {
            // If there are no related records in the bookstatus table, proceed with deleting the book record directly
            $delete_book_sql = "DELETE FROM books WHERE ISBN = $bookId";
            if ($conn->query($delete_book_sql) === TRUE) {
                // Redirect to book display page if deletion was successful
                header('Location: ../admin/storybooks_view.php');
                exit();
            } else {
                // Display error message if deletion of book record failed
                echo "Error deleting book record: " . $conn->error;
            }
        }
    }
} else {
    // Redirect to book display page if book_id is not set in the GET URL
    header('Location: ../admin/storybooks_view.php');
    exit();
}

// Close the connection
$conn->close();
