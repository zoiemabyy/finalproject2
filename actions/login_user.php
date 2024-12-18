<?php
// Include your config file to establish a connection to the database
require_once '../db/config.php'; // Update this path if needed

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Array to hold error messages
    $errors = [];



    // Prepare the SQL query to check if the email exists
    $query = "SELECT user_id, first_name, password, role FROM usersfinal WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameter
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result($userId, $firstname, $hashedPassword, $userRole);

        // Check if user was found
        if ($stmt->fetch()) {
            // Verify the password against the hashed password
            if (password_verify($password, $hashedPassword)) {
                // Successful login, create session
                session_start();
                $_SESSION['user_id'] = $userId;
                $_SESSION['firstname'] = $userId;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $userRole;
 
                header('Location: ../view/services.php');
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Incorrect password.']);
            }
        } else {
            header('Location: ../view/login.php');
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error: Could not prepare the statement.']);
    }

    // Close the connection
    $conn->close();
}
?>
