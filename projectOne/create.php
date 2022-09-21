<?php 
$fNameError = "";
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if (empty($_POST['First_Name'])) {

			$fNameError = "First Name is Required";

		} elseif ($_POST['First_Name']) {

			$_fName = $_POST['First_Name'];

			if (!preg_match("/^[a-zA-Z']*$/", $fName)) {

				$fNameError = "Only letters and white spaces are allowed";

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
  	<style type="text/css">
  		
  		.Error {
  			color: red;
  		}

  	</style>
	<title>Create</title>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1> Create New Student Record</h1>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<table class="table table-hover table-responsive">
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" name="First_Name" class="form-control" pattern="[a-zA-Z\s]+" title="Name Must Only Conatin Letters">
						<span class="Error"> <?php echo $fNameError; ?> </span>
					</td>
					<td>Last Name</td>
					<td><input type="text" name="lName"></td>
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html> 