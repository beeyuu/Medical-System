<?php

$servername = "localhost";
$username = "root";  // Use your database username
$password = "";  // Use your database password
$dbname = "medical_health_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>