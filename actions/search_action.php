<?php
// Include the connection file
include_once '../settings/connection.php';
function display_search()
{
    global $conn;
    // Check if the search query parameter is set
    if (isset($_GET['search'])) {
        // Sanitize the search query
        $search_query = $_GET['search'];

        $sql = "SELECT b.ISBN AS ISBN, b.bookname AS BookName, a.authorname AS Author, g.genrename AS Genre, rs.readingstatus AS Status
        FROM books b
        JOIN author a ON b.authorid = a.authorid
        JOIN genre g ON b.genreid = g.genreid
        LEFT JOIN readingstatus rs ON b.ISBN = rs.ISBN
        WHERE b.bookname LIKE '%$search_query%' OR a.authorname LIKE '%$search_query%'";

        

        $result = mysqli_query($conn, $sql);


        if ($result) {
            while($book = mysqli_fetch_assoc($result)) {

                // Return the product details in HTML format
                echo "
                <tr>
                    <td>". $book['BookName']." </td>
                    <td>". $book['Author']." </td>
                    <td> ".$book['Genre']." </td>
                    <td>". $book['Status']." </td>
                    <td>
                     <a href='#' onclick='editProduct(\"{$book['ISBN']}\", \"{$book['BookName']}\", \"{$book['Author']}\", \"{$book['Genre']}\")'><button class='edit-product-btn'>Edit</button></a>;
                     <a href='../actions/delete_book_action.php?book_id={$book['ISBN']}'><button class='delete-product-btn'>Delete</button></a>
                    </td>
                </tr>
                ";
            }
        } else {
            echo "Error executing search query";
        }
    }
}