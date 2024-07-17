<?php
    require_once 'dbconnect.php';

    // Start the session
    session_start();
        if (isset($_POST['signup'])) {
            // Get form data
            $fname = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO `users` (`full_name`, `email`, `password`) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fname, $email, $password);

            // Execute the statement
            if ($stmt->execute()) {
                // Get the last inserted ID
                $user_id = $stmt->insert_id;
                
                // Store email in session and redirect
                $_SESSION['email'] = $email;
                header("Location: home/dashboard.php");
            } else {
                // Handle error
                echo "Error: " . $stmt->error;
            }
        }
        if (isset($_POST['signin'])) {
            // Get form data
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            // Prepare and bind
            $stmt = $conn->prepare("SELECT `password` FROM `users` WHERE `email` = ?");
            $stmt->bind_param("s", $email);
        
            // Execute the statement
            $stmt->execute();
        
            // Bind result variables
            $stmt->bind_result($hashed_password);
        
            // Fetch the result
            if ($stmt->fetch()) {
                // Verify the password
                if (password_verify($password, $hashed_password)) {
                    // Store email in session and redirect
                    $_SESSION['email'] = $email;
                    header("Location: home/dashboard.php");
                    exit(); // Ensure the script stops executing after the redirect
                } else {
                    // Handle invalid password
                    echo "Invalid password.";
                }
            } else {
                // Handle invalid email
                echo "No user found with that email.";
            }
        
            // Close the statement and connection
            $stmt->close();
        }
    // Close the statement and connection
    $stmt->close();
    $conn->close();
?>
