<?php
/* sa dashboard page ng system na ito, makikita ng users ang overview ng attendance statistics at recent activity.
ginagamit nito ang data na nakuha galing sa database para ipakita yung total students,
present at absent counts para sa araw na ito, at recent attendance activity.
para mabilis makita ng user yung mga recent activity at attendance statistics. */
include "db.php";

$total_students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM students"))['total'];

$present_today = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM attendance WHERE status='Present'"))['total'];

$absent_today = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM attendance WHERE status='Absent'"))['total'];
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
         <!-- itong part na to is nag papakita ng sidebar navigation para sa dashboard, 
          kung saan maaring mag navigate ang users sa iba't ibang pages tulad ng Dashboard, Student, Attendance at Report. -->
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
          <!-- ito ay para sa main content ng dashboard page kung saan makikita ang overview ng attendance statistics at recent activity.
          ito ay nag re retrieve ng data mula sa database para ipakita ang total students, present at
           absent counts para sa araw na ito, at recent attendance activity. -->
        <div class="main">

            <h1>Dashboard</h1>
            <p class="welcome">Welcome back! Here's your attendance overview</p>

            <!-- CARDS -->
             <!-- ito ay para sa mga cards na nagpapakita ng summary ng attendance statistics tulad ng total students, present today at absent today.
               ito ay nag re retrieve ng data mula sa database gamit ang PHP at ipinapakita ito sa isang visually appealing format. -->
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
             <!-- ito ay para sa recent activity section ng dashboard page kung saan makikita ang mga recent attendance records kasama ang pangalan ng student, 
              status at time.ito ay nag re retrieve ng data mula sa database gamit ang PHP at ipinapakita 
              ito sa isang table format para makita ng users ang mga recent attendance activity. -->
            <div class="activity">

                <h3>Recent Activity</h3>

                <table>

                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>

                    <?php
                    /* this part is for retrieving recent attendance activity galing sa database pinag combine yung attendance at students tables
                        para makuha yung pangalan ng student kasama yung attendance status at time. in order by date descending at limit sa 5 most recent records. 
                        yung nakuha na data ay ipapakita sa table format sa dashboard para makita ng users yung mga recent attendance activity. */

                    $activity = mysqli_query($conn, "
                        SELECT students.first_name, students.last_name, attendance.status, attendance.date
                        FROM attendance
                        JOIN students ON attendance.student_id = students.student_id
                        ORDER BY attendance.date DESC
                        LIMIT 5
                    ");

                    while ($row = mysqli_fetch_assoc($activity)) {

                        echo "<tr>
                            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                            <td>" . $row['status'] . "</td>
                            <td>" . $row['date'] . "</td>
                        </tr>";

                    }

                    ?>

                </table>

            </div>

        </div>

    </div>

</body>
</html>