<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "plant_identifier_db"; // ✅ must match exactly in phpMyAdmin

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
