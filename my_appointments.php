<?php
session_start();
$patient_id = $_SESSION['patient_id'] ?? 1;

// TODO: Connect to DB and fetch appointments for this patient
$appointments = [
  ['date'=>'2025-06-20', 'time'=>'10:00 AM', 'doctor'=>'Dr. Alice Smith', 'specialization'=>'Cardiology', 'status'=>'Confirmed'],
  ['date'=>'2025-07-01', 'time'=>'02:30 PM', 'doctor'=>'Dr. Bob Johnson', 'specialization'=>'Dermatology', 'status'=>'Pending'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>My Appointments</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        padding: 20px;
    }

    .table-container {
        max-width: 700px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background: #007B5E;
        color: white;
    }

    tr:hover {
        background: #f1f1f1;
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
    <div class="table-container">
        <h2>My Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor</th>
                    <th>Specialization</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($appointments as $app): ?>
                <tr>
                    <td><?= htmlspecialchars($app['date']) ?></td>
                    <td><?= htmlspecialchars($app['time']) ?></td>
                    <td><?= htmlspecialchars($app['doctor']) ?></td>
                    <td><?= htmlspecialchars($app['specialization']) ?></td>
                    <td><?= htmlspecialchars($app['status']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="back-btn" onclick="window.history.back()">Go Back</button>
    </div>
</body>

</html>