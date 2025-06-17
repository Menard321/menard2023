<?php
// manage_patients.php
// In a real application, fetch this from your database using the logged‑in doctor’s context.
$patients = [
    [
        'id' => 'P001',
        'full_name' => 'Jane Smith',
        'age' => 30,
        'gender' => 'Female',
        'phone' => '+255700123456',
        'address' => '123 Ocean Road, Dar es Salaam',
        'history_summary' => 'Asthma since childhood'
    ],
    [
        'id' => 'P002',
        'full_name' => 'John Doe',
        'age' => 45,
        'gender' => 'Male',
        'phone' => '+255712345678',
        'address' => '456 Lake Avenue, Arusha',
        'history_summary' => 'Type II Diabetes'
    ],
    // …more patients…
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Patients</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7f8;
        padding: 20px;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #2c3e50;
        color: #fff;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .actions button,
    .actions a {
        margin-right: 5px;
        padding: 6px 12px;
        font-size: 0.9em;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        color: #fff;
    }

    .edit {
        background: #3498db;
    }

    .delete {
        background: #e74c3c;
    }

    .view {
        background: #27ae60;
    }

    .back-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #7f8c8d;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    .back-btn:hover {
        background: #616a6b;
    }
    </style>
</head>

<body>

    <h2>Manage Patients</h2>

    <table>
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Medical History</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['id']) ?></td>
                <td><?= htmlspecialchars($p['full_name']) ?></td>
                <td><?= htmlspecialchars($p['age']) ?></td>
                <td><?= htmlspecialchars($p['gender']) ?></td>
                <td><?= htmlspecialchars($p['phone']) ?></td>
                <td><?= htmlspecialchars($p['address']) ?></td>
                <td><?= htmlspecialchars($p['history_summary']) ?></td>
                <td class="actions">
                    <!-- Replace # with actual URLs in your app -->
                    <a href="edit_patient.php?id=<?= urlencode($p['id']) ?>" class="edit">Edit</a>
                    <form action="delete_patient.php" method="POST" style="display:inline">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($p['id']) ?>">
                        <button type="submit" class="delete"
                            onclick="return confirm('Delete patient <?= htmlspecialchars($p['full_name']) ?>?')">Delete</button>
                    </form>
                    <a href="view_patient_history.php?id=<?= urlencode($p['id']) ?>" class="view">View Full Record</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="doctor_dashboard.php" class="back-btn">← Back to Dashboard</a>

</body>

</html>