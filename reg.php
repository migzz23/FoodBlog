<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title></title>
  <style>
    body {
      margin: 50px;
      padding: 50px;
      background-image: url('img/pexels-ella-olsson-1640774.jpg');
      background-size: cover;
      background-position: right;
      background-repeat: no-repeat;
      height: 60vh;
      display: flex;
      align-items: left;
      justify-content: left;
    }

    .container {
  width: 80%; /* Adjusted width for responsiveness */
  max-width: 500px; /* Added max-width for responsiveness */
  height: auto; 
  min-height: 600px; /* Set a minimum height for the form */
  background: transparent;
  border: 2px solid #000;
  border-radius: 20px;
  backdrop-filter: blur(15px);
  margin-top: -6rem; /* Adjusted margin for responsiveness */
  margin-left: auto;
  margin-right: auto; /* Center the container */
}


h1 {
  color: black;
  text-align: center;
  margin-bottom: 20px;
}

.input-field {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  padding-left: 5%; /* Adjusted padding for responsiveness */
  color: black;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 90%; /* Adjusted width for responsiveness */
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 20px;
  margin-left: 15px;
  margin-right: auto; /* Center the input fields */
}

button {
  background-color: grey;
  width: 90%; /* Adjusted width for responsiveness */
  max-width: 300px; /* Added max-width for responsiveness */
  color: white;
  padding: 10px 15px;
  margin-left: 100px;
  margin-right: auto; /* Center the button */
  border: none;
  border-radius: 10px;
  cursor: pointer;
}

button:hover {
  background-color: black;
}

p {
  text-align: center;
}

a {
  color: blue;
  text-decoration: none;
}

a:hover {
  color: black;
}
@media only screen and (max-width: 500px) {
  .container {
    width: 100%; /* Adjusted width for responsiveness */
    max-width: 100%; /* Set max-width to 100% for small screens */
    height: auto; /* Adjusted height for responsiveness */
    min-height: 600px; /* Set a minimum height for the form */
    background: transparent;
    border: 2px solid #000;
    border-radius: 20px;
    backdrop-filter: blur(15px);
    margin-top: -2rem; /* Adjusted margin for responsiveness */
    margin-left: auto;
    margin-right: auto; /* Center the container */
    padding: 10px; /* Added padding for better spacing */
    box-sizing: border-box; /* Ensure padding is included in the width */
  }

  h1 {
    font-size: 20px; /* Adjusted font size for smaller screens */
    margin-bottom: 10px; /* Adjusted margin for smaller screens */
  }

  label {
    padding-left: 5%; /* Adjusted padding for responsiveness */
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 90%; /* Adjusted width for responsiveness */
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 20px;
    margin-bottom: 10px; /* Added margin for better spacing */
    display: block; /* Ensure input fields are displayed as blocks */
    box-sizing: border-box; /* Ensure padding is included in the width */
  }

  button {
    width: 90%; /* Adjusted width for responsiveness */
    max-width: 100%; /* Set max-width to 100% for small screens */
    margin-left: 15px;
    margin-right: auto; /* Center the button */
  }
}
@media only screen and (min-width: 769px) and (max-width: 1200px) {
  .container {
    width: 50%;
  }
}
  </style>
  <div class="container">
    <h1>Create your account</h1>
    <form action="#" method="post">
      <div class="input-field">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required>
      </div>
      <div class="input-field">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required>
      </div>
      <div class="input-field">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Continue</button>

      <?php
      include("connection.php");

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];


        // Insert user data into the 'users' table
        $sql = "INSERT INTO users (fname, lname, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
          echo"<script>
							Swal.fire({
								title: 'Registration Successful',
								text: ' ',
								icon: 'success'
							}).then(() => {
								setTimeout(() => {
									window.location.href = 'login.php';
								}, 1000);
							});
						</script>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the connection
        mysqli_close($conn);
      }
      ?>

    </form>
    <p>Already have an account? <a href="login.php">Sign In</a></p>
  </div>
  </body>

</html>