<?php
/* sa file na ito, nag establish tayo ng connection sa MySQL database gamit ang mysqli extension.
It defines the database connection parameters host, user, password, and database name tyka nag attempt tayo na mag connect sa database.
if nag failed yung connection mag lalabas ito ng error message. sa lahat ng php files na need ng database connection ay connected dito dahil sa include.db.php. */

$host ="localhost";
$user ="root";
$password = "";
$database = "attendance_system";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    echo "Database connection failed";
}
?>
