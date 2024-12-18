<?php
// Include the database connection
include '../../db/config.php';

function getAllTutors($conn) {
    global $conn;
    // SQL query to fetch all tutors
    $query = "SELECT tutor_id, first_name, last_name, email, status FROM TutorsFinal";
    $result = $conn->query($query);

    $tutors = []; // Initialize an empty array

    // Check if there are any tutors and fetch them
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tutors[] = $row; // Add each tutor as an associative array
        }
    }

    return $tutors; // Return the array of tutors
}
?>
