<?php 

	

	include "config/database.php";

	try {
		
		$id = isset($_GET['id']) ? $_GET['id'] : die("ERROR : id not found");
		
		//delete query

		$query = "DELETE FROM students WHERE id=?";
		$stmt = $con->prepare($query);
		$stmt->bindParam(1,$id);

		if($stmt->execute()) {
			header("Location: index.php?action=Deleted");
		}

	} catch (PDOException $e) {
		die("ERROR :".$e->getMessage());
	}
?>