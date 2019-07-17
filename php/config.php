<?php
//Get Heroku ClearDB connection information
$servername = "localhost";
$database = "jiajia";
$username = "wing8169";
$password = "jiaxiong";
$conn = new mysqli($servername, $username, $password, $database);
if (mysqli_connect_errno()) {
  die("Database connection failed: " . mysqli_connect_error());
}
// echo "Database connnected successfully<br>";
