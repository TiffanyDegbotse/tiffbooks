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
    justify-content: center;
    align-items: center;
    height: calc(100vh - 80px);
    padding-top: 80px; /* Height of header */
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
        <!-- Book Cover or Placeholder Image -->
        <img src="../images/book_cover.jpg" alt="Book Cover">
      </div>
      <div class="book-details">
        <!-- Display Book Details -->
        <h2>Book Title</h2>
        <p>Author: John Doe</p>
        <p>Genre: Fiction</p>
        <!-- Add more details as needed -->
        <!-- Upload Form for Book PDF and Image -->
        <form action="../actions/upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="pdf" accept=".pdf">
          <input type="file" name="image" accept="image/*">
          <input type="submit" value="Upload">
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
