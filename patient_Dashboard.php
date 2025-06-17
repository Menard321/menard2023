<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Patient Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        margin: 0;
        padding: 0;
    }

    .header {
        background: #007B5E;
        color: white;
        padding: 20px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
    }

    .header p {
        margin: 0 0 0 10px;
        font-weight: 300;
        font-size: 16px;
    }

    .logout-btn {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        background: #d9534f;
        border: none;
        padding: 10px 16px;
        color: white;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .logout-btn:hover {
        background: #c9302c;
    }

    .container {
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
    }

    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 20px;
    }

    .card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px 20px;
        text-align: center;
        transition: 0.3s;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .card h3 {
        margin-bottom: 10px;
        color: #007B5E;
    }

    .card button {
        padding: 10px 20px;
        background: #007B5E;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .card button:hover {
        background: #005f45;
    }
    </style>
</head>

<body>

    <div class="header">
        <h1>Welcome, Patient</h1>
        <a href="login.php">
            <button class="logout-btn">🚪 Logout</button>
        </a>

    </div>

    <div class="container">
        <div class="card-grid">
            <div class="card">
                <h3>👤 View Profile</h3>
                <button onclick="location.href='view_profile.php'">Open</button>
                <link rel="stylesheet" href="view_profile.php">
            </div>

            <div class="card">
                <h3>🗓️ Book Appointment</h3>
                <button onclick="location.href='appointment.php'">Book Now</button>
                <link rel="stylesheet" href="appointment.php">
            </div>

            <div class="card">
                <h3>📅 My Appointments</h3>
                <button onclick="location.href='my_appointments.php'">View</button>
                <link rel="stylesheet" href="my_appointments.php">
            </div>

            <div class="card">
                <h3>🧾 Medical Reports</h3>
                <button onclick="location.href='medical_reports.php'">View Reports</button>
                <link rel="stylesheet" href="medical_reports.php">
            </div>

            <div class="card">
                <h3>💬 Messages</h3>
                <button onclick="location.href='messages.php'">Check</button>
                <link rel="stylesheet" href="messages.php">
            </div>

            <div class="card">
                <h3>🔐 Change Password</h3>
                <button onclick="location.href='change_password.php'">Update</button>
                <link rel="stylesheet" href="change_password.php">
            </div>
        </div>
    </div>

</body>

</html>