<?php
// Start session to access session variables
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: ../index.php"); // Adjust path as necessary
    exit();
}

// Include your database connection or any necessary files
require '../dbconnect.php'; // Adjust path as necessary

// Fetch user information from database based on session data
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $fullName = $row['full_name'];
    $email = $row['email'];
} else {
    // Handle case where user data is not found (though this should ideally not happen if user_id is valid)
    $fullName = "User";
    $email = "user@example.com";
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style2.css">
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <h2>Admin</h2>
            <p>itlog@gmail.com</p>
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Doctors</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">Appointment</a></li>
                <li><a href="#">Patients</a></li>
                <li><a href="../logout.php">logout</a></li>
            </ul>
        </nav>
    </div>