<?php
// Include the connection file
include '../settings/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $isbn = $_POST['isbn']; // ISBN of the book
    // Process form submission to approve or reject reviews
    // Loop through the submitted data and update the status accordingly
    if (isset($_POST['approve']) && is_array($_POST['approve'])) {
        foreach ($_POST['approve'] as $reviewid) {
            // Prepare and execute the SQL statement to update review status to approved (status = 1)
            $sql = "UPDATE reviewstatus SET reviewstatus = 1 WHERE reviewid = $reviewid";
            if ($conn->query($sql) === TRUE) {
                // Successfully updated status
            } else {
                echo "Error updating status: " . $conn->error;
            }
        }
    }

    // Redirect to available_books page after approval
    header('Location:../admin/available_books.php');
    exit();
}

// Fetch reviews pending approval
$sql = "SELECT br.reviewid, br.review_text, br.rating
        FROM book_reviews br
        LEFT JOIN reviewstatus rs ON br.reviewid = rs.reviewid
        WHERE rs.reviewstatus = 0 OR rs.reviewstatus IS NULL";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
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
    <!-- Circle section added here -->
    <h2 class="mb-4"> Percentage Approved</h2>
    <div class="circle">
        <span>
            <?php include '../actions/calculate_approval_rate.php';
            echo calculateApprovalRate(); ?>%
        </span>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Pending Reviews Approval</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Review Text</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["review_text"] . "</td>";
                            echo "<td>" . $row["rating"] . "</td>";
                            echo "<td><input type='checkbox' name='approve[]' value='" . $row["reviewid"] . "'> Approve</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No reviews pending approval.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit Approval</button>
        </form>
    </div>
</body>

</html>