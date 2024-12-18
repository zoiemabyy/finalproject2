<?php
session_start();

// Destroy all session variables
session_unset();

// Destroy the session itself
session_destroy();

// Redirect to the login page or home page
header("Location: ../view/loginpage.php");
exit();
?>
