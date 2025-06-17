<?php
session_start();
$doctor_id = $_SESSION['doctor_id'] ?? 1;

// TODO: Fetch doctor info from DB
$doctor = [
    'full_name' => 'Dr. Alice Smith',
    'specialization' => 'Cardiology',
    'phone' => '+1234567890',
    'email' => 'alice.smith@hospital.com',
    'office' => 'Room 402, Main Building',
    'profile_pic' => 'doctor-placeholder.png'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Doctor Profile</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f4f7;
        padding: 20px;
    }

    .profile-container {
        max-width: 500px;
        background: white;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
    }

    img {
        width: 120px;
        border-radius: 50%;
        display: block;
        margin: 0 auto 15px;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
    }

    p {
        margin: 8px 0;
        font-size: 1rem;
    }

    .back-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: block;
        width: 100%;
    }

    .back-btn:hover {
        background: #1a252f;
    }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="<?= $doctor['profile_pic'] ?>" alt="Doctor Profile Picture" />
        <h2><?= htmlspecialchars($doctor['full_name']) ?></h2>
        <p><strong>Specialization:</strong> <?= htmlspecialchars($doctor['specialization']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($doctor['phone']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($doctor['email']) ?></p>
        <p><strong>Office:</strong> <?= htmlspecialchars($doctor['office']) ?></p>
        <button class="back-btn" onclick="window.history.back()">Back to Dashboard</button>
    </div>
</body>

</html>