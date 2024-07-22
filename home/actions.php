<?php
require_once '../dbconnect.php';

if (isset($_POST['addDoctor'])) {
    // Get form data
    $fname = $_POST['name'];
    $lastname = $_POST['lastname'];
    $desc = $_POST['description'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = 'doctor';

    // Prepare and bind for users table
    $stmt = $conn->prepare("INSERT INTO `users` (`full_name`, `email`, `password`, `user_type`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $username, $password, $type); // Note the change from "sss" to "ssss"

    // Execute the statement
    if ($stmt->execute()) {
        // Get the last inserted ID
        $user_id = $stmt->insert_id;

        // Prepare and bind for doctor table
        $stmt1 = $conn->prepare("INSERT INTO `doctor` (`user_id`, `name`, `lastname`, `description`) VALUES (?, ?, ?, ?)");
        $stmt1->bind_param("isss", $user_id, $fname, $lastname, $desc);
        
        // Execute the statement
        if ($stmt1->execute()) {
            header("Location: doctors.php");
            exit(); // Ensure the script stops executing after the redirect
        } else {
            // Handle error
            echo "Error: " . $stmt1->error;
        }
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    // Close the statements
    $stmt->close();
    $stmt1->close();
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM doctor WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: doctors.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
if (isset($_POST['addPatient'])) {
    // Get form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = 'patient';

    // Prepare and bind for users table
    $stmt = $conn->prepare("INSERT INTO `users` (`full_name`, `email`, `password`, `user_type`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $password, $type); // Note the change from "sss" to "ssss"

    // Execute the statement
    if ($stmt->execute()) {
        // Get the last inserted ID
        $user_id = $stmt->insert_id;

        // Prepare and bind for doctor table
        $stmt1 = $conn->prepare("INSERT INTO `patient` (`user_id`, `name`, `address`, `contact`) VALUES (?, ?, ?, ?)");
        $stmt1->bind_param("isss", $user_id, $fname, $address, $contact);
        
        // Execute the statement
        if ($stmt1->execute()) {
            header("Location: patient.php");
            exit(); // Ensure the script stops executing after the redirect
        } else {
            // Handle error
            echo "Error: " . $stmt1->error;
        }
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    // Close the statements
    $stmt->close();
    $stmt1->close();
}
// Close the connection
$conn->close();
?>
