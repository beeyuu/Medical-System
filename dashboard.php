<?php
include 'dbconnect.php';

// Check if the signup form was submitted
if(isset($_POST['signup'])) {
    $fname = $_POST['fullName'];  // Assuming your form field name is 'fullName'
    $email = $_POST['email'];     // Assuming your form field name is 'email'
    $password = md5($_POST['password']);  // Hashing the password using MD5
    // Prepare SQL query
    $sql = "INSERT INTO `users` (`full_name`, `email`, `password`) VALUES ('$fname', '$email', '$password')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;

        // Store user ID in session variable
        $_SESSION['user_id'] = $user_id;
        header("Location: home/dashboard.php");
    } else {
       alert("Error Saving");
    }
}

// Close connection
$conn->close();
?>
