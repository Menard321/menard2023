<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Book Appointment</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f5;
        padding: 20px;
    }

    .form-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 500px;
        margin: auto;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    select,
    input,
    textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    button {
        margin-top: 15px;
        padding: 10px 20px;
        background: #007B5E;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background: #005f45;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Book Appointment</h2>
        <form action="submit_appointment.php" method="post">
            <label for="doctor">Select Doctor:</label>
            <select id="doctor" name="doctor_id" required>
                <option value="">--Choose Doctor--</option>
                <option value="1">Dr. Alice Smith (Cardiology)</option>
                <option value="2">Dr. Bob Johnson (Dermatology)</option>
                <!-- Populate dynamically from DB -->
            </select>

            <label for="date">Select Date:</label>
            <input type="date" id="date" name="appointment_date" required />

            <label for="time">Select Time:</label>
            <input type="time" id="time" name="appointment_time" required />

            <label for="reason">Reason for Appointment:</label>
            <textarea id="reason" name="reason" rows="3" placeholder="Describe your issue..." required></textarea>

            <button type="submit">Book Now</button>
        </form>

        <button onclick="window.history.back()" style="margin-top: 15px;">Cancel</button>
    </div>
</body>

</html>