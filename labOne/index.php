<?php 

	$action = isset($_GET['action']) ? $_GET['action'] : "";

	if ($action == "success") {
		echo "<div class = 'alert alert-success'>Data Entered Successfully</div>";
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
			<h1 class="text-center">Web Publishing - Lab 01</h1>
		</div>
		 <div>
			<a href="create.php" class="btn btn-success m-1">Add New Student</a>

			<div class="md-form mt-0 float-right">
			  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
			</div>

		</div>

		<table class="table table-hover">
			<thead class="table table-dark">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 

					include "config/database.php";
					$query = "SELECT id, firstName, lastName, gender, age, address FROM students ORDER BY id desc";
					$stmt = $con->prepare($query);
					$stmt -> execute();
					$num = $stmt->rowCount();

					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

						extract($row);
						echo "<tr>";
							echo "<td>$firstName</td>";
							echo "<td>$lastName</td>";
							echo "<td>$gender</td>";
							echo "<td>$age</td>";
							echo "<td>$address</td>";
							echo "<td>";
								echo "<a href='create.php' class='btn btn-warning'>Edit</a> ";
								echo "<a href='create.php' class='btn btn-danger'>Delete</a> ";
							echo "</td>";
						echo "</tr>";
					}
				 ?>
			</tbody>
		</table>

	</div>

</body>
</html>