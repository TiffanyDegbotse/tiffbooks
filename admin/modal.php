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

<body>

    <!-- Hidden review modal -->
    <div class="modal" id="review-modal" style="display: none;">
        <div class="modal-content">
            <span class="close rclose">&times;</span>
            <h2>Submit Review</h2>
            <form action="../actions/review_action.php" method="post">
                <input type="hidden" name="isbn" id="review-isbn" />
                <label for="review-text">Review:</label>
                <input type="text" id="review-text" placeholder="Enter your review" required />
                <label for="review-rating">Rating:</label>
                <select name="rating" id="review-rating" required>
                    <option value="">Select rating</option>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                <button class="submit-review-btn" type="submit" id='submit-review-btn'>Submit Review</button>
            </form>
        </div>
    </div>