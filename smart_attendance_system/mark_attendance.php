<?php 
include "db.php";

date_default_timezone_set("Asia/Manila");

$student_id = $_GET['id'];
$status = $_GET['status'];

$date = date("Y-m-d H:i:s");

/* CHECK IF ALREADY MARKED TODAY */

$check = mysqli_query($conn,
"SELECT * FROM attendance 
WHERE student_id='$student_id' 
AND DATE(date)=CURDATE()");

if(mysqli_num_rows($check) > 0){

header("Location: attendance.php");

}else{

$sql = "INSERT INTO attendance (student_id, status, date)
VALUES ('$student_id', '$status', '$date')";

mysqli_query($conn, $sql);

header("Location: attendance.php");

}
?>