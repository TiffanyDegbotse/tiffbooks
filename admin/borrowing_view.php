<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing View</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <!-- Adjust the path if needed -->
    <style>
        /* Additional Styles for Borrowing View */
        body {
            background-image: url('../images/adminhome.jpg');
            font-family: 'Hind', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: flex-start;
            padding-top: 80px; /* Height of header */
            padding-bottom: 20px; /* Adjust as needed */
        }

        .shelf {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-bottom: 20px;
        }

        .book {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .book img {
            max-width: 200px; /* Adjust the max-width of the image */
            height: auto;
            margin-bottom: 10px;
        }

        .book-details {
            text-align: center;
        }

        .book-details h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .book-details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Borrowing View</h1>
</header>

<main>
    <!-- Display the uploaded book details -->
    <?php
    // Check if the uploaded files exist
    if (isset($_GET['pdf']) && isset($_GET['image'])) {
        // Get the file paths
        $pdfFilePaths = $_GET['pdf'];
        $imageFilePaths = $_GET['image'];

        // Check if the file paths are arrays
        if (is_array($pdfFilePaths) && is_array($imageFilePaths)) {
            // Iterate through the file paths and display each book
            for ($i = 0; $i < count($pdfFilePaths); $i++) {
                echo "<div class='shelf'>
                        <div class='book'>
                            <img src='" . $imageFilePaths[$i] . "' alt='Book Cover'>
                        </div>
                        <div class='book-details'>
                            <h2>Book Title</h2>
                            <p>Author: John Doe</p>
                            <p>Genre: Fiction</p>
                            <p><a href='" . $pdfFilePaths[$i] . "' target='_blank'>Read Book PDF</a></p>
                        </div>
                    </div>";
            }
        } else {
            echo "No book details found.";
        }
    } else {
        echo "No book details found.";
    }
    ?>
</main>

<footer>
    <!-- Footer content -->
</footer>

</body>
</html>
