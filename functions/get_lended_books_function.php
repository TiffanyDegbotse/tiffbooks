<?php
function get_lended_books() {

    // Include the connection file
    include '../settings/connection.php';

    // SQL query to select books with status 1 from bookstatus table
    $sql = "SELECT b.*, a.authorname, g.genrename FROM books b
        INNER JOIN author a ON b.authorid = a.authorid
        INNER JOIN genre g ON b.genreid = g.genreid
        INNER JOIN bookstatus bs ON b.ISBN = bs.ISBN
        WHERE bs.bookstatus = 1";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div class='book-container'>
                <div class='book'>
                    <img src='" . $row["image_filepath"] . "' alt='Book Cover'>
                    <div class='book-details'>
                        <h2 class='book-title'>" . $row["bookname"] . "</h2>
                        <p>Author: " . $row["authorname"] . "</p>
                        <p>Genre: " . $row["genrename"] . "</p>
                        <div class='view-pdf'>
                        <a href='pdf_viewer.php?pdf_filepath=" . $row["pdf_filepath"] . "' target='_blank'>View PDF</a>
                        </div>
                    </div>
                    <div class='view-review'>
                        <a href='../admin/display_reviews.php?isbn=".$row['ISBN']."'>View Reviews</a>
                        </div>
                </div>
                <div class='review-btn'>
                    <a href='review_page_view.php?isbn=".$row['ISBN']."' class='review-btn'> Submit Review</a>
                    </div>
            </div>"; // Closing book-container div added here
        }
    } else {
        echo "<p>No lended books found</p>";
    }
    
    // Close the connection
    $conn->close();
}

