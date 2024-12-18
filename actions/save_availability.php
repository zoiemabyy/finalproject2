<?php
// Include the database configuration
include('../db/config.php');

// Start the session (to access session variables for the tutor's ID)
session_start();

// Get tutor's ID from session (assuming tutor_id is stored in session)
$tutor_id = $_SESSION['user_id'];

// Get the form data
$day = $_POST['day'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

// Validate form data (optional)
if (empty($day) || empty($start_time) || empty($end_time)) {
    echo "All fields are required.";
    exit;
}

// Prepare the SQL query
$query = "INSERT INTO availabilityfinal (tutor_id, day_of_week, start_time, end_time) 
          VALUES (?, ?, ?, ?)";

// Prepare and bind the statement
$stmt = $conn->prepare($query);
$stmt->bind_param("isss", $tutor_id, $day, $start_time, $end_time);

// Execute the query and check for success
if ($stmt->execute()) {
    // Redirect back to the availability page with a success message
    header("Location: ../view/available.php?status=success");
} else {
    // In case of an error, redirect with an error message
    header("Location: ../view/available.php?status=error");
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>
