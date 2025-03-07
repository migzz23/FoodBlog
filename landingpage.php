<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--font-family-->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- title of site -->
  <title></title>

  <!--font-awesome.min.css-->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!--linear icon css-->
  <link rel="stylesheet" href="css/linearicons.css">

  <!--animate.css-->
  <link rel="stylesheet" href="css/animate.css">

  <!--flaticon.css-->
  <link rel="stylesheet" href="css/flaticon.css">

  <!--slick.css-->
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/slick-theme.css">

  <!--bootstrap.min.css-->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- bootsnav -->
  <link rel="stylesheet" href="css/bootsnav.css">

  <!--style.css-->
  <link rel="stylesheet" href="css/styless.css">

  <!--responsive.css-->
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/styles.css">


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
  .dropbtn img{
margin-left: 66rem; 
margin-top: -7.2rem; 
width: 28px; 
height: 28px;
}
.profile-container {
  text-align: center;
  margin-top: -60px;
}
.profile-container a .acc{
width: 40px;
height: 40px;
border-radius: 50%;
object-fit: cover;
margin-left: 1090px;
}
@media only screen and (max-width: 500px) {
  .profile-container a .acc{
      margin-left: 0; 
      margin-top: -4.8rem;
    }
    .dropdown .dropbtn img {
    margin-left: 23rem; /* Adjusted margin for smaller screens */
    margin-top: -7.2rem;
    width: 28px;
    height: 28px;
  }
}
@media only screen and (max-width: 768px){
  .dropbtn img {
  margin-left: 37.8rem;
  margin-top: -7.2rem;
}
.profile-container a .acc {
    margin-left: 13rem;
    margin-top:-4.8rem;
  }
  .vl{
  margin-left: 37rem;
  margin-top: -72px;
  }
}
@media only screen and (min-width: 768px) and (max-width: 1200px) {
  .dropbtn img {
    margin-left: 37.8rem;
    margin-top: -7.2rem;
  }

  .profile-container a .acc {
    margin-left: 13rem;
    margin-top: -4.8rem;
  }

  .vl {
    margin-left: 37rem;
    margin-top: -72px;
  }
}

</style>
</head>

