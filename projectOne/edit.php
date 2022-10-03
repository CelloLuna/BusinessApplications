<?php 

	include 'config/database.php';
	$id = isset($_GET['id']) ? $_GET['id'] : die("Id not found");


	try {
		$query = "SELECT * FROM students WHERE id = ? LIMIT 0,1";
		$stmt = $con->prepare($query);
		$stmt->bindParam(1,$id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$fname=$row['firstName'];
		$lname=$row['lastName'];
		$email=$row['email'];

	} catch (PDOException $e) {
		echo "Error:".$e.getMessage();
	} 

	$fNameError = "";
	$lNameError = "";
	$hasError = "";
	
	if ($_POST) {
		$fName = $_POST['First_Name'];
		$lName = $_POST['Last_Name'];
		if (empty($fName)) {
			$fNameError = "First name is Required";
			$hasError = true;
		}
		if (empty($lName)) {
			$lNameError = "Last name is Required";
			$hasError = true;
		}

		if (!$hasError) {
			$query = "UPDATE students SET firstName=?, lastName=? WHERE id=?";
			$stmt = $con->prepare($query);
			$stmt->bindParam(1,$fName);
			$stmt->bindParam(2,$lName);
			$stmt->bindParam(3,$id);

			if($stmt->execute()) {
				header("Location: index.php?action=Updated");
			}
		}
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
	<title></title>
	<style type="text/css">
		
		.Error {
			color: red;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Edit Student Record</h1>
		</div>
		<form action="edit.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
			<table class="table">
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" class="form-control" name="First_Name" value="<?php echo $fname; ?>">
						<samp class="Error"><?php echo $fNameError ?></samp>
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" class="form-control" name="Last_Name" value="<?php echo $lname; ?>">
						<samp class="Error"><?php echo $lNameError ?></samp>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-success" value="Update Record"/> <a href="index.php" class="btn btn-danger">Cancel</a></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>