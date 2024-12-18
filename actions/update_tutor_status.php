<?php
// Include the database connection
include '../db/config.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tutor_id = $_POST['tutor_id']; // The ID of the tutor
    $action = $_POST['action']; // Either 'accept' or 'decline'

    // Determine the status based on the action
    $status = $action === 'accept' ? 'approved' : 'declined';

    // Update the tutor's status in the database
    $query = "UPDATE TutorsFinal SET status = ? WHERE tutor_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $tutor_id);

    if ($stmt->execute()) {
        echo "Tutor status updated to: $status.";
    } else {
        echo "Error updating tutor status: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the admin page (optional)
    header("Location: ../view/admin/admin.php");
    exit;
}
?>
