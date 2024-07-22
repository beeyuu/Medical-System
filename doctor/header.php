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
require_once '../dbconnect.php'; // Adjust path as necessary

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="doctors.css">
    <link rel="stylesheet" href="../buttons.css">
    <link href="../output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
<div class="bg-gray-800 text-white w-64 min-h-screen p-4">
        <h2 class="text-2xl font-bold mb-6">Sidebar</h2>
        <ul>
            <li>
                <a href="dashboard.php" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
            </li>
            <li>
                <a href="patient.php" class="block py-2 px-4 rounded hover:bg-gray-700">Patients</a>
            </li>
            <li>
                <a href="appointment.php" class="block py-2 px-4 rounded hover:bg-gray-700">Appointment</a>
            </li>
            <li>
                <a href="../logout.php" class="block py-2 px-4 rounded hover:bg-gray-700">Logout</a>
            </li>
        </ul>
    </div>
    
   
</body>
</html>
