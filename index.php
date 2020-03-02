<?php
include('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>PracticalExam</title>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<h1>Practical Exam</h1>
	<form action="search.php" method="GET">
		<label>Search:</label>
		<input type="search" name="search" autocomplete="off">
		<input type="submit">
	</form><br>
	<table cellpadding="10">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php
		$sql = "SELECT * FROM tb_test";
		$result = $connection->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo  "<td>" . $row['id'] . "</td>";
			echo  "<td>" . $row['name'] . "</td>";
			echo  "<td>" . $row['email'] . "</td>";
			echo  "<td><a href='update.php?id=" . $row['id'] . "&name=" . $row['name'] . "&email=" . $row['email'] . "'>Edit</a></td>";
			echo  "<td><a href='#' onclick='delete_user({$row['id']})'>Delete</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<br>
	<a href="create.php"><button type="submit" name="create">Add Person</button></a>
	<br>
	<script>
		function delete_user(id) {
			var answer = confirm('Are you sure you want to delete ID: ' + id + '?');
			if (answer)
				// if user clicked ok, 
				// pass the id to delete.php and execute the delete query
				window.location = 'delete.php?id=' + id;
		}
	</script>

</body>
</html>