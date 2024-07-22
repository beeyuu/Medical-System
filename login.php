<?php
require_once 'dbconnect.php';

// Start the session
session_start();

if (isset($_POST['signin'])) {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT `password`, `user_type` FROM `users` WHERE `email` = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($hashed_password, $user_type);

        // Fetch the result
        if ($stmt->fetch()) {
            // Verify the password
            if ($password ==  $hashed_password) {
                // Store email and user_type in session
                $_SESSION['email'] = $email;
                $_SESSION['user_type'] = $user_type;

                // Redirect based on user type
                if ($user_type === 'admin') {
                    header("Location: home/dashboard.php"); // Redirect to admin dashboard
                } elseif ($user_type === 'doctor') {
                    header("Location: doctor/dashboard.php"); // Redirect to doctor dashboard
                } else {
                    header("Location: patient/dashboard.php"); // Default dashboard
                }
                exit(); // Ensure the script stops executing after the redirect
            } else {
                // Handle invalid password
                echo "Invalid password.";
            }
        } else {
            // Handle invalid email
            echo "No user found with that email.";
        }
    } else {
        // Handle query execution error
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
