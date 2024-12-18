<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/signup.css" />
  </head>
  <body>
    <div class="wrapper">
      <form id="loginForm" action="../actions/tutor_login_action.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
          <input type="email" id="email" placeholder="Email" name = "email" required>
          <i class='bx bxs-envelope'></i> 
          <small class="error" id="emailError"></small>
        </div>

        <div class="input-box">
          <input type="password" id="password" placeholder="Password" name = "password" required>
          <i class='bx bxs-lock-alt'></i>
          <small class="error" id="passwordError"></small>
        </div>

        <button type="submit" class="btn">Login</button>
        <div class="register-link">
          <p>Don't have an account? <a href="signuppage.php">Sign Up</a></p>
        </div>
      </form>
    </div> 

    <script>
      document.getElementById('loginForm').addEventListener('submit', function(event) {

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        let isValid = true;

        // Reset error messages
        emailError.textContent = '';
        passwordError.textContent = '';

        // Validate email format
        const emailRegex = /^[^\s@]+@ashesi\.edu\.gh$/;
        if (!emailRegex.test(email)) {
          emailError.textContent = 'Please enter a valid Ashesi email (e.g., example@ashesi.edu.gh).';
          isValid = false;
        }

        // Validate password
        const passwordRegex = /^(?=.*[A-Z])(?=.*[0-9]{3,})(?=.*[@#$%^&+=!]).{8,}$/;
        if (!passwordRegex.test(password)) {
          passwordError.textContent = 'Password must be at least 8 characters long, include one uppercase letter, three digits, and one special character.';
          isValid = false;
        }
      });
    </script>
  </body>
</html>
