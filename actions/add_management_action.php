<?php
require_once '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User inputs
    $book_name = $_POST['book-name'];
    $author_name = $_POST['author'];
    $genre_name = $_POST['genre'];

    // Check if the book already exists
    $sql_check_book = "SELECT * FROM books WHERE bookname = '$book_name'";
    $result_check_book = mysqli_query($conn, $sql_check_book);
    if (mysqli_num_rows($result_check_book) > 0) {
        echo "<script>
        alert('You have already logged in this book.');
        window.location.href='../admin/storybooks_view.php'
        </script>";
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

    // Insert book
    $sql_book = "INSERT INTO books (bookname, authorid, genreid) 
             VALUES ('$book_name', $author_id, $genre_id)";
    $result_book = mysqli_query($conn, $sql_book);

    // Check if book insertion was successful
    if ($result_book) {
        $isbn = mysqli_insert_id($conn); // Get the ISBN of the newly inserted book

        // Insert default status "in progress" into readingstatus table
        $sql_readingstatus = "INSERT INTO readingstatus (ISBN, readingstatus) VALUES ('$isbn', 'in progress')";
        $result_readingstatus = mysqli_query($conn, $sql_readingstatus);

        // Check if all inserts were successful
        if ($result_author && $result_genre && $result_readingstatus) {
            header('Location: ../admin/storybooks_view.php'); // Redirect to storybooks_view.php
            exit();
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

