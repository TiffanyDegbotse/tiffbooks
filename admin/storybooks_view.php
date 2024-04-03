<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Inventory Management</title>
  <link rel="stylesheet" href="../css/style_management.css" />
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
              $email=$_SESSION['email'];
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
          Add Product
        </button>
        <div class="search-container">
          <form>
            <input type="text" placeholder="Search product or category" name="search" id="search-input" />
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
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="product-list">
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
          <form action="../actions/add_management_action.php" method="post" id="product-form">
            <label for="book-name">Book Name:</label>
            <input type="text" name="book-name" id="book-name" placeholder="Enter the name of the book" required />
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" placeholder="Who is the author of the book?" required />
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" placeholder="What genre is this book?" required>
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
      <form action="../actions/edit_a_product.php" method="post">
        <input type="hidden" id="edit-product-id" name="product_id" />
        <label for="edit-product-name">Product Name:</label>
        <input type="text" id="edit-product-name" name="product_name" required />
        <label for="edit-sku">SKU:</label>
        <input type="text" id="edit-sku" name="sku" required />
        <label for="edit-category">Category:</label>
        <select class="add-inventory-btn" name="category" id="edit-category" required>
          <option selected id="selected"></option>
          <?php
          include "../functions/select_category_fxn.php";
          echo $options;
          ?>
        </select>
        <label for="edit-quantity">Quantity in Stock:</label>
        <input type="number" id="edit-quantity" name="quantity_in_stock" required />
        <label for="edit-location">Location in Shop:</label>
        <input type="text" id="edit-location" name="location_in_shop" required />
        <label for="edit-description">Product Description:</label>
        <input type="text" id="edit-description" name="product_description" />
        <button class="add-inventory-btn" type="submit">Save Changes</button>
      </form>
    </div>
  </div>
  <script>
    function editProduct(id, name, sku, category, quantity, location, description) {
      var option = document.getElementById('selected');
      document.getElementById('edit-product-id').value = id;
      document.getElementById('edit-product-name').value = name;
      document.getElementById('edit-sku').value = sku;
      option.value = category;
      option.innerText = category;
      document.getElementById('edit-category').appendChild(option)
      document.getElementById('edit-quantity').value = quantity;
      document.getElementById('edit-location').value = location;
      document.getElementById('edit-description').value = description;
      document.getElementById('edit-modal').style.display = 'block';
    }

    document.querySelector('.modal .eclose').addEventListener('click', function() {
      document.getElementById('edit-modal').style.display = 'none';
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
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