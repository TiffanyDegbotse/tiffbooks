<?php
include_once '../actions/get_all_books_action.php';

$books = getAllBooks();

// print_r($products);
// exit();
// Display the Products in a table
if (empty($books)) {
    return;
} else {
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td>{$book['bookname']}</td>";
        echo "<td>{$book['authorname']}</td>";
        echo "<td>{$book['genrename']}</td>";
        echo "<td>";
        echo "<a href='#' onclick='editProduct(\"{$product['ProductID']}\", \"{$product['ProductName']}\", \"{$product['SKU']}\", \"{$product['Category']}\", \"{$product['QuantityInStock']}\", \"{$product['LocationInShop']}\", \"{$product['ProductDescription']}\")'><button class='edit-product-btn'>Edit</button></a>";
        echo "<a href='../actions/delete_product_action.php?product_id={$product['ProductID']}'><button class='delete-product-btn'>Delete</button></a>";
        echo "</td>";
        echo "</tr>";
    }
}
