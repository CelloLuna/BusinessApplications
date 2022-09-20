<?php 
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
</head>
<body>
<div class="container">           
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
						echo "<button type='button' class='btn btn-primary'>Read</button>";
						echo "<button type='button' class='btn btn-warning'>Edit</button>";
						echo "<button type='button' class='btn btn-danger'>Delete</button>";
					echo "</td>";
				echo "</tr>";

			}

    	?>
    </tbody>
  </table>
</div>
</body>
</html>