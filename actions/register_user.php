<?php
// Include your config file to establish a connection to the database
require_once('../db/config.php'); // Update this path if needed

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Array to hold error messages
    $errors = [];

    // Validate the email format (ensure it's from Ashesi domain)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@ashesi\.edu\.gh$/", $email)) {
        header('Location: ../view/signuppage.php');
        $errors[] = "Invalid email format. Please use an Ashesi email address (e.g., user@ashesi.edu.gh).";
    }

    // Validate password strength
    if (!preg_match("/^(?=.*[A-Z])(?=.*\d.*\d.*\d)(?=.*[@#$%^&+=!]).{8,}$/", $password)) {
        header('Location: ../view/signuppage.php');
        $errors[] = "Password must be at least 8 characters, contain 1 uppercase letter, 3 digits, and 1 special character.";
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Check if the email already exists in the database
    $emailCheckQuery = "SELECT COUNT(*) FROM `usersfinal` WHERE `email` = ?";
    if ($stmt = $conn->prepare($emailCheckQuery)) {
        // Bind the email parameter
        $stmt->bind_param("s", $email);

        // Execute the query 
        $stmt->execute();

        // Bind the result
        $stmt->bind_result($emailCount);

        // Fetch the result
        $stmt->fetch();

        // Check if the email exists in the database
        if ($emailCount > 0) {
            // If email exists, add an error
            header('Location: ../view/signuppage.php');
            $errors[] = "The email address is already registered. Please use a different email.";
        }

        // Close the statement
        $stmt->close();
    } else {
        header('Location: ../view/signuppage.php');
        echo json_encode(['status' => 'error', 'message' => 'Database error: Could not prepare the email check query.']);
        exit;
    }

    // If there are any errors (including email duplication), display them
    if (count($errors) > 0) {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        header('Location: ../view/signuppage.php');

        exit;
    }
    
    // Hash the password for security before storing it
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL query to insert the new user
    $query = "INSERT INTO `usersfinal` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

        // Execute the query
        if ($stmt->execute()) {
            header('Location: ../view/loginpage.php');
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error: Could not register user.']);
            header('Location: ../view/signuppage.php');

        }

        // Close the statement
        $stmt->close();
    } else {
        header('Location: ../view/signuppage.php');
        echo json_encode(['status' => 'error', 'message' => 'Database error: Could not prepare the statement.']);
    }

    // Close the connection
    $conn->close();
}
?>
