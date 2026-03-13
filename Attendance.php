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
<!-- itong part na to is nag papakita ng attendance page kung saan maaring markahan ng mga teachers ang mga students
 if PRESENT LATE OR ABSENT tyka sa part na to is kinukuha yung database ng mga students  -->
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
        <!-- MAIN CONTENT -->
         <!-- ito ay para sa main content ng attendance page kung saan makikita ang listahan ng mga students 
          at may mga buttons para markahan kung present late or absent sila. -->
          

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
                    /* this part is para sa pagkuha ng mga students sa database at pag display ng mga ito sa table format.
                     gumagamit ito ng while loop para ma iterate yung result set at ma output yung bawat student id, 
                     first name, last name at course sa table row.
                     ito ay para makita ng mga users yung listahan ng mga students na naka register sa system. */
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>" . $row['student_id'] . "</td>
                            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                            <td>
                                <a class='present-btn' href='mark_attendance.php?id=" . $row['student_id'] . "&status=Present'>Present</a>
                            </td>
                            <td>
                                <a class='late-btn' href='mark_attendance.php?id=" . $row['student_id'] . "&status=Late'>Late</a>
                            </td>
                            <td>
                                <a class='absent-btn' href='mark_attendance.php?id=" . $row['student_id'] . "&status=Absent'>Absent</a>
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