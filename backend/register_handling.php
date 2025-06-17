<?php
include 'connect.php';  // Assumes $conn is defined here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = htmlspecialchars(trim($_POST['fName']));
    $address = htmlspecialchars(trim($_POST['address']));
    $phoneNumber = htmlspecialchars(trim($_POST['phoneNo']));
    $age = htmlspecialchars(trim($_POST['age']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $remember = isset($_POST['rememberMe']) ? "Yes" : "No";

    // Basic validation
    if (empty($firstName) || empty($address) || empty($phoneNumber) || empty($age) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all required fields.";
        exit();
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database (assuming 'user' table includes fname, address, phoneNo, age, password, remember)
    $stmt = $conn->prepare("INSERT INTO user (fname, address, phoneNO, age, remember,password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $address, $phoneNumber, $age, $remember,$hashedPassword,);

    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header('Location: ../login.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
