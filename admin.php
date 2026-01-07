<?php
$conn = mysqli_connect("localhost", "root", "", "employee_task_db");
$result = mysqli_query($conn, "SELECT * FROM tasks");
?>

<h2>Admin Panel – All Tasks</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Employee</th>
    <th>Task</th>
    <th>Status</th>
    <th>Date</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['employee_name']; ?></td>
    <td><?php echo $row['task_title']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
</tr>
<?php } ?>
</table>
