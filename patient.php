<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Page Buttons</title>
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

    .edit-btn { background-color: #007BFF; }
    .edit-btn:hover { background-color: #0056b3; }

    .add-btn { background-color: #28A745; }
    .add-btn:hover { background-color: #1e7e34; }

    .report-btn { background-color: #17A2B8; }
    .report-btn:hover { background-color: #117a8b; }

    .appointment-btn {
      background-color: #FFC107;
      color: #333;
    }
    .appointment-btn:hover { background-color: #e0a800; }

    .discharge-btn { background-color: #DC3545; }
    .discharge-btn:hover { background-color: #bd2130; }

    .form-container {
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: none;
    }

    .form-container.active {
      display: block;
    }

    .form-container h3 {
      margin-bottom: 15px;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .form-group textarea {
      resize: vertical;
      height: 100px;
    }

    .form-group input[type="file"] {
      padding: 3px;
    }

    .submit-btn {
      background-color: #28A745;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 6px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <h2 style="text-align: center;">Patient Actions</h2>

  <div class="button-container">
    <button class="btn edit-btn" onclick="showForm('edit')">✏️ Edit Profile</button>
    <button class="btn add-btn" onclick="showForm('add')">➕ Add Record</button>
    <button class="btn report-btn" onclick="showForm('report')">📄 View Reports</button>
    <button class="btn appointment-btn" onclick="showForm('appointment')">📅 Schedule Appointment</button>
    <button class="btn discharge-btn" onclick="showForm('discharge')">🚪 Discharge Patient</button>
  </div>

  <div id="edit" class="form-container">
    <h3>Edit Profile</h3>
    <form>
      <!-- Example fields for editing profile -->
      <div class="form-group">
        <label for="patient-name">Patient Name</label>
        <input type="text" id="patient-name" name="patient-name" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>
      </div>
      <button type="submit" class="submit-btn">Save Changes</button>
    </form>
  </div>

  <div id="add" class="form-container">
    <h3>Add Medical Record</h3>
    <form>
      <div class="form-group">
        <label for="record-date">Date of Record</label>
        <input type="date" id="record-date" name="record-date" required>
      </div>
      <div class="form-group">
        <label for="record-type">Record Type</label>
        <select id="record-type" name="record-type" required>
          <option value="Diagnosis">Diagnosis</option>
          <option value="Prescription">Prescription</option>
          <option value="Lab Test">Lab Test</option>
          <option value="Progress Note">Progress Note</option>
        </select>
      </div>
      <div class="form-group">
        <label for="record-details">Details / Description</label>
        <textarea id="record-details" name="record-details" required></textarea>
      </div>
      <div class="form-group">
        <label for="doctor-name">Doctor's Name</label>
        <input type="text" id="doctor-name" name="doctor-name" required>
      </div>
      <div class="form-group">
        <label for="attachment">Attachment (optional)</label>
        <input type="file" id="attachment" name="attachment">
      </div>
      <button type="submit" class="submit-btn">Save Record</button>
    </form>
  </div>

  <div id="report" class="form-container">
    <h3>View Reports</h3>
    <form>
      <div class="form-group">
        <label for="report-search">Enter Patient ID or Name</label>
        <input type="text" id="report-search" name="report-search" required>
      </div>
      <button type="submit" class="submit-btn">Search Reports</button>
    </form>
  </div>

  <div id="appointment" class="form-container">
    <h3>Schedule Appointment</h3>
    <form>
      <div class="form-group">
        <label for="appointment-date">Appointment Date</label>
        <input type="date" id="appointment-date" name="appointment-date" required>
      </div>
      <div class="form-group">
        <label for="appointment-time">Time</label>
        <input type="time" id="appointment-time" name="appointment-time" required>
      </div>
      <div class="form-group">
        <label for="appointment-notes">Notes</label>
        <textarea id="appointment-notes" name="appointment-notes"></textarea>
      </div>
      <button type="submit" class="submit-btn">Schedule</button>
    </form>
  </div>

  <div id="discharge" class="form-container">
    <h3>Discharge Patient</h3>
    <form>
      <div class="form-group">
        <label for="discharge-summary">Discharge Summary</label>
        <textarea id="discharge-summary" name="discharge-summary" required></textarea>
      </div>
      <div class="form-group">
        <label for="discharge-date">Discharge Date</label>
        <input type="date" id="discharge-date" name="discharge-date" required>
      </div>
      <button type="submit" class="submit-btn">Confirm Discharge</button>
    </form>
  </div>

  <script>
    function showForm(id) {
      const forms = document.querySelectorAll('.form-container');
      forms.forEach(form => form.classList.remove('active'));
      document.getElementById(id).classList.add('active');
    }
  </script>

</body>
</html>
