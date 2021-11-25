<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
$search = "";
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
	<script type="text/javascript" src="js/small_table.js"></script>
</head>

<body>
	<?php include 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline">
				  <div class="form-group mb-2">
				    <label for="searchii"> Search </label>
				    <input type="text" name="search" class="form-control ml-2" id="searchii" value="<?php echo $search; ?>">
				  </div>
				  <button type="submit" name="searchuu" hidden class="btn btn-primary mb-2"> Submit </button>
				  <a href="welcome.php" class="btn btn-info ml-2 mb-2" role="button"> ↻ </a>
				</form>
			</div>


			<table class="table table-bordered">
				<thead style="text-align: center">
					<tr>
						<th> No </th>
						<th> Name </th>
						<th> Login </th>
						<th> Company </th>
						<th> Number of Followers </th>
						<th> Number of Public Repositories </th>
						<th> Average </th>
					</tr>
				</thead>

				<tbody>
					<?php
						if (isset($_POST['searchuu'])) {
							$search = mysqli_real_escape_string($connection, $_POST['search']);
							$sql = mysqli_query($connection, "SELECT name, login, company, number_of_followers, number_of_public_repositories FROM username_list WHERE name LIKE '%$search%' ");
						} else {
							$sql = mysqli_query($connection, "SELECT name, login, company, number_of_followers, number_of_public_repositories FROM username_list");
						}

						$no = 0;


						while ($row = mysqli_fetch_assoc($sql)) {
							$no++;
							$name 													= mysqli_real_escape_string($connection, $row['name']);
							$login 													= mysqli_real_escape_string($connection, $row['login']);
							$company 												= mysqli_real_escape_string($connection, $row['company']);
							$number_of_followers 						= mysqli_real_escape_string($connection, $row['number_of_followers']);
							$number_of_public_repositories 	= mysqli_real_escape_string($connection, $row['number_of_public_repositories']);
							$average 												= ($number_of_followers / $number_of_public_repositories) * 1;

							echo "
								<tr>
									<td class='td_center'> $no </td>
									<td> $name </td>
									<td> $login </td>
									<td> $company </td>
									<td class='td_center'> $number_of_followers </td>
									<td class='td_center'> $number_of_public_repositories </td>
									<td class='td_center'> $average </td>
								</tr>
							";

						}
					?>

				</tbody>
			</table>

		</div>

	</div>

	<?php include ('footer.php'); ?>

	<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i> </a>

    <?php
		include ('logout_modal.php');
		include ('important_files.php');
	?>

</body>

</html>
