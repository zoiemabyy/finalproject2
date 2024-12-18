<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tutor Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
      /* Global Styles */
      body {
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
      }

      /* Header Styling */
      header {
        background-color: maroon;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      /* Back Button */
      .back-button {
        padding: 10px 15px;
        font-size: 1rem;
        color: white;
        background: #8b0000;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
        margin-left: 5px;
      }

      .back-button:hover {
        background-color: #6a0000;
        transform: translateY(-3px);
      }

      /* Logo Styling */
      header .logo {
        max-width: 6rem;
        height: 4rem;
        margin-left: 20px;
      }

      /* Navigation Styling */
      header nav {
        display: flex;
        gap: 30px;
        margin-right: 20px;
      }

      header nav a {
        font-size: 1.1rem;
        color: white;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
      }

      header nav a:hover {
        background-color: white;
        color: maroon;
      }

      /* Dashboard Container */
      .dashboard-container {
        width: 100%;
        max-width: 900px;
        padding: 30px;
        background: white;
        margin: 30px auto;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .services-header {
        font-size: 2rem;
        color: maroon;
        margin-bottom: 30px;
        text-align: center;
      }

      /* Section Styles */
      .section {
        margin-bottom: 30px;
      }

      .section h3 {
        font-size: 20px;
        color: maroon;
        font-weight: 600;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
      }

      .section h3 i {
        margin-right: 10px;
        font-size: 22px;
        color: maroon;
      }

      .appointments-list {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        background: #f9f9f9;
        padding: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      }

      .appointment-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #e0e0e0;
        transition: all 0.3s ease;
      }

      .appointment-item:last-child {
        border-bottom: none;
      }

      .appointment-item:hover {
        background: #f4f4f4;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .appointment-details {
        font-size: 14px;
        color: #333;
      }

      .appointment-details h4 {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
      }

      .appointment-actions {
        display: flex;
        gap: 10px;
      }

      .action-button {
        padding: 8px 15px;
        font-size: 14px;
        color: white;
        background: maroon;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.3s ease;
      }

      .action-button:hover {
        background: #8b0000;
        transform: translateY(-3px);
      }

      .add-notes {
        width: 100%;
        padding: 12px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        margin-top: 10px;
        font-size: 14px;
        color: #333;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      }

      /* Footer Styles */
      footer {
        background-color: maroon;
        color: white;
        text-align: center;
        padding: 10px;
        font-size: 14px;
        margin-top: 30px;
      }

      /* Responsive Styles */
      @media (max-width: 768px) {
        header nav a {
          font-size: 1rem;
          margin: 0 10px;
        }

        .dashboard-container {
          padding: 20px;
        }

        .section h3 {
          font-size: 18px;
        }

        .appointment-item {
          flex-direction: column;
          align-items: flex-start;
        }

        .appointment-actions {
          justify-content: flex-start;
        }
      }
    </style>
  </head>
  <body>
    <!-- Header Section -->
    <header>
      <button class="back-button" onclick="window.history.back();">
        <i class="fas fa-arrow-left"></i> Back
      </button>
      <img src="../assets/images/ashesilogo.png" alt="Tutor Logo" class="logo" />
      <nav>
        <p style = "color:white"><strong>Welcome, <?php echo $_SESSION['firstname'] . "!"; ?></strong></p>
        <a href="tutordashboard.php">Dashboard</a>
        <a href="available.php">Set Availability</a>
        <a href="../actions/tutorlogout.php">Logout</a>
     
      </nav>
    </header>

    <!-- Main Dashboard Content -->
    <div class="dashboard-container">
      <h2 class="services-header">Tutor Dashboard</h2>
      
      <!-- Appointments Section -->
      <div class="section">
        <h3><i class="fas fa-calendar-alt"></i> Appointments</h3>
        <div class="appointments-list">
          <!-- Appointment Item 1 -->
          <div class="appointment-item">
            <div class="appointment-details">
              <h4>Zoie</h4>
              <p>Capstone Review Session - 10:00 AM</p>
            </div>
            <div class="appointment-actions">
              <button class="action-button">Mark as Attended</button>
              <button class="action-button">Cancel</button>
            </div>
          </div>
          <!-- Appointment Item 2 -->
          <div class="appointment-item">
            <div class="appointment-details">
              <h4>Habiba</h4>
              <p>Essay Feedback Session - 1:00 PM</p>
            </div>
            <div class="appointment-actions">
              <button class="action-button">Mark as Attended</button>
              <button class="action-button">Cancel</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Add Session Notes Section -->
      <div class="section">
        <h3><i class="fas fa-sticky-note"></i> Add Session Notes</h3>
        <textarea class="add-notes" placeholder="Write your notes here..."></textarea>
        <button class="action-button" style="margin-top: 10px;">Save Notes</button>
      </div>
    </div>
    
  </body>
</html>
