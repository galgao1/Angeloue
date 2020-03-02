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

<body>
    <?php
    if (empty($_GET['search'])) {
        header('location: index.php');
    } else {
        $search = $_GET['search'];
    }

    $query = "select * from tb_test where '$search' in (tb_test.id,tb_test.name,tb_test.email);";
    $result = $connection->query($query);
    $count = $result->num_rows;
    if ($count > 0) {
        echo "<h1>Search</h1>";
        echo "<h3>" . $count . " Result(s) Found!</h3>";
        echo "<a href='index.php'>Back</a>";
        echo "<div>";
        echo "<table class='table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Update</th><th>Delete</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo  "<td><a href='update.php?id=" . $row['id'] . "&name=" . $row['name'] . "&email=" . $row['email'] . "'>Edit</a></td>";
            echo  "<td><a href='#' onclick='delete_user({$row['id']})'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<h1>Search</h1>";
        echo "<h3>No Result(s) Found!</h3>";
        echo "<a href='index.php'>Back</a>";
    }

    ?>
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