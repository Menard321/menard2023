<?php
include 'connect.php';
// HANDLE FORM SUBMISSION
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    if (empty($username) || empty($password) || empty($role)) {
        die("All fields are required.");
    }

    // Fetch user from the database based on role
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->execute([$username, $role]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($role === 'admin') {
                header('Location: admin_dashboard.php');
            } elseif ($role === 'doctor') {
                header('Location: doctor_dashboard.php');
            } elseif ($role === 'patient') {
                header('Location: patient_dashboard.php');
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found or role mismatch.";
    }
} else {
    echo "Invalid request method.";
}
?>