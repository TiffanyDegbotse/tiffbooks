<?php
// Include the database connection file
require_once '../settings/connection.php';

// Check if ISBN, new name, author, genre, and status are provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['isbn']) && isset($_POST['book_name']) && isset($_POST['author']) && isset($_POST['genre']) && isset($_POST['status'])) {
    // Get ISBN, new name, author, genre, and status from the POST request
    $isbn = $_POST['isbn'];
    $name = $_POST['book_name'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $status = $_POST['status'];

    // Update the book details in the books table
    $sql = "UPDATE books b
    JOIN author a ON b.authorid = a.authorid
    JOIN genre g ON b.genreid = g.genreid
    SET b.bookname = '$name', a.authorname = '$author', g.genrename = '$genre'
    WHERE b.ISBN = '$isbn'";

    $result = mysqli_query($conn, $sql);

    // Update the status in the readingstatus table
    $sql_status = "UPDATE readingstatus SET readingstatus = '$status' WHERE ISBN = '$isbn'";
    $result_status = mysqli_query($conn, $sql_status);

    // Check if the updates were successful
    if ($result && $result_status) {
        // Check if status is "completed" and display confirmation message
        if ($status == "completed") {
            echo "<div style='margin: 0 auto; text-align: center; background: linear-gradient(to bottom, orange, purple); height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;'>";
            echo "<h2>Would you like to offer this book up for lending?</h2>";
            echo "<form action='../admin/lending_view.php?isbn=$isbn' method='post'>";
            echo "<input type='hidden' name='isbn' value='$isbn'>";
            echo "<button type='submit' class='btn btn-yes' name='submit'>Yes</button>";
            echo "</form>";
            echo "<form action='../admin/storybooks_view.php' method='post'>";
            echo "<button type='submit' class='btn btn-no' name='submit'>No</button>";
            echo "</form>";
            echo "</div>";
            exit();
        } else {
            // Redirect back to the previous page (storybooks_view.php)
            header("Location: ../admin/storybooks_view.php?isbn=$isbn");
            exit();
        }
    } else {
        echo "Error updating book details: " . mysqli_error($conn);
    }
} else {
    // If ISBN, name, author, genre, or status is not provided, redirect back to the previous page with an error message
    echo "yie";
    header('Location: ../admin/storybooks_view.php?error=missing_parameters');
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
