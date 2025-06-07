<?php
include 'connect.php';

// Start session
session_start();

// Initialize variables
$errors = [];
$success = '';

// Process form when submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $firstName = htmlspecialchars(trim($_POST['firstName'] ?? ''));
    $lastName = htmlspecialchars(trim($_POST['lastName'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $phoneNumber = htmlspecialchars(trim($_POST['phoneNumber'] ?? ''));
    $age = intval($_POST['age'] ?? 0);
    $termsAccepted = isset($_POST['termsCheck']);

    // Validation
    if (empty($firstName)) {
        $errors['firstName'] = 'First name is required';
    }
    if (empty($lastName)) {
        $errors['lastName'] = 'Last name is required';
    }
    if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phoneNumber)) {
        $errors['phoneNumber'] = 'Phone number must be in format 123-456-7890';
    }
    if ($age < 18 || $age > 120) {
        $errors['age'] = 'Age must be between 18 and 120';
    }
    if (!$termsAccepted) {
        $errors['terms'] = 'You must accept the terms and conditions';
    }

    // If no errors, proceed with database insertion
    if (empty($errors)) {
        try {
            // Create database connection
            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            
            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
            
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, address, phone_number, age) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $firstName, $lastName, $address, $phoneNumber, $age);
            
            // Execute
            if ($stmt->execute()) {
                $success = 'Registration successful!';
                // Clear form
                $firstName = $lastName = $address = $phoneNumber = '';
                $age = 0;
            } else {
                throw new Exception("Error: " . $stmt->error);
            }
            
            // Close connections
            $stmt->close();
            $conn->close();
            
        } catch (Exception $e) {
            $errors['database'] = 'Database error: ' . $e->getMessage();
        }
    }
}