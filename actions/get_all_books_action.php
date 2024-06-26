<?php
require_once '../settings/connection.php';

function getBooksForUser($pid)
{
    global $conn;
    $books = array();
    $sql = "SELECT b.ISBN AS ISBN, b.bookname AS BookName, g.genrename AS Genre, a.authorname AS Author, rs.readingstatus AS Status
    FROM books b
    JOIN genre g ON b.genreid = g.genreid
    JOIN author a ON b.authorid = a.authorid
    LEFT JOIN userbook ub ON b.ISBN = ub.ISBN
    LEFT JOIN readingstatus rs ON b.ISBN = rs.ISBN
    WHERE ub.pid = $pid";

    $result = $conn->query($sql);
    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
            return $books;
        }
    }
}
