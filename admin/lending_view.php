<!DOCTYPE html>
<html>

<head>
  <title>Lending and Borrowing</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <!-- //web font -->
  <style>
    /* Additional Styles for Lending and Borrowing Page */
    body {
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
      justify-content: center;
      align-items: center;
      height: calc(100vh - 80px);
      padding-top: 80px;
      /* Height of header */
    }

    .shelves {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .shelf {
      background-color: rgba(255, 255, 255, 0.7);
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      margin-bottom: 20px;
    }

    .book-details {
      margin-top: 20px;
    }

    .book-details h2 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .book-details p {
      margin: 5px 0;
    }

    form {
      margin-top: 20px;
    }

    form input[type="file"] {
      margin-bottom: 10px;
    }

    form input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    footer {
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      width: 100%;
      box-sizing: border-box;
      position: fixed;
      bottom: 0;
    }
  </style>
</head>

<body>

  <!-- Header Section -->
  <header>
    <h1>Lending and Borrowing</h1>
  </header>

  <!-- Main Content Section -->
  <main>
    <!-- Shelves Section -->
    <div class="shelves">
      <!-- Shelf 1 -->
      <div class="shelf">
        <div class="book">
          <!-- Display Book Cover or Placeholder Image -->
          <div id="book-details">
            <!-- Book details will be loaded dynamically here -->
          </div>
        </div>
        <div>
          <?php
          // Check if ISBN is provided in the URL
          if (isset($_GET['isbn'])) {
            // Include the database connection file
            require_once '../settings/connection.php';

            // Retrieve ISBN from the URL
            $isbn = $_GET['isbn'];

            // Query to retrieve book details based on ISBN
            $sql = "SELECT b.bookname, g.genrename, a.authorname 
            FROM books b 
            INNER JOIN genre g ON b.genreid = g.genreid 
            INNER JOIN author a ON b.authorid = a.authorid 
            WHERE b.ISBN = '$isbn';
            ";
            $result = mysqli_query($conn, $sql);

            // Check if any row is returned
            if (mysqli_num_rows($result) > 0) {
              // Fetch and display book details
              $row = mysqli_fetch_assoc($result);
              echo "<h2>{$row['bookname']}</h2>";
              echo "<p>Author: {$row['authorname']}</p>";
              echo "<p>Genre: {$row['genrename']}</p>";
              // Add more fields as needed
          
              // Close the database connection
              mysqli_close($conn);
            } else {
              // No book found with the provided ISBN
              echo "<p>No book found with ISBN: $isbn</p>";
            }
          } else {
            // ISBN is not provided in the URL
            echo "<p>ISBN is missing in the URL.</p>";
          }
          ?>
        </div>
        <div class="book-details">
          <!-- Lend Book Form -->
          <form id="lendingForm" action="../actions/change_status_action.php?isbn=<?php echo $isbn; ?>" method="post">
            <!-- Hidden input fields to pass book details -->
            <input type="hidden" name="isbn" id="isbn">
            <input type="hidden" name="pdf" id="pdf">
            <input type="hidden" name="image" id="image">
            <button type="submit" name="offer" onclick="submitForm()">Offer this up for lending</button>
            
          </form>
        </div>
       
      </div>


      <!-- Add more shelves and books as needed -->

    </div>
  </main>

  <!-- Footer Section -->
  <footer>
    <!-- Footer content as per your design -->
  </footer>

</body>

</html>