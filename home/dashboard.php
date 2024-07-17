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
    <title>Welcome, <?php echo $fullName; ?>!</title>
    <link rel="stylesheet" href="../style.css"> <!-- Adjust path as necessary -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo $fullName; ?>!</h1>
            <p>Email: <?php echo $email; ?></p>
            <a href="../logout.php">Logout</a> <!-- Example logout link, adjust path as necessary -->
        </header>
        <main>
            <h2>Dashboard</h2>
            <p>Welcome to your dashboard. Here you can...</p>
            <!-- Add your dashboard content and features here -->
        </main>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Your Company. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
