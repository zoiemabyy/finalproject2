<?php
// include '../functions/service_functions.php';
// include '../functions/tutor_functionss.php';
// include '../functions/availability_functions.php';
// $services = getAllServices($conn);
// $tutors = getAllTutors($conn);
error_reporting(E_ALL);
display_errors, 1

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Writing Center Services</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
    

    <style>


      body {
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
        background: #f9f9f9;
      }

      /* Header and Navigation */
      header {
        background-color: maroon;
        padding: 7px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .logo {
        max-width: 6rem;
        height: 4rem;
        margin-left: 20px;
      }

      nav {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-grow: 1;
      }

      nav a {
        font-size: 1.1rem;
        color: white;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 15px;
        border-radius: 5px;
        position: relative;
        transition: background-color 0.3s, color 0.3s;
      }

      nav a:hover {
        background-color: white;
        color: maroon;
      }

      nav a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: white;
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease-out;
      }

      nav a:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
      }

      /* Services Section */
      .services-container {
        max-width: 1200px;
        margin: 50px auto;
        text-align: center;
        padding: 20px;
      }

      .services-header {
        font-size: 2rem;
        color: maroon;
        margin-bottom: 30px;
        font-weight: bold;
      }

      .services-description {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 40px;
        line-height: 1.6;
        text-align: left;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
      }

      .services-description:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      }

      .services-description h3 {
        font-size: 1.5rem;
        color: maroon;
        margin-bottom: 10px;
        font-weight: 600;
      }

      .services-description p {
        font-size: 1rem;
        color: #555;
        margin: 10px 0;
      }

      .services-description ul {
        list-style: none;
        padding-left: 0;
      }

      .services-description ul li {
        display: flex;
        align-items: center;
        margin: 12px 0;
        font-size: 1rem;
        color: #555;
      }

      .services-description ul li i {
        color: maroon;
        margin-right: 10px;
      }

      /* Grid for Tutors */
      .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
      }

      .tutor-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        text-align: center;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
      }

      .tutor-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
      }

      .tutor-card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 10px;
        object-fit: cover;
      }

      .tutor-card h3 {
        font-size: 1.2rem;
        color: maroon;
        margin: 5px 0;
      }

      .tutor-card p {
        font-size: 1rem;
        color: #555;
      }

      .tutor-card .availability {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #555;
      }

      .availability ul {
        list-style: none;
        padding: 0;
      }

      .availability ul li {
        display: flex;
        justify-content: center;
        margin: 5px 0;
      }

      .availability ul li i {
        color: maroon;
        margin-right: 8px;
      }

      .book-now {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 15px;
        font-size: 0.9rem;
        font-weight: bold;
        color: white;
        background: maroon;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s;
      }

      .book-now:hover {
        background: #8b0000;
      }
    </style>
  </head>
  <body>
    <header>
      <!-- Logo -->
      <img src="../assets/images/ashesilogo.png" alt="Writing Center Logo" class="logo" />

      <!-- Navigation Bar -->
      <nav>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#tutors">Tutors</a>
        <a href="#contact">Contact</a>
      </nav>
    </header>

    <div class="services-container">
      <!-- Header for Services -->
      <h1 class="services-header">Writing Center Services</h1>

      <!-- Description of Services -->
      <div class="services-description">
        <h3>Our Services Include:</h3>
        <p>At our Writing Center, we strive to support students in all stages of their writing process. Below are the key services we offer to help you improve your writing skills:</p>
        <ul>
          <?php foreach ($services as $service): ?>
          <li><i class="fas fa-pencil-alt"></i> <?php echo $service['service_name'];?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Meet Our Tutors Section -->
      <h2 class="services-header">Book a Tutor</h2>

      <div class="grid-container">
<!-- Tutor Card 1 -->
<?php foreach ($tutors as $tutor): ?>
  <div class="tutor-card">
    <!-- Profile Image with fallback -->
    <img src="<?php echo !empty($tutor['profile_image']) ? $tutor['profile_image'] : '../assets/images/zoie.jpg'; ?>" alt="<?php echo $tutor['first_name'] . ' ' . $tutor['last_name']; ?>" />

    <!-- Tutor Name -->
    <h3><?php echo $tutor['first_name'] . ' ' . $tutor['last_name']; ?></h3>

    <!-- Availability Section -->
    <div class="availability">
      <h4>Availability:</h4>
      <ul>
        <?php if (!empty($tutor['availability'])): ?>
          <!-- Loop through availability data -->
          <?php foreach ($tutor['availability'] as $availability): ?>
            <li>
              <i class="fas fa-calendar-day"></i> 
              <?php echo $availability['day_of_week'] . ': ' . $availability['start_time'] . ' - ' . $availability['end_time']; ?>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li><i class="fas fa-calendar-times"></i> No availability yet</li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- Book Now Link -->
    <a href="booking.php?tutor_id=<?php echo $tutor['tutor_id']; ?>" class="book-now">Book Now</a>
  </div>
<?php endforeach; ?>


        <!-- Tutor Card 2 -->

      </div>
    </div>
  </body>
</html>
