<?php
require_once '../settings/connection.php';

function getAllBooks()
{
    global $conn;
    $book = array();
    $sql = "SELECT b.bookname AS BookName, g.genrename AS Genre, a.authorname AS Author
    FROM books b
    JOIN genre g ON b.genreid = g.genreid
    JOIN author a ON b.authorid = a.authorid";
    
    $result = $conn->query("$sql");
    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $book[] = $row;
            }
            return $book;
        }
    }
}