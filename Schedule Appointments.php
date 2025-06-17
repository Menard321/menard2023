<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointment View</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7f8;
        padding: 20px;
    }

    h2 {
        color: #007B5E;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        border: 1px solid #dddddd;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #007B5E;
        color: white;
    }

    .btn {
        padding: 6px 12px;
        margin: 2px;
        border: none;
        color: white;
        cursor: pointer;
        border-radius: 4px;
    }

    .approve {
        background-color: #28a745;
    }

    .cancel {
        background-color: #dc3545;
    }

    .reschedule {
        background-color: #ffc107;
        color: black;
    }
    </style>
</head>

<body>

    <h2>Doctor Appointment View</h2>

    <?php
// Example data (replace with database query in real project)
$appointments = [
    [
        'id' => 'APT001',
        'patient_name' => 'John Doe',
        'date' => '2025-06-18',
        'time' => '10:00 AM',
        'reason' => 'Flu symptoms',
        'status' => 'Pending'
    ],
    [
        'id' => 'APT002',
        'patient_name' => 'Mary Smith',
        'date' => '2025-06-19',
        'time' => '11:30 AM',
        'reason' => 'Follow-up checkup',
        'status' => 'Approved'
    ]
];
?>

    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Patient Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($appointments as $appt): ?>
        <tr>
            <td><?= $appt['id'] ?></td>
            <td><?= $appt['patient_name'] ?></td>
            <td><?= $appt['date'] ?></td>
            <td><?= $appt['time'] ?></td>
            <td><?= $appt['reason'] ?></td>
            <td><?= $appt['status'] ?></td>
            <td>
                <button class="btn approve">Approve</button>
                <button class="btn cancel">Cancel</button>
                <button class="btn reschedule">Reschedule</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>