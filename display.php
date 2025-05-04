<?php
require 'db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <?php if (isset($_GET['message'])): ?>
        <p><strong><?php echo $_GET['message']; ?></strong></p>
    <?php endif; ?>

    <h2>Student List</h2>
    <a href="form.php">Add New Student</a>
    <br><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM student");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['first_name']."</td>
                <td>".$row['second_name']."</td>
                <td>".$row['department']."</td>
                <td>
                    <a href='form.php?edit=".$row['id']."'>Edit</a> | 
                    <a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are you sure?')\">Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
