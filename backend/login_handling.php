<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fName = trim($_POST['fName']);
    $password = $_POST['password'];

    if (empty($fName) || empty($password)) {
        die("Please fill in both fields.");
    }

    $stmt = $conn->prepare("SELECT * FROM user WHERE fName = ?");
    $stmt->bind_param("s", $fName);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Store session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fName'] = $user['fName'];
        $_SESSION['user_type'] = $user['user_type'];  // Example: 'doctor', 'admin', 'patient'

        // Redirect based on usertype
        switch ($user['user_type']) {
            case 'Admin':
                header("Location: ../admin_Dashboard.php");
                break;
            case 'Doctor':
                header("Location: ../doctor_Dashboard.php");
                break;
            case 'Patience':
                header("Location: ../patient_Dashboard.php");
                break;
            default:
                echo "Unknown user type.";
        }
        exit();
    } else {
        echo "Invalid credentials.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
