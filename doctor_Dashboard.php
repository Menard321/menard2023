<!-- doctor_dashboard.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Doctor Dashboard</title>
    <style>
    /* Same CSS as before... */
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        margin: 0;
        padding: 0;
    }

    .header {
        background: #004d40;
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
        background: #d32f2f;
        border: none;
        padding: 10px 16px;
        color: white;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .logout-btn:hover {
        background: #b71c1c;
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
        color: #004d40;
    }

    .card button {
        padding: 10px 20px;
        background: #004d40;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .card button:hover {
        background: #00332a;
    }
    </style>
</head>

<body>

    <div class="header">
        <h1>Welcome, Doctor</h1>
        <a href="login.php">
            <button class="logout-btn">🚪 Logout</button>
        </a>


    </div>

    <div class="container">
        <div class="card-grid">
            <div class="card">
                <h3>👤 Profile View</h3>
                <button onclick="window.location.href='Profile View.php'">
                    Open
                </button>

            </div>

            <div class="card">
                <h3>🗓️ Schedule Appointments</h3>
                <button onclick="window.location.href='Schedule Appointments.php'">
                    Open
                </button>

            </div>

            <div class="card">
                <h3>📝 Manage Patients</h3>
                <button onclick="window.location.href='manage Patients.php'">
                    Open
                </button>
            </div>

            <div class="card">
                <h3>🧾 Medical Reports</h3>
                <button onclick="window.location.href='Medical Reports.php'">open</button>
            </div>

            <div class="card">
                <h3>💬 Message Patients</h3>
                <button onclick="window.location.href='Message Patients.php'">check</button>
            </div>

            <div class="card">
                <h3>🔐 Update Password</h3>
                <button onclick="window.location.href='Update Password.php'">Update</button>
            </div>
        </div>
    </div>

</body>

</html>