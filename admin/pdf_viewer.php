<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF Viewer</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        embed {
            width: 100%;
            height: 100%;
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <a href="available_books.php" class="back-button">Back to Available Books Page</a>
    <embed src="<?php echo $_GET['pdf_filepath']; ?>" type="application/pdf">
</body>

</html>