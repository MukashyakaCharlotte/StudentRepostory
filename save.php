<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $department = $_POST['department'];

    $sql = "INSERT INTO student (first_name, second_name, department) 
            VALUES ('$first_name', '$second_name', '$department')";

    if ($conn->query($sql) === TRUE) {
        header("Location: display.php?message=Student+saved+successfully");
    } else {
        header("Location: display.php?message=Error+saving+student");
    }
}
$conn->close();
?>
