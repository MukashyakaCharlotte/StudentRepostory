<?php
require 'db_connection.php';

// Initialize variables
$first_name = $second_name = $department = "";
$student_id = 0;
$editing = false;

// Check if editing
if (isset($_GET['edit'])) {
    $student_id = $_GET['edit'];
    $sql = "SELECT * FROM student WHERE id = $student_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $second_name = $row['second_name'];
        $department = $row['department'];
        $editing = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $editing ? 'Edit Student' : 'Add New Student'; ?></title>
</head>
<body>
    <h2><?php echo $editing ? 'Update Student' : 'Add New Student'; ?></h2>
    <form method="POST" action="<?php echo $editing ? 'update.php' : 'save.php'; ?>">
        <?php if ($editing): ?>
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <?php endif; ?>

        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>" required><br><br>

        <label>Second Name:</label>
        <input type="text" name="second_name" value="<?php echo $second_name; ?>" required><br><br>

        <label>Department:</label>
        <input type="text" name="department" value="<?php echo $department; ?>" required><br><br>

        <button type="submit"><?php echo $editing ? 'Update Student' : 'Save Student'; ?></button>
    </form>

    <br>
    <a href="display.php">Back to Student List</a>
</body>
</html>

<?php $conn->close(); ?>
