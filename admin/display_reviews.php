<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if ISBN is provided in the URL
if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];

    // Fetch approved reviews
    $sql = "SELECT br.review_text, br.rating
        FROM book_reviews br
        JOIN reviewstatus rs ON br.reviewid = rs.reviewid
        WHERE rs.reviewstatus = 1 AND br.ISBN = '$isbn'";
    $result = $conn->query($sql);

} else {
    // If ISBN is not provided, show an error message or redirect
    // For simplicity, let's redirect to the available_books.php page
    echo ("yie");
    exit();
}



// Close the connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Reviews</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            /* Background linear gradient */
            background: linear-gradient(to top, orange, purple);
            /* Ensure content takes full height */
            min-height: 100vh;
            /* Add padding to top to prevent content overlap with fixed navbar */
            padding-top: 50px;
            /* Adjust as needed */
            font-family: Arial, sans-serif;
            /* Change font for deeper writing */
        }

        .circle {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            /* Adjust margin as needed */
        }

        .circle span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <button onclick="goBack()">See available books</button>

    <script>
        function goBack() {
            window.location.href = "available_books.php";
        }
    </script>
    <div class="container mt-5">
        <h2 class="mb-4">Approved Book Reviews</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Review Text</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["review_text"] . "</td>";
                    echo "<td>" . $row["rating"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No reviews found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</body>

</html>