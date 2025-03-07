<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
</head>
<body style="background-image: url(img/pexels-ella-olsson-1640774.jpg);">
    
    <div id="post-form">
      <h2>Post a Recipe</h2>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Upload</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="ingredients">Ingredients:</label>
        <textarea name="ingredients" id="ingredients" rows="4" required></textarea>
        
        <label for="instructions">Instructions:</label>
        <textarea name="instructions" id="instructions" rows="6" required></textarea>
        
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        
        <input href="account.php" type="submit" name="submit" value="Upload">
    </form>
</body> 
</html>

  </div>
  
  
</body>
</html>