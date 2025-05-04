<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $department = $_POST['department'];

    $sql = "UPDATE student SET first_name='$first_name', second_name='$second_name', department='$department' 
            WHERE id=$student_id";

    if ($conn->query($sql) === TRUE) {
        echo"  updated  successfull";
    } else {
       echo"Updated fail";
    }
}
$conn->close();
?>
