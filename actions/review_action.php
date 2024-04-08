<?php
// Include the connection file
include '../settings/connection.php';
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $isbn = $_POST['isbn']; // ISBN of the book
    $review_text = $_POST['review_text']; // Review text
    $rating = $_POST['rating']; // Rating

    // Get the ID of the current user from the session
    if(isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];
    } else {
        // Handle the case where the user is not logged in
        echo "Error: User not logged in.";
        exit();
    }
     // Get the ID of the current user from the session
     if(isset($_SESSION['rid'])) {
        $rid = $_SESSION['rid'];
    } else {
        // Handle the case where the user is not logged in
        echo "Error: User not logged in.";
        exit();
    }

    // Prepare and execute the SQL statement to insert review into book_reviews table
    $sql_insert_review = "INSERT INTO book_reviews (ISBN, pid, review_text, rating) VALUES ('$isbn', '$user_id', '$review_text', '$rating')";
    if ($conn->query($sql_insert_review) === TRUE) {
        // Get the review ID of the inserted review
        $review_id = $conn->insert_id;

        // Prepare and execute the SQL statement to insert review ID into reviewstatus table with default status of 0
        $sql_insert_reviewstatus = "INSERT INTO reviewstatus (reviewid, reviewstatus) VALUES ('$review_id', '0')";
        if ($conn->query($sql_insert_reviewstatus) === TRUE) {
           // Check the value of rid
    if ($rid == 1) {
        // Redirect to the approve_review.php page
        header('Location:../admin/approve_review.php ?isbn=' . urlencode($isbn));
    } elseif ($rid == 2) {
        // Redirect to the display_reviews.php page
        header('Location:../admin/display_reviews.php?isbn=' . urlencode($isbn));
    } else {
        // Redirect to a default page if rid doesn't match any condition
        header('Location:../admin/display_reviews.php');
    }
            exit();
        } else {
            echo "Error inserting review status: " . $conn->error;
        }
    } else {
        echo "Error inserting review: " . $conn->error;
    }
}
