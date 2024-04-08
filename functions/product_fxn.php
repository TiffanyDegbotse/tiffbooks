<?php
include_once '../actions/get_all_books_action.php';

$user_id = $_SESSION['userid']; // Assuming you have a session variable for user ID

$books = getBooksForUser($user_id);

// Display the Products in a table
if (empty($books)) {
    return;
} else {
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td>{$book['BookName']}</td>";
        echo "<td>{$book['Author']}</td>";
        echo "<td>{$book['Genre']}</td>";
        echo "<td>{$book['Status']}</td>"; // Displaying the status here
        echo "<td>";
        echo "<a href='#' onclick='editProduct(\"{$book['ISBN']}\", \"{$book['BookName']}\", \"{$book['Author']}\", \"{$book['Genre']}\")'><button class='edit-product-btn'>Edit</button></a>";
        echo "<a href='../actions/delete_book_action.php?book_id={$book['ISBN']}'><button class='delete-product-btn'>Delete</button></a>";
        echo "</td>";
        echo "</tr>";
    }
}
