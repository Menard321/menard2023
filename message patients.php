<?php
// Dummy patient list – in production, fetch from database
$patients = [
    ['id' => 'P001', 'name' => 'Anna Peter'],
    ['id' => 'P002', 'name' => 'Michael John']
];

// Optional: Dummy messages previously sent (replace with DB retrieval)
$sentMessages = [
    ['patient' => 'Anna Peter', 'subject' => 'Checkup Reminder', 'body' => 'Please come in for a follow-up.', 'date' => '2025-06-15'],
    ['patient' => 'Michael John', 'subject' => 'Lab Result', 'body' => 'Your lab results are ready.', 'date' => '2025-06-14']
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Send Message to Patient</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f6f9;
        padding: 20px;
    }

    .form-container {
        max-width: 700px;
        margin: auto;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #007B5E;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    button {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background: #007B5E;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #005f45;
    }

    .messages {
        margin-top: 40px;
    }

    .message-item {
        background: #f0f0f0;
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .message-item strong {
        color: #007B5E;
    }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Send Message to Patient</h2>
        <form action="send_message.php" method="POST">
            <label for="patient_id">Select Patient:</label>
            <select name="patient_id" id="patient_id" required>
                <option value="">-- Select Patient --</option>
                <?php foreach ($patients as $patient): ?>
                <option value="<?= htmlspecialchars($patient['id']) ?>">
                    <?= htmlspecialchars($patient['id'] . ' - ' . $patient['name']) ?>
                </option>
                <?php endforeach; ?>
            </select>

            <label for="subject">Message Subject (Optional):</label>
            <input type="text" name="subject" id="subject" placeholder="e.g. Test Results">

            <label for="message">Message:</label>
            <textarea name="message" id="message" placeholder="Type your message here..." required></textarea>

            <button type="submit">Send Message</button>
        </form>

        <!-- Optional Message History -->
        <div class="messages">
            <h3>📬 Sent Messages</h3>
            <?php foreach ($sentMessages as $msg): ?>
            <div class="message-item">
                <strong><?= htmlspecialchars($msg['patient']) ?></strong><br>
                <em><?= htmlspecialchars($msg['subject']) ?></em><br>
                <p><?= htmlspecialchars($msg['body']) ?></p>
                <small>Date: <?= htmlspecialchars($msg['date']) ?></small>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>