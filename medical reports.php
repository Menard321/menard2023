<?php
// write_report.php
// In a real app, fetch patient list from the database:
$patients = [
    ['id' => 'P001', 'name' => 'Jane Smith'],
    ['id' => 'P002', 'name' => 'John Doe'],
    // …more patients…
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Write Medical Report</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7f8;
        padding: 20px;
    }

    .form-container {
        max-width: 600px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #007B5E;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
    }

    select,
    input,
    textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    input[type="file"] {
        padding: 3px;
    }

    button {
        margin-top: 20px;
        width: 100%;
        padding: 10px;
        background: #007B5E;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background: #005f45;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #007B5E;
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Write Medical Report</h2>
        <form action="save_report.php" method="post" enctype="multipart/form-data">

            <label for="patient_id">Select Patient:</label>
            <select id="patient_id" name="patient_id" required>
                <option value="">--Select Patient--</option>
                <?php foreach($patients as $p): ?>
                <option value="<?= htmlspecialchars($p['id']) ?>">
                    <?= htmlspecialchars($p['id'] . ' – ' . $p['name']) ?>
                </option>
                <?php endforeach; ?>
            </select>

            <label for="report_date">Report Date:</label>
            <input type="date" id="report_date" name="report_date" required>

            <label for="symptoms">Symptoms:</label>
            <textarea id="symptoms" name="symptoms" rows="3" placeholder="Enter symptoms..." required></textarea>

            <label for="diagnosis">Diagnosis:</label>
            <textarea id="diagnosis" name="diagnosis" rows="3" placeholder="Enter diagnosis..." required></textarea>

            <label for="treatment">Treatment Prescribed:</label>
            <textarea id="treatment" name="treatment" rows="3" placeholder="Enter treatment..." required></textarea>

            <label for="lab_results">Lab Results:</label>
            <input type="file" id="lab_results" name="lab_results" accept=".pdf,.jpg,.png,.doc,.docx">

            <label for="follow_up">Follow-up Notes:</label>
            <textarea id="follow_up" name="follow_up" rows="3" placeholder="Enter follow-up notes..."></textarea>

            <button type="submit">Save Report</button>
        </form>

        <a href="doctor_dashboard.php" class="back-link">← Back to Dashboard</a>
    </div>

</body>

</html>