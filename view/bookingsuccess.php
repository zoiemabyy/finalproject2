<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Success</title>
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
        background: #fff;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .success-container {
        background-color: white;
        width: 100%;
        max-width: 600px;
        padding: 40px;
        text-align: center;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .success-icon {
        font-size: 4rem;
        color: #28a745;
        margin-bottom: 20px;
      }

      .success-container h1 {
        font-size: 2rem;
        color: maroon;
        font-weight: 600;
        margin-bottom: 10px;
      }

      .success-container p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 20px;
      }

      .details {
        font-size: 1rem;
        color: #333;
        margin: 20px 0;
        padding: 15px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .details p {
        margin: 10px 0;
      }

      .btn-primary {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        color: white;
        background: maroon;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s;
        margin-top: 20px;
      }

      .btn-primary:hover {
        background: #8b0000;
      }
    </style>
  </head>
  <body>
    <div class="success-container">
      <!-- Success Icon -->
      <i class="fas fa-check-circle success-icon"></i>

      <!-- Success Message -->
      <h1>Booking Confirmed!</h1>
      <p>Your booking has been successfully confirmed. We look forward to seeing you!</p>

      <!-- Booking Details -->
      <div class="details">
        <p><strong>Tutor:</strong> John Doe</p>
        <p><strong>Subject:</strong> Essay Reviews</p>
        <p><strong>Date:</strong> December 14, 2024</p>
        <p><strong>Time:</strong> 10:00 AM</p>
      </div>

      <!-- Action Button -->
      <a href="../index.php" class="btn-primary">Return to Home</a>
    </div>
  </body>
</html>
