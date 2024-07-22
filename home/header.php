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
    <link rel="stylesheet" href="doctors.css">
    <link rel="stylesheet" href="../buttons.css">
    <link href="../output.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <h2>Admin</h2>
            <p>itlog@gmail.com</p>
        </div>
        <nav>
        <div class="menu">
            <ul>
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="doctors.php">Doctors</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">Appointment</a></li>
                <li><a href="#">Patients</a></li>
                <li><a href="../logout.php">logout</a></li>
            </ul>
        </div>

        </nav>
    </div>
    <script>
        document.querySelectorAll('.menu ul li a').forEach(link => {
            link.addEventListener('click', function(event) {
                
                // Remove the active class from all links
                document.querySelectorAll('.menu ul li a').forEach(link => {
                    link.classList.remove('active');
                });
                
                // Add the active class to the clicked link
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
