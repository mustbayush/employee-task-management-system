<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "employee_task_db");

if (!$conn) {
    die("Database connection failed");
}

$employee_name = $_SESSION['employee_name'];
$task_title = $_POST['task_title'];

$sql = "INSERT INTO tasks (employee_name, task_title, task_description, status)
        VALUES ('$employee_name', '$task_title', '', 'Pending')";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Task Added Successfully!</h2>";
    echo "Employee: " . $employee_name . "<br>";
    echo "Task: " . $task_title . "<br>";
    echo "<a href='dashboard.php'>Go Back</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
