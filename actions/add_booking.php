<?php
// Assuming you have a database connection $db
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $service_id = $_POST['service_id'];
    $appointment_date = $_POST['selected_date'];
    $start_time = $_POST['selected_time_start'];
    $end_time = $_POST['selected_time_end'];
    var_dump($_POST);

    // Example: Insert into database
    $query = "INSERT INTO appointmentsfinal (student_id, tutor_id, service_id, appointment_date, start_time, end_time) 
              VALUES (:student_id, :tutor_id, :service_id, :appointment_date, :start_time, :end_time)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':tutor_id', $tutor_id);
    $stmt->bindParam(':service_id', $service_id);
    $stmt->bindParam(':appointment_date', $appointment_date);
    $stmt->bindParam(':start_time', $start_time);
    $stmt->bindParam(':end_time', $end_time);

    if ($stmt->execute()) {
        // Redirect to success page
        header('Location: bookingsuccess.php');
        exit;
    } else {
        echo "Error: Unable to complete the booking.";
    }
}
?>
