<?php

include '../db/config.php';

// Function to fetch the tutor's availability for a specific date (based on day of week)
function getTutorAvailability($conn, $tutor_id, $selected_date) {
    // Get the day of the week (e.g., Monday, Tuesday) from the selected date
    $day_of_week = date('l', strtotime($selected_date)); // 'l' returns full textual day of the week
    
    $query = "SELECT start_time, end_time FROM availabilityfinal WHERE tutor_id = ? AND day_of_week = ?";
    
    // Prepare the query and bind parameters
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("is", $tutor_id, $day_of_week);
        $stmt->execute();
        $stmt->bind_result($start_time, $end_time);
        
        // Store the available time slots
        $availability = [];
        
        // Fetch available time slots
        while ($stmt->fetch()) {
            $availability[] = [
                'start_time' => $start_time,
                'end_time' => $end_time
            ];
        }
        
        // Close the statement
        $stmt->close();
        
        return $availability; // Return the availability
    } else {
        // In case of an error with the query
        return false;
    }
}

?>