<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Get form data
    $recipe_id = $_POST['recipe_id'];
    $comment = $_POST['comment'];

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Insert the new comment using prepared statement
        $insertQuery = "INSERT INTO comments (recipe_id, user_id, comment) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, 'iis', $recipe_id, $user_id, $comment);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Comment submitted successfully.';
        } else {
            echo 'Error inserting comment: ' . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'User not logged in.';
    }
}

mysqli_close($conn);
?>


