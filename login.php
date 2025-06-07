<?php
require 'backend/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HMS Login Portal</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
  </head>
  <body>
    <section class="login-section">
      <div class="login-container">
        <div class="login-left">
          <h1><a href="index.html">eHMS</a></h1>
          <h2>Welcome to HMS Portal</h2>
          <p>
            Please select your role and log in to access your personalized
            dashboard.
          </p>
          <p>
            Admins, Doctors, and Patients each have tailored access to manage
            their tasks.
          </p>
        </div>

        <div class="login-right">
          <div class="login-tabs">
            <button class="tab active" data-role="admin">Admin</button>
            <button class="tab" data-role="doctor">Doctor</button>
            <button class="tab" data-role="patient">Patient</button>
          </div>

         <form class="login-form" id="loginForm" action="backend/login_handling.php" method="POST">
           <div class="form-group">
              <label><i class="fas fa-user"></i> Username</label>
              <input
                type="text"
                name="username"
                placeholder="Enter your username"
                required
              />
            </div>
            <div class="form-group">
              <label><i class="fas fa-lock"></i> Password</label>
              <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
              />
            </div>

            <input type="hidden" name="role" value="admin" id="roleInput" />

            <button type="submit" class="btn btn--primary">Login</button>
            <a href="register.php">Register</a>
          </form>
         </form>
           
        </div>
      </div>
    </section>

    <script>
      document.querySelectorAll(".tab").forEach((tab) => {
        tab.addEventListener("click", function () {
          document
            .querySelectorAll(".tab")
            .forEach((t) => t.classList.remove("active"));
          this.classList.add("active");
          document.getElementById("roleInput").value = this.dataset.role;
        });
      });
    </script>
  </body>
</html>
