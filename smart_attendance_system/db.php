<?php

$host ="localhost";
$user ="root";
$password = "";
$database = "attendance_system";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    echo "Database connection failed";
}
?>
