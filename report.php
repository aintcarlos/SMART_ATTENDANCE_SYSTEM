<?php
include "db.php";

/* COUNT ATTENDANCE */
/* same sa other lines ng code sa dashboard.php pero ito ay para sa pag count ng total present, late at absent attendance records galing sa database.
ginagamit ito para ma generate yung attendance reports na ipapakita sa report page. */

$present = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance WHERE status='Present'"))['total'];

$late = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance WHERE status='Late'"))['total'];

$absent = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance WHERE status='Absent'"))['total'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <h1>Attendance Reports</h1>
            <div class="report-container">

<div class="report-card">
<h3>Overall Attendance</h3>
<canvas id="pieChart"></canvas>
</div>

<div class="report-card">
<h3>Weekly Attendance Trends</h3>
<canvas id="barChart"></canvas>
</div>
            </div>
        </div>
    </div>


<script>

/* PIE CHART */
/* itong codes is para sa pag generate ng pie chart gamit ang Chart.js library para ma visualize yung overall attendance distribution.
ginagamit nito yung counts ng Present, Late, at Absent attendance records na nakuha galing sa database para mapunan yung chart data.
yung chart ay ipapakita sa report page para mag provide ng visual representation ng attendance statistics. */

var pie = document.getElementById('pieChart');

new Chart(pie, {
type: 'pie',
data: {
labels: ['Present','Late','Absent'],
datasets: [{
data: [<?php echo $present ?>, <?php echo $late ?>, <?php echo $absent ?>],
backgroundColor: [
'#27ae60',
'#f1c40f',
'#e74c3c'
]
}]
}
});


/* BAR CHART */

/* itong codes is same lang din sa pie chart pero ito ay para sa bar chart na nagpapakita ng weekly attendance trends.
kinukuha nito yung weekly coung ng laging present, late at absent galing sa database para mapunan yung chart data. and visualize repesentation. */

var bar = document.getElementById('barChart');

new Chart(bar, {
type: 'bar',
data: {
labels: ['Present','Late','Absent'],
datasets: [{
label: 'Attendance Count',
data: [<?php echo $present ?>, <?php echo $late ?>, <?php echo $absent ?>],
backgroundColor: [
'#27ae60',
'#f1c40f',
'#e74c3c'
]
}]
}
});

</script>

</body>
</html>