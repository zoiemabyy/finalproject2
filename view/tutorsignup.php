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
    <form id="signUpForm" action="../actions/tutor_register.php" method="post" enctype="multipart/form-data">
        <h1>Sign Up</h1>
        <div class="input-box">
            <input type="text" id="firstName" placeholder="First Name" name="firstName" required>
            <i class='bx bxs-user'></i> 
        </div>
        <div class="input-box">
            <input type="text" id="lastName" placeholder="Last Name" name="lastName" required>
            <i class='bx bxs-user'></i> 
        </div>
        <div class="input-box">
            <input type="email" id="email" placeholder="Email" name="email" required pattern="^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$">
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Password" required pattern="^(?=.*[A-Z])(?=(.*\d){3})(?=.*[@#$%^&+=!]).{8,}$">
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <input type="password" id="password" name="confirmpassword" placeholder="Confirm Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <input type="file" id="profileImage" name="profileImage" accept="image/*" required>
            <i class='bx bxs-image'></i>
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <div class="register-link">
            <p>Already have an account? <a href="loginpage.php">Login</a></p>
        </div>
    </form>

    </div>

</body>
</html>
