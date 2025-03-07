<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		body {
			background: url('img/pexels-ella-olsson-1640774.jpg') no-repeat;
		}
	</style>
</head>

<body>
	<p id="notif"></p>
	<section>
		<div class="login-box">
			<form action="#" method="post">
				<h2>Login</h2>
				<div class="input-box">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<input id="username" type="text" name="username" required>
					<label>Username</label>
				</div>

				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input id="password" type="password" name="password" required>
					<label>Password</label>
				</div>

				<button type="submit">Login</button>
				
				<?php
				session_start();
				include("connection.php");
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username = $_POST["username"];
					$password = $_POST["password"];

					// Retrieve password from the 'users' table
					$sql = "SELECT id, email, password FROM users WHERE email = '$username'";
					$result = mysqli_query($conn, $sql);

					if ($result && mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);

						// Verify password (plaintext)
						if ($password == $row["password"]) {

							$_SESSION['user_id'] = $row['id'];

							// Redirect to landingpage.php using JavaScript
							echo"<script>
							Swal.fire({
								title: 'Login Successful',
								text: ' ',
								icon: 'success'
							}).then(() => {
								setTimeout(() => {
									window.location.href = 'landingpage.php';
								}, 1000);
							});
						</script>";
	
							exit();
						} else {

							echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Incorrect Password!',
                        text: 'Please try again.'
                    }).then(() => {
                        window.location.href = 'login.php';
                    });
                  </script>";
							exit();
						}
					} else {
						// SweetAlert for user not found
						echo json_encode(array("status" => "error", "message" => "User not found!"));
					}
				}

				// Close the connection
				mysqli_close($conn);
				?>

			</form>
		</div>
	</section>
	<!-- Include SweetAlert library -->


	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>