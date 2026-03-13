<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
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
            <h1>Students</h1>
            <div class="activity">
                <table>
                    <tr>
                        <th>School ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Course</th>
                    </tr>
                    <?php
                    /* this part is para sa pagkuha ng mga students sa database at pag display ng mga ito sa table format.
                     gumagamit ito ng while loop para ma iterate yung result set at ma output yung bawat student id, 
                     first name, last name at course sa table row. ito ay para makita ng mga users yung listahan ng mga students na naka register sa system. */
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>" . $row['student_id'] . "</td>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['course'] . "</td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>