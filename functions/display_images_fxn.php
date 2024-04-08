<?php
// Include the connection file
include_once '../settings/connection.php';

function display_images($email) {
    global $conn;

// SQL query to fetch the last 4 rows from the books table
$sql = "SELECT * FROM books ORDER BY ISBN DESC LIMIT 4";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display the image inside a div element
        echo "<div class='col-lg-6 mb-2 pr-lg-1'>";
       // echo "<a href='" . $row["pdf_filepath"] . "' target='_blank'>";
        echo "<a href='pdf_viewer.php?pdf_filepath=" . $row["pdf_filepath"] . "' target='_blank'>";
        echo "<img src='" . $row["image_filepath"] . "' alt='Book Image' style='width: 100%; height: auto; margin-bottom: 10px;'>";
        echo "</a>";
        echo "</div>";
    }
} else {
    echo "No books found.";
}
}

