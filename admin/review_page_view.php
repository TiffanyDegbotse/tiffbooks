<!DOCTYPE html>
<html>

<head>
    <title>Submit Review</title>
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

    <!-- Additional Styles -->
    <style>
        body {
            font-family: 'Hind', sans-serif;
            margin: 0;
            padding: 0;
            background:linear-gradient(to bottom, orange, purple);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button.submit-review-btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button.submit-review-btn:hover {
            background-color: #555;
        }
    </style>
    <!-- //Additional Styles -->
</head>

<body>

    <div class="container">
        <h2>Submit Review</h2>
        <form action="../actions/review_action.php" method="post">
            <input type="hidden" name="isbn" id="review-isbn" value="<?php echo isset($_GET['isbn']) ? $_GET['isbn'] : ''; ?>" />
            <label for="review-text">Review:</label>
            <input type="text" id="review-text" name="review_text" placeholder="Enter your review" required />
            <label for="review-rating">Rating:</label>
            <select name="rating" id="review-rating" required>
                <option value="">Select rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button class="submit-review-btn" type="submit" id="submit-review-btn">Submit Review</button>
        </form>
    </div>

</body>

</html>
