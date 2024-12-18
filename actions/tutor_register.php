<?php
// Include your config file to establish a connection to the database
require_once('../db/config.php'); // Update this path if needed

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form inputs
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Handle image upload
    $targetDir = "../uploads/"; // Directory to store uploaded images
    $imageName = basename($_FILES["profileImage"]["name"]);
    $targetFile = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Validate image
    if ($_FILES["profileImage"]["size"] > 500000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
        // Prepare SQL to insert user data
        $sql = "INSERT INTO tutorsfinal (first_name, last_name, email, password, profile_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $password, $imageName);

        if ($stmt->execute()) {
            header('Location: ../view/tutorlogin.php');
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }

    
    }
?>
