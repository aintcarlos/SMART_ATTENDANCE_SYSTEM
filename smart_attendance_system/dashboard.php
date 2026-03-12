<?php
include "db.php";

$total_students = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM students"))['total'];

$present_today = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance WHERE status='Present'"))['total'];

$absent_today = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance WHERE status='Absent'"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

<!-- SIDEBAR -->
<div class="sidebar">

<h2 class="logo">Smart Attendance</h2>

<ul>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="students.php">Student</a></li>
<li><a href="attendance.php">Attendance</a></li>
<li><a href="report.php">Report</a></li>
</ul>

<div class="logout">
<a href="logout.php">Logout</a>
</div>

</div>


<!-- MAIN CONTENT -->
<div class="main">

<h1>Dashboard</h1>
<p class="welcome">Welcome back! Here's your attendance overview</p>


<!-- CARDS -->
<div class="cards">

<div class="card">
<h3>Total Students</h3>
<p><?php echo $total_students; ?></p>
</div>

<div class="card">
<h3>Present Today</h3>
<p><?php echo $present_today; ?></p>
</div>

<div class="card">
<h3>Absent Today</h3>
<p><?php echo $absent_today; ?></p>
</div>

</div>


<!-- ACTIVITY -->
<div class="activity">

<h3>Recent Activity</h3>

<table>

<tr>
<th>Name</th>
<th>Status</th>
<th>Time</th>
</tr>

<?php

$activity = mysqli_query($conn,"
SELECT students.first_name, students.last_name, attendance.status, attendance.date
FROM attendance
JOIN students ON attendance.student_id = students.student_id
ORDER BY attendance.date DESC
LIMIT 5
");

while($row = mysqli_fetch_assoc($activity)){

echo "<tr>

<td>".$row['first_name']." ".$row['last_name']."</td>

<td>".$row['status']."</td>

<td>".$row['date']."</td>

</tr>";

}

?>

</table>

</div>

</div>

</div>

</body>
</html>