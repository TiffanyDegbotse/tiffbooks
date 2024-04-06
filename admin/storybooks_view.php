<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Inventory Management</title>
  <link rel="stylesheet" href="../css/styling_management.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="../images/book.jpg" />
            <span class="nav-item"> Hello,
              <?php
              //Getting the user's email from the session
              include_once '../settings/connection.php';
              session_start();
              $email = $_SESSION['email'];
              include_once '../functions/display_name_fxn.php';
              echo display_name($email);
              ?>
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Lending/Borrowing</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-database"></i>
            <span class="nav-item">Storybook Management</span>
          </a>
        </li>
        <li>
          <a href="../logout.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
    </nav>
    <section class="inventory">
      <div class="inventory-list">
        <h1>Storybook Management</h1>
        <button class="add-inventory-btn" id="add-inventory-btn">
          Add A Book
        </button>
        <div class="search-container">
          <form>
            <input type="text" placeholder="Search book or author" name="search" id="search-input" />
            <button class="add-inventory-btn" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Book Name</th>
              <th>Author</th>
              <th>Genre</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="book-list">
            <?php
            if (isset($_GET['search'])) {
              include '../actions/search_action.php';
              display_search();
            } else {
              include '../functions/product_fxn.php';
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal" id="add-inventory-modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Add a New Product</h2>
          <form action="../actions/add_management_action.php" method="POST" enctype="multipart/form-data">
            <label for="book-name">Book Name:</label>
            <input type="text" name="book-name" id="book-name" placeholder="Enter the name of the book" required />
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" placeholder="Who is the author of the book?" required />
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" placeholder="What genre is this book?" required>
            <label for="pdf">Upload PDF:</label>
            <input type="file" name="pdf" accept=".pdf" required />
            <label for="image">Upload Image:</label>
            <input type="file" name="image" accept="image/*" required />
            <button type="submit" name="submit" class="add-inventory-btn" id="add-inventory-btn">
              Add Product
            </button>
          </form>
        </div>
      </div>

    </section>
  </div>
  <!-- Hidden modal for editing -->
  <div class="modal" id="edit-modal" style="display: none;">
    <div class="modal-content">
      <span class="close eclose">&times;</span>
      <h2>Edit Product</h2>
      <form action="../actions/edit_book_action.php" method="post">
        <input type="hidden" id="edit-isbn" name="isbn" />
        <label for="edit-book-name">Book Name:</label>
        <input type="text" id="edit-book-name" name="book_name" required />
        <label for="edit-author">Author:</label>
        <input type="text" id="edit-author" name="author" required />
        <label for="edit-genre">Genre:</label>
        <input type="text" id="edit-genre" name="genre" required />
        <label for="edit-status">Status:</label>
        <select id="edit-status" name="status" required>
          <option value="completed">Completed</option>
          <option value="in progress">In Progress</option>
        </select>
        <button class="add-inventory-btn" type="submit">Save Changes</button>
      </form>
    </div>
  </div>

  <script>
    function editProduct(id, name, author, genre) {
      document.getElementById('edit-isbn').value = id;
      document.getElementById('edit-book-name').value = name;
      document.getElementById('edit-author').value = author;
      document.getElementById('edit-genre').value = genre;
      document.getElementById('edit-modal').style.display = 'block';
    }

    document.querySelector('.modal .eclose').addEventListener('click', function () {
      document.getElementById('edit-modal').style.display = 'none';
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const addInventorybtn = document.getElementById("add-inventory-btn");
      const modal = document.getElementById("add-inventory-modal");
      const closeModalBtn = document.querySelector(".modal .close");

      // Add event listener to the add product button
      addInventorybtn.addEventListener("click", () => {
        modal.style.display = "block";
      });

      // Add event listener to the close button of add product modal
      closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
      });


      // const EditInventorybtn = document.getElementById("edit-inventory-btn");
      // const editModal = document.getElementById("edit-inventory-modal");
      // const EditCloseModalBtn = document.querySelector(".modal .close");

      //  // Add event listener to the add product button
      //  EditInventorybtn.addEventListener("click", () => {
      //   editModal.style.display = "block";
      // });

      // // Add event listener to the close button of add product modal
      // EditCloseModalBtn.addEventListener("click", () => {
      //   editModal.style.display = "none";
      // });
    });
  </script>
</body>

</html>