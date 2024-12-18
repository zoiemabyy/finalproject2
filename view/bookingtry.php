<?php
include '../functions/service_functions.php';
$services = getAllServices($conn);

include('../db/config.php');

// Start the session
session_start();

// Check if tutor_id is set in the session (or replace with a fixed tutor_id for testing)
if (!isset($_SESSION['user_id'])) {
    // Redirect if no tutor_id is found in session (client should be logged in)
    header("Location: loginpage.php");
    exit;
}

$tutor_id = $_GET['tutor_id'];

// Function to fetch the tutor's availability for a specific date (based on day of week)
function getTutorAvailability($conn, $tutor_id, $selected_date) {
    // Get the day of the week (e.g., Monday, Tuesday) from the selected date
    $day_of_week = date('l', strtotime($selected_date)); // 'l' returns full textual day of the week
    
    $query = "SELECT start_time, end_time FROM availabilityfinal WHERE tutor_id = ? AND day_of_week = ?";
    
    // Prepare the query and bind parameters
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("is", $tutor_id, $day_of_week);
        $stmt->execute();
        $stmt->bind_result($start_time, $end_time);
        
        // Store the available time slots
        $availability = [];
        
        // Fetch available time slots
        while ($stmt->fetch()) {
            $availability[] = [
                'start_time' => $start_time,
                'end_time' => $end_time
            ];
        }
        
        // Close the statement
        $stmt->close();
        
        return $availability; // Return the availability
    } else {
        // In case of an error with the query
        return false;
    }
}

// Fetch availability if a date is selected
$availability = [];
if (isset($_POST['selected_date'])) {
    $selected_date = $_POST['selected_date'];
    $availability = getTutorAvailability($conn, $tutor_id, $selected_date);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tutor Availability</title>
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
            background: #f4f4f4;
            color: #333;
        }

        /* Header and Navigation */
        header {
            background-color: maroon;
            padding: 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

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

        .logo {
            max-width: 6rem;
            height: 4rem;
            margin-left: 20px;
        }

        nav {
            display: flex;
            gap: 20px;
            margin-right: 20px;
        }

        nav a {
            font-size: 1.1rem;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover {
            background-color: white;
            color: maroon;
        }

        /* Main Content Styling */
        .booking-container {
            background: white;
            width: 90%;
            max-width: 600px;
            padding: 30px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 40px auto;
            background-color: #fff;
        }

        /* Availability Section Styling */
        .section h3 {
            font-size: 1.3rem;
            color: maroon;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section h3 i {
            margin-right: 10px;
            font-size: 20px;
            color: maroon;
        }

        .calendar {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background: #f9f9f9;
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        .calendar:focus {
            border-color: maroon;
            outline: none;
        }

        /* Check Availability Button */
        button[type="submit"] {
            background-color: maroon;
            color: white;
            padding: 10px 25px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #8b0000;
            transform: translateY(-3px);
        }

        button[type="submit"]:focus {
            outline: none;
        }

        /* Time Slots Styling */
        .time-slots {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .time-slot {
            flex: 1 0 calc(33.333% - 10px);
            padding: 12px;
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            text-align: center;
            color: #555;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
            margin-bottom: 15px;
        }

        .time-slot:hover {
            background: maroon;
            color: white;
        }

        .time-slot.active {
            background: maroon;
            color: white;
        }

        /* Confirm Booking Button */
        .book-now {
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

        .book-now:hover {
            background: #8b0000;
        }

        .book-now:focus {
            outline: none;
        }

    </style>
  </head>
  <body>
  <header>
      <button class="back-button" onclick="window.history.back();">
        <i class="fas fa-arrow-left"></i> Back
      </button>
      <img src="../assets/images/ashesilogo.png" alt="Tutor Logo" class="logo" />
      <nav>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#tutors">Tutors</a>
        <a href="#contact">Contact</a>
      </nav>
    </header>

    <div class="booking-container">
    <!-- Select Date -->
    <div class="section">
        <h3><i class="fas fa-calendar-alt"></i> Select a Date</h3>
        <form method="POST" action="../actions/add_booking.php">
            <input type="date" name="selected_date" class="calendar" required />
            <button type="submit">Check Availability</button>
        </form>
    </div>

    <!-- Available Times -->
    <?php if (!empty($availability)): ?>
        <div class="section">
            <h3><i class="fas fa-clock"></i> Available Times</h3>
            <div class="time-slots">
                <?php foreach ($availability as $slot): ?>
                    <div class="time-slot" onclick="selectTime(this)" data-start="<?php echo $slot['start_time']; ?>" data-end="<?php echo $slot['end_time']; ?>">
                        <?php echo date('g:i A', strtotime($slot['start_time'])); ?> - 
                        <?php echo date('g:i A', strtotime($slot['end_time'])); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php elseif (isset($_POST['selected_date'])): ?>
        <div class="section">
            <h3>No availability for this date. Please select another day.</h3>
        </div>
    <?php endif; ?>

    <!-- Book Button (only visible after selecting time) -->
    <form id="booking-form" method="POST" action="../actions/add_booking.php" style="display: none;">
        <input type="hidden" name="selected_date" id="selected_date" />
        <input type="hidden" name="selected_time_start" id="selected_time_start" />
        <input type="hidden" name="selected_time_end" id="selected_time_end" />
        
        <!-- Additional Hidden Inputs -->
        <input type="hidden" name="student_id" id="student_id" value="<?php echo $_SESSION['user_id']; ?>" />
        <input type="hidden" name="tutor_id" id="tutor_id" value="<?php echo $_GET['tutor_id']; ?>" />
        <input type="hidden" name="service_id" id="service_id" value="<?php echo $_SESSION['service_id']; ?>" />
        
        <button type="submit" class="book-now">Confirm Booking</button>
    </form>
</div>

<script>
    // Function to handle selecting a time slot
    function selectTime(timeSlot) {
        var startTime = timeSlot.getAttribute('data-start');
        var endTime = timeSlot.getAttribute('data-end');
        var selectedDate = document.querySelector('input[name="selected_date"]').value;

        // Set the hidden fields with the selected date and time
        document.getElementById('selected_date').value = selectedDate;
        document.getElementById('selected_time_start').value = startTime;
        document.getElementById('selected_time_end').value = endTime;

        // Show the book button
        document.getElementById('booking-form').style.display = 'block';
    }
</script>

    <script>
        // JavaScript to handle time slot selection
        function selectTime(element) {
            const selectedSlot = element.textContent;
            alert("You have selected: " + selectedSlot);
            // Here you can also store the selected time in a hidden form field or pass it to the booking confirmation page
        }
    </script>
  </body>
</html>
