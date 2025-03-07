<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Get form data
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];



    
        // User hasn't rated yet, insert the new rating
        $insertQuery = "INSERT INTO ratings (recipe_id, user_id, rating) VALUES ($recipe_id, $user_id, $rating)";
        
        if (mysqli_query($conn, $insertQuery)) {
            echo 'Rating submitted successfully.';
        } else {
            echo 'Error inserting rating: ' . mysqli_error($conn);
        }
    
}

mysqli_close($conn);
?>
