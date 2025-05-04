<?php
require 'db_connection.php';

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "DELETE FROM student WHERE id=$student_id";

    if ($conn->query($sql) === TRUE) {
       echo" This student is deleted in Database";
    } else {
        echo "your data is still in the system";
    }
}
$conn->close();
?>
