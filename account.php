<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="css/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Add this to the head of your HTML file -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="js/popup.js"></script>

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/acc-style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/account-style.css">
  <link rel="stylesheet" href="css/account.css">
  <title></title>
</head>

<body>



<div class="header">
    <a href="landingpage.php"><img src="img/icons8-arrow-back-30.png" alt="" class="back"></a>
    <img src="img/Untitled_design__2_-removebg-preview.png" alt="" class="backdrop">
    <?php

    include 'connection.php';
    session_start();

    // Check if user_id is set in the session
    if (isset($_SESSION['user_id'])) {
        // Fetch the user's name from the user table
        $userId = $_SESSION['user_id'];
        $query = "SELECT fname, lname FROM users WHERE id = $userId";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Display the user's name
            echo '<p>' . $user['fname'] . ' ' . $user['lname'] . '</p>';
        }
    }
    ?>
</div>
  <div class="bg-acc">
    <img src="img/icons8-user-default-64.png" alt="">
  </div>
  <div class="search-container">
    <input type="text" id="searchInput" placeholder="Search...">
    <button id="searchButton">Search</button>
  </div>
  <div class="menu">
    <a href="recipe.php"><img src="img/create.png">&nbsp;View&nbsp;Recipes</a>
    <a href="recent-act.html"><img src="img/book.png">&nbsp;Saved</a>
    <a href="create.php"><img src="img/create.png" alt="">&nbsp;Add&nbsp;new&nbsp;Recipe</a>
    <a href="account.php">
      <img src="img/icons8-settings-64.png" alt="Settings icon"> &nbsp; Manage&nbsp;Account
    </a>
    <a href="login.php"><img src="img/logout.png">&nbsp;Logout</a>
  </div>
  </script>
  <!-- Blog Start -->
  <div class="container-fluid pt-5">
    <div class="container">
      <div class="row">



        <?php
        include 'connection.php';

        // Assuming you have a user ID stored in the session
        
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $query = "SELECT recipe.*, users.fname, users.lname, COALESCE(AVG(ratings.rating), 0) AS average_rating, COUNT(ratings.rating) AS total_ratings
        FROM recipe
        JOIN users ON recipe.user_id = users.id
        LEFT JOIN ratings ON recipe.id = ratings.recipe_id
        WHERE recipe.user_id = $user_id
        GROUP BY recipe.id";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="col-md-6 mb-5">
            <!-- Your HTML code to display each recipe -->
            <!-- Replace the static values with PHP variables from $row -->
            <div class="position-relative">
              <img class="img-fluid w-100" src="get_image.php?id=<?php echo $row['id']; ?>" alt="">
              
            </div>
            <div class="bg-secondary" style="padding: 30px;">
              <!-- Display recipe details from $row -->
              <div class="d-flex mb-3">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle" style="width: 40px; height: 40px;" src="img/profile.jpg" alt="">
                  <a class="text-muted ml-2" href=""><?php echo $row['fname'] . ' ' . $row['lname']; ?></a>
                </div>
                <div class="d-flex align-items-center ml-4">
                  <i class="far fa-bookmark text-primary"></i>
                  <a class="text-muted ml-2" href=""></a>
                </div>
              </div>
              <h4 class="font-weight-bold mb-3"><?php echo $row['title']; ?></h4>
              <p><?php echo $row['description']; ?></p>
              <a class="border-bottom border-primary text-uppercase text-decoration-none" href="recipe.php#recipe-<?php echo $row['id']; ?>">Read More <i class="fa fa-angle-right"></i></a>
              <!-- Add buttons for edit and delete, use JavaScript functions -->
              <button onclick="showEditForm('<?php echo $row['id']; ?>')"><img src="img/edit.png" alt=""></button>
              <button onclick="confirmDelete('<?php echo $row['id']; ?>')"><img src="img/delete (2).png" alt=""></button>
              <div class="popup-container" id="editFormPopup_<?php echo $row['id']; ?>">
                <h2>Edit Content</h2>
                <form id="editForm_<?php echo $row['id']; ?>">

                  <label for="editedTitle">Edited Title:</label>
                  <textarea id="editedTitle_<?php echo $row['id']; ?>" rows="4" cols="50" placeholder="Enter the edited Title..."></textarea>

                  <label for="editedDescription">Edited Description:</label>
                  <textarea id="editedDescription_<?php echo $row['id']; ?>" rows="4" cols="50" placeholder="Enter the edited Description..."></textarea>


                  <label for="editedIngredients">Edited Ingredients:</label>
                  <textarea id="editedIngredients_<?php echo $row['id']; ?>" rows="4" cols="50" placeholder="Enter the edited Ingredients..."></textarea>

                  <label for="editedInstructions">Edited Instructions:</label>
                  <textarea id="editedInstructions_<?php echo $row['id']; ?>" rows="4" cols="50" placeholder="Enter the edited Instructions..."></textarea>

                  <button type="button" onclick="confirmEdit('<?php echo $row['id']; ?>')">Edit</button>
                </form>
                <button onclick="closePopup('<?php echo $row['id']; ?>')">Cancel</button>
              </div>
            </div>
          </div>

        <?php
        }
        mysqli_close($conn);
        ?>

        <script src="js/popup.js"></script>

      </div>
      <!-- Blog End -->
</body>

</html>