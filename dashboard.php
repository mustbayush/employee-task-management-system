<?php
session_start();

if (!isset($_SESSION['employee_name'])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "employee_task_db");
$employee_name = $_SESSION['employee_name'];

$result = mysqli_query($conn, "SELECT * FROM tasks WHERE employee_name='$employee_name'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($employee_name); ?></h2>

    <form action="add_task.php" method="POST">
        <input type="text" name="task_title" placeholder="Task Title" required>
        <button type="submit">Add Task</button>
    </form>

    <hr>

    <h3>Your Tasks</h3>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <p>
            <b><?php echo $row['task_title']; ?></b>
            — Status: <?php echo $row['status']; ?>

            <?php if ($row['status'] == 'Pending') { ?>
                <a href="update_status.php?id=<?php echo $row['id']; ?>">
                    ✅ Mark Completed
                </a>
            <?php } ?>
        </p>
    <?php } ?>
</div>

</body>
</html>
