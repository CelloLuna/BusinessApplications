<?php 

$fNameError = "";
$lNameError = "";
$genderError = "";
$ageError = "";
$addressError = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	if (empty($_POST['fName'])) {

		$fNameError = "First Name is Required";

	} else {

		$fName = sanitize_input($_POST['fName']);
	}

	if (empty($_POST['lName'])) {

		$lNameError = "Last Name is Required";

	} else {

		$lName = sanitize_input($_POST['lName']);
	}

	if (empty($_POST['gender'])) {

		$genderError = "Gender is Required";

	} else {

		$gender = sanitize_input($_POST['gender']);
	}
	if (empty($_POST['age'])) {

		$ageError = "Age is Required";

	} else {

		$age = sanitize_input($_POST['age']);
	}

	if (empty($_POST['address'])) {

		$addressError = "Address is Required";

	} else {

		$address = sanitize_input($_POST['address']);
	}

	if ($fNameError == "" && $lNameError == "" && $genderError == "" && $ageError == "" && $addressError == "") {
		include "config/database.php";
		$query = "INSERT INTO students SET firstName=?, lastName=?, gender=?, age=?, address=?";
		$stmt = $con->prepare($query);
		$stmt->bindParam(1, $fName);
		$stmt->bindParam(2, $lName);
		$stmt->bindParam(3, $gender);
		$stmt->bindParam(4, $age);
		$stmt->bindParam(5, $address);

		if ($stmt->execute()) {
			header ("Location: index.php?action=success");
		}
	}
}


function sanitize_input ($data) {
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return($data);
		}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  	<script src="https://kit.fontawesome.com/79a9324960.js" crossorigin="anonymous"></script>
	<title>Home</title>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Add New Student</h1>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<table class="table table-hover table-responsive">
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" name="fName" class="form-control" pattern="[a-zA-Z\s]+" title="Must only contain text">
						<span class="Error"><?php echo $fNameError; ?> </span>
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" name="lName" class="form-control" pattern="[a-zA-Z\s]+" title="Must only contain text">
						<span class="Error"><?php echo $lNameError; ?> </span>
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="text" name="gender" class="form-control" pattern="[a-zA-Z\s]+" title="Must only contain text">
						<span class="Error"><?php echo $genderError; ?> </span>
					</td>
				</tr>
				<tr>
					<td>Age</td>
					<td>
						<input type="text" name="age" class="form-control" pattern="\[0-9]\"title="Must only contain numbers">
						<span class="Error"><?php echo $ageError; ?> </span>
					</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>
						<input type="text" name="address" class="form-control" pattern="[a-zA-Z\s]+" title="Must only contain text">
						<span class="Error"><?php echo $addressError; ?> </span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" class="btn btn-primary"></input></td>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>