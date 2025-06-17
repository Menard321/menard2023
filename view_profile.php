<?php
// Start session & check login (implement as needed)
session_start();
// Example: get patient ID from session
$patient_id = $_SESSION['patient_id'] ?? 1; // For demo, fixed ID = 1

// TODO: Connect to DB and fetch patient info based on $patient_id

// Sample data (replace with DB data)
$patient = [
    'full_name' => 'John Doe',
    'dob' => '1990-05-15',
    'gender' => 'Male',
    'phone' => '+1234567890',
    'email' => 'john@example.com',
    'address' => '123 Main St, Cityville',
    'emergency_contact' => 'Jane Doe - +0987654321',
    'allergies' => 'None',
    'profile_pic' => 'profile-placeholder.png' // use a real image
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>View Profile</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        padding: 20px;
    }

    .profile-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 500px;
        margin: auto;
    }

    img {
        width: 100px;
        border-radius: 50%;
        display: block;
        margin-bottom: 15px;
    }

    h2 {
        color: #007B5E;
    }

    p {
        margin: 6px 0;
    }

    .back-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background: #007B5E;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .back-btn:hover {
        background: #005f45;
    }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="<?= $patient['profile_pic'] ?>" alt="Profile Picture" />
        <h2><?= htmlspecialchars($patient['full_name']) ?></h2>
        <p><strong>Date of Birth:</strong> <?= htmlspecialchars($patient['dob']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($patient['gender']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($patient['phone']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($patient['email']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($patient['address']) ?></p>
        <p><strong>Emergency Contact:</strong> <?= htmlspecialchars($patient['emergency_contact']) ?></p>
        <p><strong>Allergies:</strong> <?= htmlspecialchars($patient['allergies']) ?></p>

        <button class="back-btn" onclick="window.history.back()">Go Back</button>
    </div>
</body>

</html>