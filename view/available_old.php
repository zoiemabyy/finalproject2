<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Set Availability</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>

   
      body {
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
      }

      header {
        background-color: maroon;
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
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
        margin-right: 15px;
      }

      .back-button:hover {
        background-color: #6a0000;
        transform: translateY(-3px);
      }

      /* Logo Styling */
      header .logo {
        max-width: 6rem;
        height: 4rem;
      }

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

      /* Set Availability Container */
      .availability-container {
        margin: 80px auto 20px;
        max-width: 900px;
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .availability-header {
        text-align: center;
        margin-bottom: 30px;
      }

      .availability-header h2 {
        font-size: 2rem;
        color: maroon;
        font-weight: 600;
      }

      /* Availability Form */
      .availability-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .availability-form label {
        font-size: 16px;
        color: #333;
        font-weight: 600;
      }

      .availability-form input[type="datetime-local"] {
        padding: 12px;
        font-size: 14px;
        color: #333;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        width: 100%;
        transition: border-color 0.3s;
      }

      .availability-form input[type="datetime-local"]:focus {
        border-color: maroon;
      }

      .availability-form button {
        padding: 12px 20px;
        font-size: 16px;
        color: white;
        background: maroon;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
      }

      .availability-form button:hover {
        background: #8b0000;
        transform: translateY(-3px);
      }

      /* Saved Times */
      .saved-times {
        margin-top: 30px;
        font-size: 16px;
        color: #333;
      }

      .saved-times ul {
        list-style-type: none;
        padding: 0;
      }

      .saved-times ul li {
        margin: 10px 0;
        padding: 10px;
        background-color: #f9f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
      }

      .saved-times ul li:hover {
        background-color: #f4f4f4;
        transform: translateY(-3px);
      }

      /* Footer */
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
        .topbar nav {
          flex-direction: column;
          align-items: center;
        }

        .topbar nav a {
          margin-bottom: 10px;
        }

        .availability-container {
          padding: 20px;
        }

        .availability-header h2 {
          font-size: 1.6rem;
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
        <a href="tutordashboard.php">Dashboard</a>
        <a href="available.php">Set Availability</a>
        <a href="#">Logout</a>
        
      </nav>
    </header>

    <!-- Set Availability Section -->
    <div class="availability-container" id="availability">
      <div class="availability-header">
        <h2>Set Your Availability</h2>
      </div>

      <!-- Availability Form -->
      <div class="availability-form">
        <label for="available-time">Select Available Date & Time:</label>
        <input type="datetime-local" id="available-time" name="available-time" required />

        <button type="button">Add Time</button>
      </div>

      <!-- Saved Times List -->
      <div class="saved-times">
        <h3>Your Available Times</h3>
        <ul id="time-list">
          <!-- List of saved available times will appear here -->
        </ul>
      </div>
    </div>

  </body>
</html>
