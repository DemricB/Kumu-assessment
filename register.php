<?php
session_start();
include ('config.php');

$name = $username = $password = $password_hash = $company = $number_of_followers = $number_of_public_repositories = "";

if (isset($_POST['register'])) {

		$name 							= mysqli_real_escape_string($connection, $_POST["full_name"]);
		$username 						= mysqli_real_escape_string($connection, $_POST["username"]);
		$password 						= mysqli_real_escape_string($connection, $_POST["password"]);
		$password_hash 					= hash('sha256', $password);
		$company 						= mysqli_real_escape_string($connection, $_POST["company"]);
		$number_of_followers 			= mysqli_real_escape_string($connection, $_POST["number_of_followers"]);
		$number_of_public_repositories 	= mysqli_real_escape_string($connection, $_POST["number_of_followers"]);

		// Prepare an insert statement
		$sql = "INSERT INTO username_list(name, login, password, company, number_of_followers, number_of_public_repositories)

				VALUES

				(?, ?, ?, ?, ?, ?)
				";

		if($stmt = mysqli_prepare($connection, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "ssssss", $name2, $login2, $password2, $company2, $number_of_followers2, $number_of_public_repositories2);

			$name2 							= $name;
			$login2 						= $username;
			$password2 						= $password_hash;
			$company2 						= $company;
			$number_of_followers2 			= $number_of_followers;
			$number_of_public_repositories2 = $number_of_public_repositories;

			mysqli_stmt_execute($stmt);
			echo '<script>
			alert("Data Submitted!");
			window.location.href="index.php";
			</script>';

		} else {
			echo '<script>
			alert("Error, please contact your developer.");
			window.location.href="index.php";
			</script>';
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
	<link href="css/floating-labels.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<script type="text/javascript" src="js/small_table.js"></script>
	<style>

	</style>
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
                                        <h1 class="h4 text-gray-900 mb-4"> Kumu Registration </h1>
                                    </div>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="form-label-group">
											<input type="text" id="fname" class="form-control" name="full_name" placeholder="Full Name" required autofocus>
											<label for="fname"> Full Name </label>
										</div>

										<div class="form-label-group">
											<input type="text" id="uname" class="form-control" name="username" placeholder="Username" required autofocus>
											<label for="uname"> Username </label>
										</div>

                                        <div class="form-label-group">
											<input type="password" id="pword" class="form-control" name="password" placeholder="Password" required autofocus>
											<label for="pword"> Password </label>
										</div>

										<div class="form-label-group">
											<input type="text" id="input_company" class="form-control" name="company" placeholder="Company" required autofocus>
											<label for="input_company"> Company </label>
										</div>

										<div class="form-label-group">
											<input type="number" id="followers" class="form-control" name="number_of_followers" placeholder="No. of Followers" required autofocus>
											<label for="followers"> No. of Followers </label>
										</div>

										<div class="form-label-group">
											<input type="text" id="repositories" class="form-control" name="number_of_public_repositories" placeholder="No. of Public Repositories" required autofocus>
											<label for="repositories"> No. of Public Repositories </label>
										</div>

                                        <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                            Submit
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
