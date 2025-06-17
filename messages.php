<?php
session_start();
$patient_id = $_SESSION['patient_id'] ?? 1;

// TODO: Connect to DB and fetch messages for patient
$messages = [
  ['from'=>'Dr. Alice Smith', 'subject'=>'Follow-up', 'date'=>'2025-06-10', 'content'=>'Please remember to take your medication.'],
  ['from'=>'Reception', 'subject'=>'Appointment Reminder', 'date'=>'2025-06-12', 'content'=>'Your appointment is scheduled for June 20th.'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Messages</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        padding: 20px;
    }

    .messages-container {
        max-width: 700px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
    }

    .message {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        cursor: pointer;
    }

    .message:hover {
        background: #f1f1f1;
    }

    .subject {
        font-weight: bold;
        color: #007B5E;
    }

    .from,
    .date {
        font-size: 0.9em;
        color: #555;
    }

    .content {
        margin-top: 8px;
        display: none;
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
    <script>
    function toggleContent(id) {
        var content = document.getElementById(id);
        if (content.style.display === "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }
    </script>
</head>

<body>
    <div class="messages-container">
        <h2>Messages</h2>
        <?php foreach($messages as $index => $msg): ?>
        <div class="message" onclick="toggleContent('msg<?= $index ?>')">
            <div class="subject"><?= htmlspecialchars($msg['subject']) ?></div>
            <div class="from">From: <?= htmlspecialchars($msg['from']) ?></div>
            <div class="date">Date: <?= htmlspecialchars($msg['date']) ?></div>
            <div id="msg<?= $index ?>" class="content"><?= nl2br(htmlspecialchars($msg['content'])) ?></div>
        </div>
        <?php endforeach; ?>
        <button class="back-btn" onclick="window.history.back()">Go Back</button>
    </div>
</body>

</html>