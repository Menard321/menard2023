<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Settings Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f7f9;
      padding: 40px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .button-container {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
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

    .staff-btn { background-color: #007BFF; }
    .staff-btn:hover { background-color: #0056b3; }

    .departments-btn { background-color: #28A745; }
    .departments-btn:hover { background-color: #1e7e34; }

    .inventory-btn { background-color: #17A2B8; }
    .inventory-btn:hover { background-color: #117a8b; }

    .appointment-settings-btn { background-color: #FFC107; color: #333; }
    .appointment-settings-btn:hover { background-color: #e0a800; }

    .access-control-btn { background-color: #DC3545; }
    .access-control-btn:hover { background-color: #bd2130; }

    form {
      width: 100%;
      max-width: 700px;
      margin: 30px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      display: none;
    }

    form.active {
      display: block;
    }

    form label {
      display: block;
      margin-top: 15px;
    }

    form input, form select, form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    form button {
      margin-top: 20px;
      padding: 10px 16px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
  <script>
    function showForm(id) {
      const forms = document.querySelectorAll('form');
      forms.forEach(f => f.classList.remove('active'));
      document.getElementById(id).classList.add('active');
    }
  </script>
</head>
<body>

  <h2>Hospital Settings Dashboard</h2>

  <div class="button-container">
    <button onclick="showForm('staffForm')" class="btn staff-btn">👥 Manage Staff</button>
    <button onclick="showForm('departmentsForm')" class="btn departments-btn">🏢 Manage Departments</button>
    <button onclick="showForm('inventoryForm')" class="btn inventory-btn">💊 Inventory Management</button>
    <button onclick="showForm('appointmentForm')" class="btn appointment-settings-btn">📆 Appointment Settings</button>
    <button onclick="showForm('accessForm')" class="btn access-control-btn">🔐 User Access Control</button>
  </div>

  <form id="staffForm">
    <h3>Manage Staff</h3>
    <label>Full Name</label>
    <input type="text" placeholder="Enter full name">
    <label>Role</label>
    <select>
      <option>Doctor</option>
      <option>Nurse</option>
      <option>Administrator</option>
    </select>
    <label>Department</label>
    <input type="text" placeholder="Enter department">
    <label>Availability</label>
    <input type="text" placeholder="e.g., Mon-Fri 8am-4pm">
    <button type="submit">Save Staff</button>
  </form>

  <form id="departmentsForm">
    <h3>Manage Departments</h3>
    <label>Department Name</label>
    <input type="text" placeholder="e.g., Cardiology">
    <label>Head of Department</label>
    <input type="text" placeholder="Enter full name">
    <label>Operational Hours</label>
    <input type="text" placeholder="e.g., 24/7 or Mon-Fri 9am-5pm">
    <button type="submit">Save Department</button>
  </form>

  <form id="inventoryForm">
    <h3>Inventory Management</h3>
    <label>Item Name</label>
    <input type="text" placeholder="e.g., Paracetamol">
    <label>Quantity</label>
    <input type="number" placeholder="e.g., 200">
    <label>Supplier</label>
    <input type="text" placeholder="Enter supplier name">
    <label>Reorder Threshold</label>
    <input type="number" placeholder="e.g., 50">
    <button type="submit">Update Inventory</button>
  </form>

  <form id="appointmentForm">
    <h3>Appointment Scheduling Settings</h3>
    <label>Interval Between Appointments</label>
    <input type="text" placeholder="e.g., 15 minutes">
    <label>Doctor Availability</label>
    <textarea placeholder="Describe doctor availability settings..."></textarea>
    <label>Holidays / Closed Days</label>
    <input type="text" placeholder="e.g., Sundays, Public Holidays">
    <button type="submit">Save Settings</button>
  </form>

  <form id="accessForm">
    <h3>User Access Control</h3>
    <label>User Role</label>
    <select>
      <option>Doctor</option>
      <option>Nurse</option>
      <option>Admin</option>
    </select>
    <label>Permissions</label>
    <textarea placeholder="Define permissions for the role..."></textarea>
    <label>2-Factor Authentication</label>
    <select>
      <option>Enabled</option>
      <option>Disabled</option>
    </select>
    <button type="submit">Update Access Control</button>
  </form>

</body>
</html>
