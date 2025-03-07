<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you are passing the edited details via POST

    // Retrieve the data from the POST request
    $recipeId = $_POST['recipe_id'];
    $editedTitle = $_POST['edited_title'];
    $editedDescription = $_POST['edited_description'];
    $editedIngredients = $_POST['edited_ingredients'];
    $editedInstructions = $_POST['edited_instructions'];

    // Update the recipe details in the database
    $updateQuery = "UPDATE recipe 
                    SET title = '$editedTitle', 
                        description = '$editedDescription', 
                        ingredients = '$editedIngredients', 
                        instructions = '$editedInstructions' 
                    WHERE id = $recipeId";

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Recipe details updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating recipe details.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

mysqli_close($conn);
?>

