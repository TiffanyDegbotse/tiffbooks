<!DOCTYPE html>
<html>

<head>
    <title>Available books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->

    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //web font -->

    <style>
        /* Additional Styles */
        body {
            background-color: #f1f1f1;
            font-family: 'Hind', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .book-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .book {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .book img {
            max-width: 100px;
            margin-right: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .book-details {
            flex: 1;
        }

        .book-title {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .book-details p {
            margin: 5px 0;
        }

        .view-pdf {
            margin-top: 10px;
        }

        .view-pdf a {
            background-color: #333;
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .review-btn {
            background-color: #333;
            color: #fff;
            padding: 4px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Available Books</h1>

        <!-- Display Books -->
        <?php
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
                                <a href='" . $row["pdf_filepath"] . "' target='_blank'>View PDF</a>
                            </div>
                        </div>
                    </div>
                    <div class='submit-review-btn'>
                    <form action='../actions/review_action.php' method='post'>
                        <input type='hidden' name='isbn' value='" . $row["ISBN"] . "'>
                        <input type='submit' value='Submit Review Here' class='review-btn'>
                    </form>
                </div>
                  </div>";
            
            }
        } else {
            echo "<p>No lended books found</p>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>

</body>

</html>