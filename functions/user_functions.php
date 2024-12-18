<?php
// Include the database connection
include '../../db/config.php';

function fetchAllUsers($conn) {
    global $conn;
    // SQL query to fetch all tutors
    $query = "SELECT user_id, first_name, last_name, email, role FROM usersfinal";
    $result = $conn->query($query);

    $users = []; // Initialize an empty array

    // Check if there are any tutors and fetch them
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row; // Add each tutor as an associative array
        }
    }

    return $users; // Return the array of tutors
}
?>

