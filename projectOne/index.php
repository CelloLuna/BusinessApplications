<?php 

	$action = isset($_GET['action']) ? $_GET['action'] : "";

	if ($action == "Successful") {
		echo "<div class = 'alert alert-success'> Data Entry Successful </div>";

	} 

	if ($action == "Deleted") {
		echo "<div class = 'alert alert-danger'> Data Deleted Successfully </div>";
	}

	if ($action == "Updated") {
		echo "<div class = 'alert alert-success'> Data Updated Successfully </div>";
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
	<title>Home</title>
</head>
<body>
<div class="container">
	<h2></h2>
	<p><a href="create.php" class="btn btn-success">Add New Student</a></p>           
	<table class="table">
		<thead>
		  <tr>
		    <th>ID</th>
		    <th>Firstname</th>
		    <th>Lastname</th>
		    <th>Email</th>
		    <th>Action</th>
		  </tr>
		</thead>
		<tbody>  
			<?php 
				include "config/database.php";
				$query = "SELECT id, firstName, lastName, email FROM students ORDER BY id desc";
				$stmt = $con->prepare($query);
				$stmt->execute();
				$num = $stmt->rowcount();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
					echo "<tr>";
						echo "<td>$id</td>";
						echo "<td>$firstName</td>";
						echo "<td>$lastName</td>";
						echo "<td>$email</td>";
						echo "<td>";
							echo "<button type='button' class='btn btn-primary'>Read</button> ";
							echo "<a href='edit.php?id={$id}' type='button' class='btn btn-warning'>Edit</a> ";
							echo "<a href='#' onclick='delete_data({$id});' type='button' class='btn btn-danger'>Delete</a> ";
						echo "</td>";
					echo "</tr>";

				}

			?>

			<script type="text/javascript">
				
				function delete_data(id) {
					var answer = confirm("Are you sure you want to delete this student?")
					if (answer) {
						window.location = "delete.php?id=" + id;
					}
				}

			</script>

		</tbody>
	</table>
</div>
</body>
</html>