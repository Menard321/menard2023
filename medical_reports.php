<?php
session_start();
$patient_id = $_SESSION['patient_id'] ?? 1;

// TODO: Connect to DB and fetch medical reports for patient
$reports = [
  ['date'=>'2025-05-15', 'type'=>'Blood Test', 'summary'=>'Normal ranges', 'file'=>'report1.pdf'],
  ['date'=>'2025-04-10', 'type'=>'X-Ray', 'summary'=>'No abnormalities', 'file'=>'report2.pdf'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Medical Reports</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        padding: 20px;
    }

    .reports-container {
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

    a {
        color: #007B5E;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
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
    <div class="reports-container">
        <h2>Medical Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Report Type</th>
                    <th>Summary</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reports as $rep): ?>
                <tr>
                    <td><?= htmlspecialchars($rep['date']) ?></td>
                    <td><?= htmlspecialchars($rep['type']) ?></td>
                    <td><?= htmlspecialchars($rep['summary']) ?></td>
                    <td><a href="reports/<?= urlencode($rep['file']) ?>" target="_blank">Download</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="back-btn" onclick="window.history.back()">Go Back</button>
    </div>
</body>

</html>