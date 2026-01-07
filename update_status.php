<?php
$conn = mysqli_connect("localhost", "root", "", "employee_task_db");

$id = $_GET['id'];

mysqli_query($conn, "UPDATE tasks SET status='Completed' WHERE id=$id");

header("Location: dashboard.php");
exit();
