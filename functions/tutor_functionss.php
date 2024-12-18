<?php
// Include the database connection
include '../db/config.php';

function getAllTutors($conn) {
    // SQL query to fetch all tutors and their availability
    
    $query = "
        SELECT 
            t.tutor_id, 
            t.first_name, 
            t.last_name, 
            t.email, 
            t.status, 
            a.day_of_week, 
            a.start_time, 
            a.end_time
        FROM TutorsFinal t
        LEFT JOIN availabilityfinal a ON t.tutor_id = a.tutor_id
        ORDER BY t.tutor_id, FIELD(a.day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')
    ";

    $result = $conn->query($query);

    $tutors = []; // Initialize an empty array

    // Check if there are any tutors and fetch them
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tutorId = $row['tutor_id'];

            // If the tutor is not already in the array, add them
            if (!isset($tutors[$tutorId])) {
                $tutors[$tutorId] = [
                    'tutor_id' => $row['tutor_id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'email' => $row['email'],
                    'status' => $row['status'],
                    'availability' => [] // Initialize an empty array for availability
                ];
            }

            // Add the availability details to the tutor's data
            if ($row['day_of_week']) {
                $tutors[$tutorId]['availability'][] = [
                    'day_of_week' => $row['day_of_week'],
                    'start_time' => $row['start_time'],
                    'end_time' => $row['end_time']
                ];
            }
        }
    }

    // Return the tutors with their availability
    return array_values($tutors); // Return as a numerically indexed array
}
?>
