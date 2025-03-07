<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/recipe.css">
</head>
<body>
  <div class="header" id="header">
    <nav>
      <p>Cult's Kitchen</p>
        <img src="img/logo.jpg" alt="">
      <div class="vl"></div>
      </nav>  
      <div class="dropdown">
        <button class="dropbtn">
            <img src="img/menu.png" style="margin-left: 66rem; margin-top: -60px; width: 28px; height: 28px; position: absolute;">
        </button>
        <div class="dropdown-content">
            <a href="recipe.php">&nbsp;View&nbsp;Recipes</a>
            <a href="recent-act.html">&nbsp;Saved</a>
            <a href="setting.html">&nbsp;Settings</a>
            <a href="login.php">&nbsp;Logout</a>
        </div>
    </div>
     <div class="profile-container">
        <a href="account.php">
      <img src="img/icons8-user-default-64.png" alt="Profile Picture" style="width: 40px;height: 40px;border-radius: 50%;object-fit: cover;margin-left: 1090px;">
    </a>
    <div class="vl"></div>
      </div>
</div>

  <script>
    let prevScrollPos = window.pageYOffset;
    const header = document.getElementById('header');

    window.onscroll = function () {
      const currentScrollPos = window.pageYOffset;

      if (prevScrollPos > currentScrollPos) {
        header.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
      } else {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
      }

      prevScrollPos = currentScrollPos;
    };
  </script>
<h1>Recipes</h1>

<div class="recipe-container-wrapper">
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Find my recipe...">
    <button type="button" id="searchButton">Search</button>
  </div>

  <?php
            include 'connection.php';

            $query = "SELECT recipe.*, users.fname, users.lname, COALESCE(AVG(ratings.rating), 0) AS average_rating, COUNT(ratings.rating) AS total_ratings
          FROM recipe
          JOIN users ON recipe.user_id = users.id
          LEFT JOIN ratings ON recipe.id = ratings.recipe_id
          GROUP BY recipe.id";
            $result = mysqli_query($conn, $query);



            while ($row = mysqli_fetch_assoc($result)) {



    echo '<div class="recipe-container" id="' . $row['id'] . '">';
    echo '<img class="recipe-img" src="get_image.php?id=' . $row['id'] . '" alt="">';
    echo '<p class="recipe-name">' . $row['title'] . '</p>';
    echo '<h4 class="recipe-blog">' . $row['description'] . '</h4>';
    echo '<button class="recipe-view" onclick="openPopup(\'popup-' . $row['id'] . '\')">-View Recipe-</button>';
    echo '</div>';

    echo '<div class="popup" id="popup-' . $row['id'] . '">';
    echo '<span class="close" onclick="closePopup(\'popup-' . $row['id'] . '\')">&times;</span>';
    echo '<ul>';
    echo '<li>Ingredients:</li>';
    
    // Split ingredients string into an array
    $ingredients = explode("\n", $row['ingredients']);
    foreach ($ingredients as $ingredient) {
        echo '<li>' . trim($ingredient) . '</li>';
    }

    echo '<br>';
    echo '<li>Instructions:</li>';
    
    // Split instructions string into an array
    $instructions = explode("\n", $row['instructions']);
    foreach ($instructions as $instruction) {
        echo '<li>' . trim($instruction) . '</li>';
    }
    
    echo '</ul>';
    echo '</div>';
}

mysqli_close($conn);
?>


<script>function closePopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.style.display = 'none';
}
</script>

  
  <script src="js/popup.js"></script>


  
</body>
</html>