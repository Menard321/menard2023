<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Page Buttons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f7f9;
      padding: 40px;
    }

    .button-container {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
      margin-top: 20px;
    }

    .btn {
      padding: 12px 20px;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      color: white;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .appointment-btn { background-color: #007BFF; }
    .appointment-btn:hover { background-color: #0056b3; }

    .prescription-btn { background-color: #28A745; }
    .prescription-btn:hover { background-color: #1e7e34; }

    .history-btn { background-color: #17A2B8; }
    .history-btn:hover { background-color: #117a8b; }

    .upload-btn { background-color: #FFC107; color: #333; }
    .upload-btn:hover { background-color: #e0a800; }

    .message-btn { background-color: #DC3545; }
    .message-btn:hover { background-color: #bd2130; }

    form { width: 100%; text-align: center; }

    .details {
      margin-top: 30px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      display: none;
    }

    .details form input,
    .details form textarea,
    .details form select {
      width: 100%;
      padding: 8px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .details form button {
      padding: 10px 16px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #007BFF;
      color: white;
    }
  </style>
  <script>
    function showDetails(id) {
      const sections = document.querySelectorAll('.details');
      sections.forEach(section => section.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }
  </script>
</head>
<body>

  <h2 style="text-align: center;">Doctor Dashboard</h2>

  <div class="button-container">
    <button onclick="showDetails('appointments')" class="btn appointment-btn">📅 View Appointments</button>
    <button onclick="showDetails('prescription')" class="btn prescription-btn">📝 Write Prescription</button>
    <button onclick="showDetails('history')" class="btn history-btn">📊 Patient History</button>
    <button onclick="showDetails('upload')" class="btn upload-btn">📁 Upload Reports</button>
    <button onclick="showDetails('message')" class="btn message-btn">💬 Message Patient</button>
  </div>

  <div id="appointments" class="details">
    <h3>Today's Appointments</h3>
    <table>
      <thead>
        <tr>
          <th>Time</th>
          <th>Patient Name</th>
          <th>Purpose</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>08:30 AM</td>
          <td>Menard john</td>
          <td>General Check-up</td>
        </tr>
        <tr>
          <td>09:15 AM</td>
          <td>Medrin</td>
          <td>Follow-up on Blood Pressure</td>
        </tr>
        <tr>
          <td>10:00 AM</td>
          <td>Mary</td>
          <td>Lab Results Review</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div id="prescription" class="details">
    <h3>Write Prescription</h3>
    <form>
      <label>Patient Name</label>
      <input type="text" placeholder="Enter patient name">
      <label>Medication</label>
      <input type="text" placeholder="Enter medication name">
      <label>Dosage</label>
      <input type="text" placeholder="e.g., 500mg twice a day">
      <label>Duration</label>
      <input type="text" placeholder="e.g., 5 days">
      <button type="submit">Submit Prescription</button>
    </form>
  </div>

  <div id="history" class="details">
    <h3>Patient History</h3>
    <table>
      <thead>
        <tr>
          <th>Joseph</th>
          <th>Diagnosis</th>
          <th>Last Visit</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Medrin</td>
          <td>Hypertension</td>
          <td>12/05/2025</td>
        </tr>
        <tr>
          <td>Mary</td>
          <td>Diabetes Follow-up</td>
          <td>25/04/2025</td>
        </tr>
        <tr>
          <td>Felix</td>
          <td>Chest X-ray Review</td>
          <td>15/03/2025</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div id="upload" class="details">
    <h3>Upload Reports</h3>
    <form>
      <label>Patient Name</label>
      <input type="text" placeholder="Enter patient name">
      <label>Report Title</label>
      <input type="text" placeholder="e.g., Blood Test Results">
      <label>Upload File</label>
      <input type="file">
      <button type="submit">Upload Report</button>
    </form>
  </div>

  <div id="message" class="details">
    <h3>Message Patient</h3>
    <form>
      <label>Patient Name</label>
      <input type="text" placeholder="Enter patient name">
      <label>Message</label>
      <textarea rows="5" placeholder="Type your message here..."></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>

</body>
</html>
