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
    var_dump($_POST);


    // If there are any errors, return them in the response
    if (count($errors) > 0) {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        exit;
    }

    // Prepare the SQL query to check if the email exists
    $query = "SELECT tutor_id, first_name, last_name, password FROM tutorsfinal WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameter
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result($tutorId, $firstname, $lastname, $hashedPassword);

        // Check if user was found
        if ($stmt->fetch()) {
            // Verify the password against the hashed password
            if (password_verify($password, $hashedPassword)) {
                // Successful login, create session
                session_start();
                $_SESSION['user_id'] = $tutorId;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
 
                header('Location: ../view/tutordashboard.php');
            } else {
                header('Location: ../view/tutorlogin.php?error=incorrect_password');
                echo json_encode(['status' => 'error', 'message' => 'Incorrect password.']);
            }
        } else {
            // header('Location: ../view/tutorlogin.php?error=user_not_found');
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