<body>
  <div class="header" id="header">
    <nav>
      <a href="landingpage.php">
        <p>Cult's Kitchen</p>
        <img src="img/logo.jpg" alt="">
      </a>
      <div class="vl"></div>
    </nav>
    <div class="dropdown">
      <button class="dropbtn">
      <img src="img/menu.png">
      </button>
      <div class="dropdown-content">
                <a href="recipe.php"><img src="img/create.png">&nbsp;View&nbsp;Recipes</a>
                <a href="recent-act.php"><img src="img/book.png">&nbsp;Saved</a>
                <a href="setting.php"><img src="img/logout.png">&nbsp;Settings</a>
                <a href="login.php"><img src="img/logout.png">&nbsp;Logout</a>
      </div>
    </div>
    <div class="profile-container">
      <a href="account.php">
        <img class="acc" src="img/icons8-user-default-64.png" alt="Profile Picture">
      </a>
      <div class="vl"></div>
    </div>
  </div>
  <script>
    let prevScrollPos = window.pageYOffset;
    const header = document.getElementById('header');

    window.onscroll = function() {
      const currentScrollPos = window.pageYOffset;

      if (prevScrollPos > currentScrollPos) {
        header.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
      } else {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
      }

      prevScrollPos = currentScrollPos;
    };
  </script>


  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img1.jpg" style="width: 1900px; height:575px; margin-top: -80px; margin-left: 0px;">
    </div>

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img5.jpeg" style="width: 1900px;height:575px; margin-top: -80px; margin-left: 0px;">
    </div>

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img7.jpg" style="width: 1900px; height:575px; margin-top: -80px; margin-left: 0px;">
    </div>

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img8.jpg" style="width: 1900px; height:575px; margin-top: -80px; margin-left: 0px;">
    </div>

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="img/img6.jpg" style="width: 1900px; height:575px; margin-top: -80px; margin-left: 0px;">
    </div>
  </div>
  <br>

  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 3000);
    }
  </script>


  <div class="food-class">
    <div class="dessert">
      <img src="img/dessert.png" alt="">
      <p>Desserts</p>
    </div>
    <div class="grilled">
      <img src="img/grill.jpg" alt="">
      <p>Grilled</p>
    </div>
    <div class="crustacean">
      <img src="img/seafood.jpg" alt="">
      <p>Sea Food</p>
    </div>
    <div class="noodle">
      <img src="img/noodle.jfif" alt="">
      <p>Noodles</p>
    </div>
  </div>
  <section id="explore" class="explore">
    <div class="create-post">
      <button type="button" id="postbtn"><img src="img/icons8-user-default-64.png" alt=""></button>
      <input type="text" id="create-post" placeholder="Create a Post">
    </div>
    <div class="other-function" style="display: flex;">
    <a href="create.php"><img src="img/create-recipe.png" alt=""></a>
        <p>Create Recipe</p>
        <a href="landingpage.php"><img src="img/icons8-news-64.png" alt=""></a>
        <p>News Feed</p>
        <a href="recent-act.html"> <img src="img/recent-activity.png" alt=""></a>
        <p>Recent Activity</p>
    </div>
    </div>
    <hr>






    <!-- Your existing HTML content here -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="path/to/your/script.js"></script>

    <div class="container">
      <div class="section-header">
        <div class="explore-content">
          <div class="row">

            <?php
            include 'connection.php';

            $query = "SELECT recipe.*, users.fname, users.lname, COALESCE(AVG(ratings.rating), 0) AS average_rating, COUNT(ratings.rating) AS total_ratings
          FROM recipe
          JOIN users ON recipe.user_id = users.id
          LEFT JOIN ratings ON recipe.id = ratings.recipe_id
          GROUP BY recipe.id";
            $result = mysqli_query($conn, $query);



            while ($row = mysqli_fetch_assoc($result)) {

              //<!-- The Modal -->




              echo '<div class="col-md-4 col-sm-6">';
              echo '<div class="single-explore-item">';
              echo '<div class="single-explore-img">';
              // Output image using the get_image.php file
              echo '<img src="get_image.php?id=' . $row['id'] . '" alt="' . $row['title'] . '">';
              echo '<div class="single-explore-img-info">';
              echo '<button onclick="window.location.href=\'#\'">featured</button>';
              echo '<div class="single-explore-image-icon-box">';
              echo '<ul>';
              echo '<li>';
              echo '<div class="single-explore-image-icon">';
              echo '<img src="img/icons8-comment-32.png" alt="" style="height: 20px; width: 20px;">';
              echo '</div>';
              echo '</li>';
              echo '<li>';
              echo '<div class="single-explore-image-icon">';
              echo '<img src="img/icons8-book-mark-99.png" alt="" style="height: 20px; width: 20px;">';
              echo '</div>';
              echo '</li>';
              echo '</ul>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="single-explore-txt bg-theme-1" >';
              echo '<h2><a href="#">' . $row['title'] . '</a></h2>';
              echo '<p class="explore-rating-price">';
              echo '<span class="explore-rating">' . number_format($row['average_rating'], 1) . '</span>';
              echo '<a href="#">' . $row['total_ratings'] . '</a>';
              echo '<span class="explore-price-box">';
              echo '<img src="img/profile3.jpg" alt="" style="width: 25px; height: 25px; border-radius: 50px;">';
              echo '<span class="explore-price"></span>';
              echo '</span>';
              echo '<a href="#">' . $row['fname'] . ' ' . $row['lname'] . '</a>'; // Display the uploader's name
              echo '</p>';
              echo '<div class="explore-person">';
              echo '<div class="row">';
              echo '<div class="col-sm-2">';
              echo '<div class="explore-person-img">';
              echo '<a href="#">';
              echo '<img src="get_image.php?id=' . $row['id'] . '" alt="' . $row['title'] . '">';
              echo '</a>';
              echo '</div>';
              echo '</div>';
              echo '<div class="col-sm-10" >';
              echo '<p>' . $row['description'] . '</p>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="explore-open-close-part">';
              echo '<div class="row">';
              echo '<div class="col-sm-5">';
              echo '<button class="close-btn" onclick="window.location.href=\'recipe.php\'">View Recipe</button>';
              // Add modal button with the same ID as $row['id']
              echo '<button class="openModalBtn" data-recipe-id="' . $row['id'] . '" data-toggle="modal" data-target="#recipeModal_' . $row['id'] . '" style="z-index: 999;">Rate Recipe</button>';
              echo '</div>';
              echo '<div class="col-sm-7">';
              echo '<div class="explore-map-icon">';
              echo '<a href="#"><i data-feather="map-pin"></i></a>';
              echo '<a href="#"><i data-feather="upload"></i></a>';
              echo '<img id="heartIcon" src="img/icons8-heart-50.png" alt="" style="width: 15px; height: 15px;">';
              echo '</div>';
              echo '</div>';
              echo '</div>';

              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';

              // Add the modal structure with the same ID as $row['id']
              echo '<div class="modal fade" id="recipeModal_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="recipeModalLabel" aria-hidden="true">';
              echo '  <div class="modal-dialog" role="document">';
              echo '    <div class="modal-content" style="border-radius:15px;">';
              echo '      <div class="modal-header" style="background:#1F1E26;">';
              echo '        <h1 class="modal-title" id="recipeModalLabel" style="font-size: 30px; font-weight: bold; margin-left: 12rem; color:white;">' . $row['title'] . '</h1>';
              echo '        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">';
              echo '          <span aria-hidden="true">&times;</span>';
              echo '        </button>';
              echo '      </div>';
              echo '      <div class="modal-body" style="min-height: 300px;  background:#1F1E26; color:white;">'; // Adjust min-height as needed
              echo '        <p style="color:white; font-weight:bolder;">Rate the Recipe "' . $row['title'] . '"</p>';
              // ... rest of the modal content ...



              echo '<form class="ratingForm" id="ratingForm_' . $row['id'] . '" style="position: relative; left: 50%; transform: translateX(-50%); top: 2rem; text-align: center;">';
              echo '  <input type="hidden" class="recipeIdInput" name="recipe_id" value="' . $row['id'] . '">';
              echo '  <label for="rating" style="margin-right: 10px;">Select a rating:</label>';
              echo '  <select class="rating" name="rating" style="margin-right: 10px;">';
              echo '    <option value="1">1</option>';
              echo '    <option value="2">2</option>';
              echo '    <option value="3">3</option>';
              echo '    <option value="4">4</option>';
              echo '    <option value="5">5</option>';
              echo '  </select>';
              echo '  <button type="submit" name="submit" style="color:white; font-weight:bolder;text-decoration: underline;">Submit Rating</button>';
              echo '</form>';


              echo '        <div class="comment-form" style= " position: absolute; top: 8rem;">';
              echo '          <form class="commentForm" id="commentForm_' . $row['id'] . '">';
              echo '            <input type="hidden" class="recipeIdInput" name="recipe_id" value="' . $row['id'] . '">';
              echo '            <label for="comment" style= "position: relative; top: -2rem;" >Leave a Comment:</label>';
              echo '            <textarea class="comment" name="comment" rows="3" required></textarea>';
              echo '            <button type="submit" name="submit" style="color:white; font-weight:bolder;text-decoration: underline;">Submit Comment</button>';
              echo '          </form>';
              echo '        </div>';


              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            mysqli_close($conn);

            ?>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <!-- Include Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <!-- Your PHP-generated HTML code here -->

            <script>
              $(document).ready(function() {
                $(".openModalBtn").click(function() {
                  var recipeId = $(this).data("recipe-id");

                  // Show the modal using Bootstrap's modal method
                  $("#recipeModal_" + recipeId).modal("show");
                });

                // Handle form submission for each modal
                $(".ratingForm").submit(function(event) {
                  event.preventDefault();

                  var recipeId = $(this).find(".recipeIdInput").val();
                  var rating = $(this).find(".rating").val();

                  $.ajax({
                    type: "POST",
                    url: "rate_recipe.php",
                    data: {
                      recipe_id: recipeId,
                      rating: rating,
                      submit: true
                    },
                    success: function(response) {
                      alert(response); // You can customize this part based on your needs
                      $("#recipeModal_" + recipeId).modal("hide");
                      // Reload or update the recipe display to reflect the new rating
                      // (you might need to implement this part based on your current setup)
                    },
                    error: function(error) {
                      console.error("Error submitting rating: " + error);
                    }
                  });
                });
              });
            </script>
            <script>
              $(document).ready(function() {
                $(".openModalBtn").click(function() {
                  var recipeId = $(this).data("recipe-id");

                  // Show the modal using Bootstrap's modal method
                  $("#recipeModal_" + recipeId).modal("show");
                });

                // Handle form submission for comments
                $(".commentForm").submit(function(event) {
                  event.preventDefault();

                  var recipeId = $(this).find(".recipeIdInput").val();
                  var comment = $(this).find(".comment").val();

                  $.ajax({
                    type: "POST",
                    url: "comment_recipe.php", // Update the URL to the correct path
                    data: {
                      recipe_id: recipeId,
                      comment: comment,
                      submit: true
                    },
                    success: function(response) {
                      alert(response); // You can customize this part based on your needs
                      // Optionally, you can update the UI to reflect the new comment
                    },
                    error: function(error) {
                      console.error("Error submitting comment: " + error);
                    }
                  });
                });
              });
            </script>





          
        <script>
          const heartIcon = document.getElementById('heartIcon');

          heartIcon.addEventListener('click', function() {
            this.classList.toggle('clicked');
          });
        </script>
  </section>
</body>

</html>