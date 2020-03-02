<?php
include('database.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>PracticalExam</title>

<body>
	<h1>Create New Data</h1>
	<form action="" method="POST">
		<input name="name" type="text" placeholder="Name" autocomplete="off" required /><br><br>
		<input name="email" type="text" placeholder="Email" autocomplete="off" required /><br><br>
		<button name="create" type="submit">Create</button>
	</form>
	<br>
	<a href="index.php"><button type="submit" name="back">Back</button></a>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$name = $_POST['name'];
	$email = $_POST['email'];

	$sql = "INSERT INTO tb_test (name, email) VALUES ('$name', '$email');";

	if ($connection->query($sql)) {
		header('location: index.php');
	} else {
		echo "FAILED";
	}
}

?>