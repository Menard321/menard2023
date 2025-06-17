<?php
session_start();

// Dummy doctor ID for demonstration (replace with session-based ID)
$doctor_id = 1;
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php'; // DB connection

    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    // Fetch current password from DB
    $stmt = $conn->prepare("SELECT password FROM doctors WHERE id = ?");
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $stmt->bind_result($dbPassword);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($current, $dbPassword)) {
        $error = "⚠️ Current password is incorrect!";
    } elseif ($new !== $confirm) {
        $error = "⚠️ New passwords do not match!";
    } else {
        $hashedPassword = password_hash($new, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare("UPDATE doctors SET password = ? WHERE id = ?");
        $updateStmt->bind_param("si", $hashedPassword, $doctor_id);
        if ($updateStmt->execute()) {
            $success = "✅ Password changed successfully!";
        } else {
            $error = "⚠️ Error updating the password.";
        }
        $updateStmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f6f9;
        padding: 20px;
    }

    .container {
        max-width: 500px;
        background: white;
        margin: auto;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #007B5E;
        text-align: center;
    }

    label {
        margin-top: 15px;
        display: block;
        font-weight: bold;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .toggle {
        margin-top: 5px;
        font-size: 14px;
    }

    button {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background: #007B5E;
        color: white;
        border: none;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background: #005f45;
    }

    .message {
        margin-top: 15px;
        text-align: center;
        font-weight: bold;
    }

    .error {
        color: #c9302c;
    }

    .success {
        color: green;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Change Password</h2>

        <?php if ($error): ?>
        <div class="message error"><?= $error ?></div>
        <?php elseif ($success): ?>
        <div class="message success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST">
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required>

            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <div class="toggle">
                <input type="checkbox" id="togglePassword"> Show passwords
            </div>

            <button type="submit">Update Password</button>
        </form>
    </div>

    <script>
    const toggle = document.getElementById("togglePassword");
    toggle.addEventListener("change", () => {
        document.querySelectorAll("input[type='password']").forEach(input => {
            input.type = toggle.checked ? "text" : "password";
        });
    });
    </script>
</body>

</html>