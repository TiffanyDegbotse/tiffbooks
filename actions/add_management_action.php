<?php
require_once '../settings/connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User inputs
    $book_name = $_POST['book-name'];
    $author_name = $_POST['author'];
    $genre_name = $_POST['genre'];

    // File upload directory
    $targetDir = "../uploads/";

    // Allow only pdf and image file types
    $allowedPdfExtensions = array("pdf");
    $allowedImageExtensions = array("jpg", "jpeg", "png", "gif");

    // Get file extensions for the uploaded files
    $pdfExtension = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
    $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // Check if file extensions are allowed
    if (!in_array($pdfExtension, $allowedPdfExtensions) || !in_array($imageExtension, $allowedImageExtensions)) {
        echo "Only PDF and image files are allowed.";
        exit();
    }

    // Generate unique file names for the uploaded files
    $pdfFileName = uniqid("pdf_") . "." . $pdfExtension;
    $imageFileName = uniqid("image_") . "." . $imageExtension;

    // File paths for the uploaded files
    $pdfFilePath = $targetDir . $pdfFileName;
    $imageFilePath = $targetDir . $imageFileName;

    // Move uploaded files to the target directory
    if (!move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfFilePath) || !move_uploaded_file($_FILES['image']['tmp_name'], $imageFilePath)) {
        echo "Sorry, there was an error uploading your files.";
        exit();
    }

    // Insert author
    $sql_author = "INSERT INTO author (authorname) VALUES ('$author_name')";
    $result_author = mysqli_query($conn, $sql_author);

    // Insert genre
    $sql_genre = "INSERT INTO genre (genrename) VALUES ('$genre_name')";
    $result_genre = mysqli_query($conn, $sql_genre);

    // Get the inserted author and genre IDs
    $author_id = mysqli_insert_id($conn);
    $genre_id = mysqli_insert_id($conn);

    // Insert book along with file paths
    $sql_book = "INSERT INTO books (bookname, authorid, genreid, pdf_filepath, image_filepath) 
                 VALUES ('$book_name', $author_id, $genre_id, '$pdfFilePath', '$imageFilePath')";
    $result_book = mysqli_query($conn, $sql_book);

    // Check if book insertion was successful
    if ($result_book) {
        $isbn = mysqli_insert_id($conn); // Get the ISBN of the newly inserted book

        // Insert default status "in progress" into readingstatus table
        $sql_readingstatus = "INSERT INTO readingstatus (ISBN, readingstatus) VALUES ('$isbn', 'in progress')";
        $result_readingstatus = mysqli_query($conn, $sql_readingstatus);

        // Insert default status "0" into bookstatus table
        $sql_bookstatus = "INSERT INTO bookstatus (ISBN, bookstatus) VALUES ('$isbn', '0')";
        $result_bookstatus = mysqli_query($conn, $sql_bookstatus);

        // Insert ISBN into book_reviews table
        $sql_book_reviews = "INSERT INTO book_reviews (ISBN) VALUES ('$isbn')";
        $result_book_reviews = mysqli_query($conn, $sql_book_reviews);

        // Check if all inserts were successful
        if ($result_author && $result_genre && $result_readingstatus && $result_bookstatus &&  $result_book_reviews ) {
            // Insert record into userbook table
            $user_id = $_SESSION['userid']; // Assuming you have a session variable for user ID
            $sql_userbook = "INSERT INTO userbook (pid, ISBN) VALUES ('$user_id', '$isbn')";
            $result_userbook = mysqli_query($conn, $sql_userbook);

            if ($result_userbook) {
                header('Location: ../admin/storybooks_view.php'); // Redirect to storybooks_view.php
                exit();
            } else {
                echo "Error adding book to user's profile: " . mysqli_error($conn);
            }
        } else {
            echo "Error adding book: " . mysqli_error($conn);
        }
    } else {
        echo "Error adding book: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($conn);

