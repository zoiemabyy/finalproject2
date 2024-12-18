<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/signup.css" />
  </head>
  <body>

    <div class="wrapper">
      <form id="signupForm" action="../actions/register_user.php" method="post">
        <h1>Sign up</h1>
        <div class="input-box">
          <input type="text" id="firstName" placeholder="First Name" name = "firstName" required>
          <i class='bx bxs-user'></i> 
          <small class="error" id="firstNameError"></small>
        </div>

        <div class="input-box">
            <input type="text" id="lastName" placeholder="Last Name" name = "lastName" required>
            <i class='bx bxs-user'></i> 
            <small class="error" id="lastNameError"></small>
        </div>

        <div class="input-box">
            <input type="email" id="email" placeholder="Email" name = "email" required>
            <i class='bx bxs-envelope'></i> 
            <small class="error" id="emailError"></small>
        </div>

        <div class="input-box">
            <input type="password" id="password" placeholder="Password" name = "password" required>
            <i class='bx bxs-lock-alt' ></i>
            <small class="error" id="passwordError"></small>
        </div>

        <div class="input-box">
            <input type="password" id="confirmPassword" placeholder="Confirm Password" name ="confirmPassword" required>
            <i class='bx bxs-lock-alt' ></i>  
            <small class="error" id="confirmPasswordError"></small>
        </div>

        <button type="submit" class="btn">Sign Up</button>
        <div class="register-link">
            <p>Already have an account? <a href="loginpage.php">Login</a></p>
        </div>
      </form> 
    </div> 

    <script>
      document.getElementById('signupForm').addEventListener('submit', function(event) {

        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        const firstNameError = document.getElementById('firstNameError');
        const lastNameError = document.getElementById('lastNameError');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        let isValid = true;

        // Reset error messages
        firstNameError.textContent = '';
        lastNameError.textContent = '';
        emailError.textContent = '';
        passwordError.textContent = '';
        confirmPasswordError.textContent = '';

        // Validate first and last name
        if (!firstName.trim()) {
          firstNameError.textContent = 'First Name is required.';
          isValid = false;
        }

        if (!lastName.trim()) {
          lastNameError.textContent = 'Last Name is required.';
          isValid = false;
        }

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

        // Confirm password match
        if (password !== confirmPassword) {
          confirmPasswordError.textContent = 'Passwords do not match.';
          isValid = false;
        }

        // Redirect to login page if valid
        if (isValid) {
          window.location.href = 'loginpage.php';
        }
      });
    </script>
  </body>
</html>
