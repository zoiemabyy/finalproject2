<?php
// Include the database configuration
include('../db/config.php');

// Start the session


// Function to fetch all availability
function viewAllAvailability($conn, $tutor_id) {
    // Prepare the query to fetch availability for the tutor
    $query = "SELECT day_of_week, start_time, end_time 
              FROM availabilityfinal 
              WHERE tutor_id = ? 
              ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the tutor_id parameter to the query
        $stmt->bind_param("i", $tutor_id);

        // Execute the statement
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result($day, $start_time, $end_time);

        // Store the availability data
        $availability = [];

        // Fetch all results
        while ($stmt->fetch()) {
            $availability[] = [
                'day' => $day,
                'start_time' => $start_time,
                'end_time' => $end_time
            ];
        }

        // Close the statement
        $stmt->close();

        return $availability; // This will return an array or an empty array
    } else {
        // In case of an error with the prepared statement
        return false; // Return false if query fails
    }
}
?>
