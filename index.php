<?php
session_start();

include ('config.php');

if (isset($_POST['submit'])) {
	if(empty($_POST["username"]) || empty($_POST["password"])) {
		echo '<script>
				alert("Both Fields are required")
				window.location.href="index.php";
				</script>';
	} else {

		$password2 = "";
		$username = mysqli_real_escape_string($connection, $_POST["username"]);
		$password = mysqli_real_escape_string($connection, $_POST["password"]);
		$password_hash = hash('sha256', $password);

		// Prepare an insert statement
		$sql = "SELECT login, password FROM username_list WHERE login='?' ANd password='?'";

		if($stmt = mysqli_prepare($connection, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "ssss", $username2, $password_hash2);


			while ($row = mysqli_fetch_assoc($sql)) {
				echo $password2 = $row['password'];
			}

			if (($password_hash2 == $password2)) {
				$username2 = $username;
				$password2 = $password;
				// $username3 = $username;
				// $password_hash3 = $password_hash;
				$_SESSION["username"] = $username2;

				mysqli_stmt_execute($stmt);
				echo '<script>
				alert("Successful");
				window.location.href="welcome.php";
				</script>';

			} else {
				echo '<script>
				alert("Either username or password is incorrect.");
				</script>';
			}




		} else{
			echo '<script>
			alert("Error");
			window.location.href="index.php";
			</script>';
		}
	}


	// Close statement
	mysqli_stmt_close($stmt);

	// Close connection
	mysqli_close($connection);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php include ('icon.php'); ?>
	<title> Kumu Assessment </title>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="css/small_table.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/floating-labels.css" rel="stylesheet">
	<script type="text/javascript" src="js/small_table.js"></script>
</head>

<body class="background_colour">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block backgroundy">
															<center>
																<img src="images/kumu.png" alt="Kumu" width="80%" height="80%">
														</div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Kumu </h1>
                                    </div>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" aria-describedby="emailHelp"
											name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
										<div class="form-group">
                                            <a href="register.php"> Register an Account </a>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
