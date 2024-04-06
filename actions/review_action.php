<?php
// Retrieve and display reviews for each book
$book_reviews_query = "SELECT * FROM book_reviews WHERE ISBN = :ISBN";
$book_reviews_stmt = $pdo->prepare($book_reviews_query);
foreach ($books as $book) {
    $book_id = $book['ISBN'];
    $book_reviews_stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    $book_reviews_stmt->execute();
    $reviews = $book_reviews_stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Reviews for " . $book['book_name'] . "</h3>";
    foreach ($reviews as $review) {
        echo "<p>Rating: " . $review['rating'] . "</p>";
        echo "<p>Review: " . $review['review_text'] . "</p>";
        echo "<p>Posted by: User ID " . $review['user_id'] . "</p>";
        echo "<hr>";
    }
}
?>
