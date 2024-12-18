<?php
include '../../functions/tutor_functions.php';
include '../../functions/user_functions.php';
$users = fetchAllUsers($conn);
$tutors = getAllTutors($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
      /* Global Reset */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Montserrat", sans-serif;
        background-color: #f9f9f9;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .dashboard-container {
        background: white;
        width: 100%;
        max-width: 1000px;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      }

      .header {
        text-align: center;
        margin-bottom: 40px;
      }

      .header h1 {
        font-size: 28px;
        color: maroon;
        font-weight: 600;
        margin-bottom: 20px;
      }

      nav {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 40px;
        padding: 10px 0;
        background-color: maroon;
        border-radius: 8px;
      }

      nav a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease;
      }

      nav a:hover {
        background-color: white;
        color: maroon;
        transform: translateY(-3px);
      }

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
        gap: 10px;
      }

      .section h3 i {
        font-size: 24px;
      }

      .user-list,
      .analytics {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
      }

      .user-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.3s ease;
      }

      .user-item:last-child {
        border-bottom: none;
      }

      .user-item:hover {
        background-color: #f8f8f8;
      }

      .user-details p {
        font-size: 14px;
        color: #333;
      }

      .user-actions {
        display: flex;
        gap: 10px;
      }

      .action-button {
        padding: 8px 16px;
        font-size: 14px;
        color: white;
        background-color: maroon;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
      }

      .action-button:hover {
        background-color: #8b0000;
        transform: translateY(-3px);
      }

      .analytics h4 {
        font-size: 18px;
        color: maroon;
        font-weight: 600;
      }

      .analytics p {
        font-size: 14px;
        color: #666;
        margin: 5px 0;
      }

      @media (max-width: 768px) {
        nav {
          flex-direction: column;
          align-items: center;
        }

        nav a {
          padding: 12px 20px;
          margin-bottom: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div class="dashboard-container">
      <div class="header">
        <h1>Admin Dashboard</h1>
      </div>

      <nav>
        <a href="#">Users</a>
        <a href="#">Appointments</a>
        <a href="../../actions/logout.php">Logout</a>
      </nav>

      <div class="section">
        <h3><i class="fas fa-users"></i> Manage Users</h3>
        <div class="user-list">
        <?php foreach ($users as $user): ?>
          <div class="user-item">
            <div class="user-details">
              <p><strong>Name:</strong><?php echo $user['first_name'] . $user['last_name']; ?></p>
              <p><strong>Role:</strong> Student</p>
            </div>
            <div class="user-actions">
              <button class="action-button">Edit</button>
              <button class="action-button">Delete</button>
            </div>
          </div>
          <?php endforeach; ?>
      </div>

      <div class="section">
        <h3><i class="fas fa-calendar-alt"></i> Monitor Appointments</h3>
        <div class="user-list">
          <div class="user-item">
            <div class="user-details">
              <p><strong>Student:</strong> John Doe</p>
              <p><strong>Session:</strong> Capstone Review</p>
              <p><strong>Time:</strong> 10:00 AM</p>
            </div>
            <div class="user-actions">
              <button class="action-button">Details</button>
            </div>
          </div>
          <div class="user-item">
            <div class="user-details">
              <p><strong>Student:</strong> Jane Smith</p>
              <p><strong>Session:</strong> Essay Feedback</p>
              <p><strong>Time:</strong> 1:00 PM</p>
            </div>
            <div class="user-actions">
              <button class="action-button">Details</button>
            </div>
          </div>
        </div>
      </div>

      <div class="section">
        <h3><i class="fas fa-chart-line"></i> Analytics</h3>
        <div class="analytics">
          <h4>Total Users: 50</h4>
          <p>Students: 30</p>
          <p>Tutors: 20</p>
          <h4>Total Appointments: 120</h4>
          <p>Completed: 100</p>
          <p>Pending: 20</p>
        </div>
      </div>

      <div class="section">
        <h3><i class="fas fa-user-check"></i> Approve Tutors</h3>
        <div class="user-list">
          <?php foreach ($tutors as $tutor): ?>
          <div class="user-item">
            <div class="user-details">
              <p><strong>Name: </strong><?php echo $tutor['first_name']. $tutor['last_name']; ?></p>
              <p><strong>Status: </strong><?php echo $tutor['status']; ?></p>
            </div>
            <div class="user-actions">
                <form method="POST" action="../../actions/update_tutor_status.php">
                    <input type="hidden" name="tutor_id" value="<?php echo $tutor['tutor_id']; ?>">
                    <button type="submit" name="action" value="accept" class="action-button">Accept</button>
                    <button type="submit" name="action" value="decline" class="action-button">Decline</button>
                </form>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </body>
</html>
