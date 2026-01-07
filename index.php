<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['employee_name'] = $_POST['employee_name'];
    header("Location: dashboard.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Employee Login</h2>
    <form method="POST">
        <input type="text" name="employee_name" placeholder="Employee Name" required>
        <button type="submit">Login</button>
    </form>
</div>
