<?php
include('database.php');

if (empty($_GET['name'])) {
    header('location: index.php');
} else {
    $name = $_GET['name'];
    $email = $_GET['email'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>PracticalExam</title>

<body>
    <h1>Update Data</h1>
    <form action="" method="POST">
        <input name="name" value="<?php echo $name; ?>" type="text" placeholder="Name" autocomplete="off" required /><br><br>
        <input name="email" value="<?php echo $email; ?>" type="text" placeholder="Email" autocomplete="off" required /><br><br>
        <button name="update" type="submit">Update</button>
    </form>
    <br>
    <a href="index.php"><button type="submit" name="back">Back</button></a>
</body>

</html>
<?php
if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE tb_test SET name='$name', email='$email' WHERE id = '$id';";
    $result = $connection->query($query);

    if ($result) {
        header('location: index.php');
    } else {
        echo "ERROR";
    }
}


?>