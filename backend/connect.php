<?php
// 1. Database Connection Details
$servername = "localhost";
$db_username = "user";     // Your MySQL database username
$db_password = "reg_password"; // Your MySQL database password
$dbname = "user_registration_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Process Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 3. Basic Validation and Sanitation
    // Trim whitespace
    $username = trim($username);
    $email = trim($email);

    // Sanitize email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<div class='message error'>Error: Passwords do not match.</div>";
        exit();
    }
}

    //