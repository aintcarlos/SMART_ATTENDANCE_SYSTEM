<?php 
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

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


<div class="main">

<h1>Attendance</h1>

<div class="activity">

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Present</th>
<th>Late</th>
<th>Absent</th>
</tr>

<?php 
while($row = mysqli_fetch_assoc($result)) {

echo "<tr>

<td>".$row['student_id']."</td>

<td>".$row['first_name']." ".$row['last_name']."</td>

<td>
<a class='present-btn' href='mark_attendance.php?id=".$row['student_id']."&status=Present'>Present</a>
</td>

<td>
<a class='late-btn' href='mark_attendance.php?id=".$row['student_id']."&status=Late'>Late</a>
</td>

<td>
<a class='absent-btn' href='mark_attendance.php?id=".$row['student_id']."&status=Absent'>Absent</a>
</td>

</tr>";

}
?>

</table>

</div>

</div>

</div>

</body>
</html>