<?php
// Include the database connection
include '../db/config.php';

function getAllServices($conn) {
    global $conn;
    // SQL query to fetch all services
    $query = "SELECT service_id, service_name, description FROM servicesfinal";
    $result = $conn->query($query);

    $services = []; // Initialize an empty array

    // Check if there are any services and fetch them
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $services[] = $row; // Add each service as an associative array
        }
    }

    return $services; // Return the array of services
}
?>
