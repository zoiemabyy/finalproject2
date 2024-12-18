<?php

$servername = "localhost";
$username = "root";
$password = ""; // Default for XAMPP
$dbname = "writingcenterfinal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}


?>

