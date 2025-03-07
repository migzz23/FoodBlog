<?php

include 'connection.php';

// Start or resume the session
session_start();

if (isset($_POST['submit'])) {
    // Get form data
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // Get user_id from the session
        $user_id = $_SESSION['user_id'];

        // Get file details
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        // Check if the file is uploaded without errors
        if ($fileError === 0) {
            $uploadPath = 'uploads/' . $fileName;

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Modified query to join the 'users' table
                $sql = "INSERT INTO recipe (title, ingredients, instructions, image_filename, image_filepath, user_id) 
                        VALUES (?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $title, $ingredients, $instructions, $fileName, $uploadPath, $user_id);

                if ($stmt->execute()) {
                    
                    echo"<script>
							Swal.fire({
								title: 'Upload Successful',
								text: ' ',
								icon: 'success'
							}).then(() => {
								setTimeout(() => {
									window.location.href = 'login.php';
								}, 1000);
							});
						</script>";
                    // Fetch the uploader's name after the successful upload
                    $uploaderNameQuery = "SELECT fname, lname FROM users WHERE id = ?";
                    $uploaderStmt = $conn->prepare($uploaderNameQuery);
                    $uploaderStmt->bind_param("i", $user_id);
                    $uploaderStmt->execute();
                    $uploaderStmt->bind_result($fname, $lname);
                    $uploaderStmt->fetch();
                    $uploaderStmt->close();

                    // Display the uploader's name
                    
                } else {
                    echo "Error inserting data into the database: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error moving the uploaded file to the destination folder.";
            }
        } else {
            echo "Error uploading the file. File error code: " . $fileError;
        }
    } else {
        echo "User not logged in.";
    }

    // Close database connection
    $conn->close();
}
?>
