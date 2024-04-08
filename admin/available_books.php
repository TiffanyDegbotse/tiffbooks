<?php
include "../functions/get_lended_books_function.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Available books</title>
    <link rel="stylesheet" href="../css/stylebook.css" />
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
            font-family: 'Hind', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to top, orange, purple); /* Background gradient */
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Set container background color with opacity */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 10px auto; /* Center the container */
            max-width: 900; /* Set max width for the container */
        }

        h1 {
            color: #333; /* Header text color */
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 20px auto; /* Center the container */
            margin-bottom: 20px; /* Add some space below the button */
        }
    </style>
</head>

<body>
    <button onclick="goBack()">Go to your story book management</button>

    <script>
        function goBack() {
            window.location.href = "storybooks_view.php";
        }
    </script>

    <div class="container">
        <h1>Available Books</h1>

        <!-- Display Books -->
        <?php
        get_lended_books();
        ?>
    </div>

</body>

</html>