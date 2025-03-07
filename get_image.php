<?php
// Include database connection file
include 'connection.php';

// Get the recipe ID from the URL
$recipeId = isset($_GET['id']) ? $_GET['id'] : 5; // Default to 1 if not provided

// Fetch image data from the database
$query = "SELECT image_filename FROM recipe WHERE id = $recipeId";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    // File path relative to the 'uploads' directory
    $filePath = 'uploads/' . $row['image_filename'];

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set appropriate content type based on your image type
        $imageType = mime_content_type($filePath);
        header("Content-Type: $imageType");

        // Output the image file
        readfile($filePath);
    } else {
        // Output a default image or an error image
       // Output a default image or an error image
header('Content-Type: image/png'); // Change content type based on your image type

// Provide the correct path to a default or error image relative to the 'get_image.php' script
readfile('uploads/default_image.png'); // Adjust the path accordingly

    }
}

// Close database connection
mysqli_close($conn);
?>
