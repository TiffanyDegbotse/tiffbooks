<?php
require_once '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $BookName = $_POST["book-name"];
    $Author = $_POST["author"];
    $Genre = $_POST["genre"];
    
    // SQL query to insert book into database
    $sql = "INSERT INTO books (bookname, authorid, genreid) 
            SELECT '$BookName', author.authorid, genre.genreid
            FROM author, genre
            WHERE author.authorname = '$Author' 
            AND genre.genrename = '$Genre'";
    
    $result = $conn->query($sql);
    if ($result) {
        header('Location: ../admin/storybooks_view.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo 'error';
    header('Location: ../admin/storybooks_view.php');
    exit();
}
$conn->close();

