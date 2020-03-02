<?php
include('database.php');

if (empty($_GET['id'])) {
	header('location: index.php');
} else {
	$id = $_GET['id'];
}

$sql = "DELETE FROM tb_test WHERE id = '$id';";
$result = $connection->query($sql);

if ($result) {
	header('location: index.php');
} else {
	echo "ERROR";;
}
