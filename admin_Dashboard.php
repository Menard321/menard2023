<script type="text/javascript">
    var gk_isXlsx = false;
    var gk_xlsxFileLookup = {};
    var gk_fileData = {};
    function filledCell(cell) {
      return cell !== '' && cell != null;
    }
    function loadFileData(filename) {
    if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
        try {
            var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
            var firstSheetName = workbook.SheetNames[0];
            var worksheet = workbook.Sheets[firstSheetName];

            // Convert sheet to JSON to filter blank rows
            var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
            // Filter out blank rows (rows where all cells are empty, null, or undefined)
            var filteredData = jsonData.filter(row => row.some(filledCell));

            // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
            var headerRowIndex = filteredData.findIndex((row, index) =>
              row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
            );
            // Fallback
            if (headerRowIndex === -1 || headerRowIndex > 25) {
              headerRowIndex = 0;
            }

            // Convert filtered JSON back to CSV
            var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
            csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
            return csv;
        } catch (e) {
            console.error(e);
            return "";
        }
    }
    return gk_fileData[filename] || "";
    }
    </script><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Health Management Admin Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="admin dashboard style.css" />
<style>
 
</style>
</head>
<body>
<div class="container">
<aside class="sidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li data-section="dashboard">Dashboard</li>
    <li data-section="patients">Patients</li>
    <li data-section="doctors">Doctors</li>
    <li data-section="appointments">Appointments</li>
    <li data-section="reports">Reports</li>
    <li data-section="general settings">General settings</li>
    <li data-section="hospital events">Hospital Events</li>
  </ul>
</aside>

<main class="main-content">
  <!-- Dashboard -->
  <section id="dashboard" class="section active">
    <h1>Admin Dashboard</h1>
    <div class="dashboard-grid">
      <div class="stat-card">
        <h3>Total Patients</h3>
        <p id="total-patients">0</p>
      </div>
      <div class="stat-card">
        <h3>Total Doctors</h3>
        <p id="total-doctors">0</p>
      </div>
      <div class="stat-card">
        <h3>Total Appointments</h3>
        <p id="total-appointments">0</p>
      </div>
      <div class="stat-card">
        <h3>Pending Appointments</h3>
        <p id="pending-appointments">0</p>
      </div>
      <div class="stat-card">
        <h3>Completed Appointments</h3>
        <p id="completed-appointments">0</p>
      </div>
    </div>

    <div class="quick-actions">
      <button class="action-btn save-btn" onclick="showPatientForm()">Add New Patient</button>
      <button class="action-btn save-btn" onclick="showDoctorForm()">Add New Doctor</button>
      <button class="action-btn save-btn" onclick="showAppointmentForm()">Schedule Appointment</button>
      <button class="action-btn save-btn" onclick="showSection('reports')">View Reports</button>
    </div>

    <div class="dashboard-section">
      <h2>Appointment Status</h2>
      <div class="chart-container">
        <canvas id="appointment-chart"></canvas>
      </div>
    </div>

    <div class="dashboard-section">
      <h2>Patient Age Distribution</h2>
      <div class="chart-container">
        <canvas id="age-chart"></canvas>
      </div>
    </div>

    <div class="dashboard-section">
      <h2>Recent Appointments</h2>
      <table class="data-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody id="recent-appointments"></tbody>
      </table>
    </div>

    <div class="dashboard-section">
      <h2>Recently Added Patients</h2>
      <table class="data-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone Number/Email</th>
          </tr>
        </thead>
        <tbody id="recent-patients"></tbody>
      </table>
    </div>
  </section>

  <!-- Patients Management -->
  <section id="patients" class="section">
    <h1>Manage Patients</h1>
    <button class="action-btn save-btn" onclick="showPatientForm()">Add New Patient</button>
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Phone number/email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="patients-table-body"></tbody>
    </table>

    <div class="data-form" id="patient-form" style="display: none;">
      <h2 id="patient-form-title">Add Patient</h2>
      <form id="patient-form-element">
        <input type="hidden" id="patient-id">
        <label for="patient-name">Name</label>
        <input type="text" id="patient-name" required>
        <label for="patient-age">Age</label>
        <input type="number" id="patient-age" min="0" max="150" required>
        <label for="patient-gender">Gender</label>
        <select id="patient-gender" required>
          <option value="" disabled selected>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
        <label for="patient-contact">Phone number/Email</label>
        <input type="phone number/Email" id="Phone number/Email" required>
        <div id="patient-error" class="error"></div>
        <button type="submit" class="save-btn">Save</button>
        <button type="button" class="cancel-btn" onclick="hidePatientForm()">Cancel</button>
      </form>
    </div>
  </section>

  <!-- Doctors Management -->
  <section id="doctors" class="section">
    <h1>Manage Doctors</h1>
    <button class="action-btn save-btn" onclick="showDoctorForm()">Add New Doctor</button>
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Specialization</th>
          <th>Phone Number/Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="doctors-table-body"></tbody>
    </table>

    <div class="data-form" id="doctor-form" style="display: none;">
      <h2 id="doctor-form-title">Add Doctor</h2>
      <form id="doctor-form-element">
        <input type="hidden" id="doctor-id">
        <label for="doctor-name">Name</label>
        <input type="text" id="doctor-name" required>
        <label for="doctor-specialization">Specialization</label>
        <select id="doctor-specialization" required>
          <option value="" disabled selected>Select Specialization</option>
          <option value="Cardiology">Cardiology</option>
          <option value="Neurology">Neurology</option>
          <option value="Pediatrics">Pediatrics</option>
          <option value="Orthopedics">Orthopedics</option>
          <option value="General">General</option>
        </select>
        <label for="doctor-contact">Phone Number/Email</label>
        <input type="phone number/Email" id="doctor-contact" required>
        <div id="doctor-error" class="error"></div>
        <button type="submit" class="save-btn">Save</button>
        <button type="button" class="cancel-btn" onclick="hideDoctorForm()">Cancel</button>
      </form>
    </div>
  </section>

  <!-- Appointments Management -->
  <section id="appointments" class="section">
    <h1>Appointments</h1>
    <button class="action-btn save-btn" onclick="showAppointmentForm()">Schedule Appointment</button>
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Doctor</th>
          <th>Date</th>
          <th>Time</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="appointments-table-body"></tbody>
    </table>

    <div class="data-form" id="appointment-form" style="display: none;">
      <h2 id="appointment-form-title">Schedule Appointment</h2>
      <form id="appointment-form-element">
        <input type="hidden" id="appointment-id">
        <label for="appointment-patient">Patient</label>
        <select id="appointment-patient" required>
          <option value="" disabled selected>Select Patient</option>
        </select>
        <label for="appointment-doctor">Doctor</label>
        <select id="appointment-doctor" required>
          <option value="" disabled selected>Select Doctor</option>
        </select>
        <label for="appointment-date">Date</label>
        <input type="date" id="appointment-date" required>
        <label for="appointment-time">Time</label>
        <input type="time" id="appointment-time" required>
        <label for="appointment-status">Status</label>
        <select id="appointment-status" required>
          <option value="Scheduled">Scheduled</option>
          <option value="Completed">Completed</option>
          <option value="Cancelled">Cancelled</option>
        </select>
        <div id="appointment-error" class="error"></div>
        <button type="submit" class="save-btn">Save</button>
        <button type="button" class="cancel-btn" onclick="hideAppointmentForm()">Cancel</button>
      </form>
    </div>
  </section>

  <!-- Reports Management -->
  <section id="reports" class="section">
    <h1>System Reports</h1>
    <div class="report-filter">
      <select id="report-doctor">
        <option value="">All Doctors</option>
      </select>
      <input type="date" id="report-start-date" placeholder="Start Date">
      <input type="date" id="report-end-date" placeholder="End Date">
      <button class="action-btn save-btn" onclick="generateReport()">Generate Report</button>
    </div>
    <div id="report-summary"></div>
    <table class="data-table">
      <thead>
        <tr>
          <th>Doctor</th>
          <th>Total Appointments</th>
          <th>Patients Seen</th>
          <th>Completed</th>
          <th>Cancelled</th>
        </tr>
      </thead>
      <tbody id="reports-table-body"></tbody>
    </table>
  </section>
</main>
</div>

<script>
// Mock Data
let patients = [
  { id: 1, name: "Ally Juma", age: 29, gender: "male", contact: "allyjuma@gmail.com" },
  { id: 2, name: "Rodrigo jr", age: 27, gender: "Male", contact: "Rodrijr@gmail.com" },
  { id: 3, name: "Medrin Kahaya", age: 23, gender: "Female", contact: "medrinkayaha@gmail.com" }
 
];

let doctors = [
  { id: 1, name: "Dr. Menard", specialization: "Cardiology", contact: "0747461880" },
  { id: 2, name: "Dr. Damas", specialization: "Neurology", contact: "0714377219" },
  { id: 3, name: "Dr. fagy", specialization: "Pediatrics", contact: "0746276324" }
];

let appointments = [
  { id: 1, patientId: 1, doctorId: 1, date: "2025-05-01", time: "10:00", status: "Scheduled" },
  { id: 2, patientId: 2, doctorId: 2, date: "2025-05-02", time: "14:00", status: "Completed" },
  { id: 3, patientId: 3, doctorId: 1, date: "2025-05-03", time: "09:00", status: "Scheduled" }
];

// Chart Instances
let appointmentChart = null;
let ageChart = null;

// Section Switching
document.querySelectorAll('.sidebar ul li').forEach(item => {
  item.addEventListener('click', () => {
    const sectionId = item.getAttribute('data-section');
    showSection(sectionId);
  });
});

function showSection(sectionId) {
  const sections = document.querySelectorAll('.section');
  sections.forEach(section => {
    section.classList.remove('active');
  });
  const activeSection = document.getElementById(sectionId);
  activeSection.classList.add('active');
  activeSection.scrollIntoView({ behavior: 'smooth' });
  if (sectionId === 'dashboard') {
    updateDashboard();
  }
}

// Dashboard Updates
function updateDashboard() {
  // Update Stats
  document.getElementById('total-patients').textContent = patients.length;
  document.getElementById('total-doctors').textContent = doctors.length;
  document.getElementById('total-appointments').textContent = appointments.length;
  document.getElementById('pending-appointments').textContent = appointments.filter(a => a.status === 'Scheduled').length;
  document.getElementById('completed-appointments').textContent = appointments.filter(a => a.status === 'Completed').length;

  // Update Recent Appointments
  const recentAppointments = appointments.slice(-5).reverse();
  const recentAppointmentsBody = document.getElementById('recent-appointments');
  recentAppointmentsBody.innerHTML = '';
  recentAppointments.forEach(appointment => {
    const patient = patients.find(p => p.id === appointment.patientId);
    const doctor = doctors.find(d => d.id === appointment.doctorId);
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${appointment.id}</td>
      <td>${patient ? patient.name : 'Unknown'}</td>
      <td>${doctor ? doctor.name : 'Unknown'}</td>
      <td>${appointment.date}</td>
      <td>${appointment.time}</td>
      <td>${appointment.status}</td>
    `;
    recentAppointmentsBody.appendChild(row);
  });

  // Update Recent Patients
  const recentPatients = patients.slice(-5).reverse();
  const recentPatientsBody = document.getElementById('recent-patients');
  recentPatientsBody.innerHTML = '';
  recentPatients.forEach(patient => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${patient.id}</td>
      <td>${patient.name}</td>
      <td>${patient.age}</td>
      <td>${patient.gender}</td>
      <td>${patient.contact}</td>
    `;
    recentPatientsBody.appendChild(row);
  });

  // Update Appointment Status Chart
  const appointmentStatus = {
    Scheduled: appointments.filter(a => a.status === 'Scheduled').length,
    Completed: appointments.filter(a => a.status === 'Completed').length,
    Cancelled: appointments.filter(a => a.status === 'Cancelled').length
  };

  if (appointmentChart) {
    appointmentChart.destroy();
  }
  appointmentChart = new Chart(document.getElementById('appointment-chart'), {
    type: 'pie',
    data: {
      labels: ['Scheduled', 'Completed', 'Cancelled'],
      datasets: [{
        data: [appointmentStatus.Scheduled, appointmentStatus.Completed, appointmentStatus.Cancelled],
        backgroundColor: ['#1abc9c', '#2ecc71', '#e74c3c'],
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });

  // Update Patient Age Distribution Chart
  const ageGroups = {
    '0-18': patients.filter(p => p.age <= 18).length,
    '19-35': patients.filter(p => p.age > 18 && p.age <= 35).length,
    '36-50': patients.filter(p => p.age > 35 && p.age <= 50).length,
    '51+': patients.filter(p => p.age > 50).length
  };

  if (ageChart) {
    ageChart.destroy();
  }
  ageChart = new Chart(document.getElementById('age-chart'), {
    type: 'bar',
    data: {
      labels: ['0-18', '19-35', '36-50', '51+'],
      datasets: [{
        label: 'Number of Patients',
        data: [ageGroups['0-18'], ageGroups['19-35'], ageGroups['36-50'], ageGroups['51+']],
        backgroundColor: '#1abc9c',
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Number of Patients'
          }
        },
        x: {
          title: {
            display: true,
            text: 'Age Group'
          }
        }
      }
    }
  });
}

// Patients Management
function renderPatients() {
  const tableBody = document.getElementById('patients-table-body');
  tableBody.innerHTML = '';
  patients.forEach(patient => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${patient.id}</td>
      <td>${patient.name}</td>
      <td>${patient.age}</td>
      <td>${patient.gender}</td>
      <td>${patient.contact}</td>
      <td>
        <button class="action-btn edit-btn" onclick="editPatient(${patient.id})">Edit</button>
        <button class="action-btn delete-btn" onclick="deletePatient(${patient.id})">Delete</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
  updateDashboard();
}

function showPatientForm(patient = null) {
  const form = document.getElementById('patient-form');
  const formTitle = document.getElementById('patient-form-title');
  const formElement = document.getElementById('patient-form-element');
  const idInput = document.getElementById('patient-id');
  const nameInput = document.getElementById('patient-name');
  const ageInput = document.getElementById('patient-age');
  const genderInput = document.getElementById('patient-gender');
  const contactInput = document.getElementById('patient-contact');
  const errorDiv = document.getElementById('patient-error');

  form.style.display = 'block';
  errorDiv.textContent = '';
  if (patient) {
    formTitle.textContent = 'Edit Patient';
    idInput.value = patient.id;
    nameInput.value = patient.name;
    ageInput.value = patient.age;
    genderInput.value = patient.gender;
    contactInput.value = patient.contact;
  } else {
    formTitle.textContent = 'Add Patient';
    idInput.value = '';
    nameInput.value = '';
    ageInput.value = '';
    genderInput.value = '';
    contactInput.value = '';
  }

  formElement.onsubmit = function (e) {
    e.preventDefault();
    const name = nameInput.value.trim();
    const age = parseInt(ageInput.value);
    const contact = contactInput.value.trim();

    // Basic Validation
    if (name.length < 2) {
      errorDiv.textContent = 'Name must be at least 2 characters long.';
      return;
    }
    if (age < 0 || age > 150) {
      errorDiv.textContent = 'Age must be between 0 and 150.';
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(contact)) {
      errorDiv.textContent = 'Please enter a valid email address.';
      return;
    }

    const id = idInput.value ? parseInt(idInput.value) : null;
    const newPatient = {
      id: id || patients.length + 1,
      name,
      age,
      gender: genderInput.value,
      contact
    };

    if (id) {
      const index = patients.findIndex(p => p.id === id);
      patients[index] = newPatient;
    } else {
      patients.push(newPatient);
    }

    renderPatients();
    populateAppointmentFormOptions();
    hidePatientForm();
  };
}

function hidePatientForm() {
  const form = document.getElementById('patient-form');
  form.style.display = 'none';
  document.getElementById('patient-form-element').reset();
  document.getElementById('patient-error').textContent = '';
}

function editPatient(id) {
  const patient = patients.find(p => p.id === id);
  if (patient) {
    showPatientForm(patient);
  }
}

function deletePatient(id) {
  if (confirm('Are you sure you want to delete this patient? This will also cancel their appointments.')) {
    patients = patients.filter(p => p.id !== id);
    appointments = appointments.filter(a => a.patientId !== id);
    renderPatients();
    renderAppointments();
    populateAppointmentFormOptions();
  }
}

// Doctors Management
function renderDoctors() {
  const tableBody = document.getElementById('doctors-table-body');
  tableBody.innerHTML = '';
  doctors.forEach(doctor => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${doctor.id}</td>
      <td>${doctor.name}</td>
      <td>${doctor.specialization}</td>
      <td>${doctor.contact}</td>
      <td>
        <button class="action-btn edit-btn" onclick="editDoctor(${doctor.id})">Edit</button>
        <button class="action-btn delete-btn" onclick="deleteDoctor(${doctor.id})">Delete</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
  updateDashboard();
}

function showDoctorForm(doctor = null) {
  const form = document.getElementById('doctor-form');
  const formTitle = document.getElementById('doctor-form-title');
  const formElement = document.getElementById('doctor-form-element');
  const idInput = document.getElementById('doctor-id');
  const nameInput = document.getElementById('doctor-name');
  const specializationInput = document.getElementById('doctor-specialization');
  const contactInput = document.getElementById('doctor-contact');
  const errorDiv = document.getElementById('doctor-error');

  form.style.display = 'block';
  errorDiv.textContent = '';
  if (doctor) {
    formTitle.textContent = 'Edit Doctor';
    idInput.value = doctor.id;
    nameInput.value = doctor.name;
    specializationInput.value = doctor.specialization;
    contactInput.value = doctor.contact;
  } else {
    formTitle.textContent = 'Add Doctor';
    idInput.value = '';
    nameInput.value = '';
    specializationInput.value = '';
    contactInput.value = '';
  }

  formElement.onsubmit = function (e) {
    e.preventDefault();
    const name = nameInput.value.trim();
    const contact = contactInput.value.trim();

    // Basic Validation
    if (name.length < 2) {
      errorDiv.textContent = 'Name must be at least 2 characters long.';
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(contact)) {
      errorDiv.textContent = 'Please enter a valid email address.';
      return;
    }

    const id = idInput.value ? parseInt(idInput.value) : null;
    const newDoctor = {
      id: id || doctors.length + 1,
      name,
      specialization: specializationInput.value,
      contact
    };

    if (id) {
      const index = doctors.findIndex(d => d.id === id);
      doctors[index] = newDoctor;
    } else {
      doctors.push(newDoctor);
    }

    renderDoctors();
    renderAppointments();
    populateAppointmentFormOptions();
    populateReportDoctorOptions();
    hideDoctorForm();
  };
}

function hideDoctorForm() {
  const form = document.getElementById('doctor-form');
  form.style.display = 'none';
  document.getElementById('doctor-form-element').reset();
  document.getElementById('doctor-error').textContent = '';
}

function editDoctor(id) {
  const doctor = doctors.find(d => d.id === id);
  if (doctor) {
    showDoctorForm(doctor);
  }
}

function deleteDoctor(id) {
  if (confirm('Are you sure you want to delete this doctor? This will also cancel their appointments.')) {
    doctors = doctors.filter(d => d.id !== id);
    appointments = appointments.filter(a => a.doctorId !== id);
    renderDoctors();
    renderAppointments();
    populateAppointmentFormOptions();
    populateReportDoctorOptions();
  }
}

// Appointments Management
function renderAppointments() {
  const tableBody = document.getElementById('appointments-table-body');
  tableBody.innerHTML = '';
  appointments.forEach(appointment => {
    const patient = patients.find(p => p.id === appointment.patientId);
    const doctor = doctors.find(d => d.id === appointment.doctorId);
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${appointment.id}</td>
      <td>${patient ? patient.name : 'Unknown'}</td>
      <td>${doctor ? doctor.name : 'Unknown'}</td>
      <td>${appointment.date}</td>
      <td>${appointment.time}</td>
      <td>${appointment.status}</td>
      <td>
        <button class="action-btn edit-btn" onclick="editAppointment(${appointment.id})">Edit</button>
        <button class="action-btn delete-btn" onclick="deleteAppointment(${appointment.id})">Cancel</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
  updateDashboard();
}

function populateAppointmentFormOptions() {
  const patientSelect = document.getElementById('appointment-patient');
  const doctorSelect = document.getElementById('appointment-doctor');
  patientSelect.innerHTML = '<option value="" disabled selected>Select Patient</option>';
  doctorSelect.innerHTML = '<option value="" disabled selected>Select Doctor</option>';

  patients.forEach(patient => {
    const option = document.createElement('option');
    option.value = patient.id;
    option.textContent = patient.name;
    patientSelect.appendChild(option);
  });

  doctors.forEach(doctor => {
    const option = document.createElement('option');
    option.value = doctor.id;
    option.textContent = doctor.name;
    doctorSelect.appendChild(option);
  });
}

function showAppointmentForm(appointment = null) {
  const form = document.getElementById('appointment-form');
  const formTitle = document.getElementById('appointment-form-title');
  const formElement = document.getElementById('appointment-form-element');
  const idInput = document.getElementById('appointment-id');
  const patientSelect = document.getElementById('appointment-patient');
  const doctorSelect = document.getElementById('appointment-doctor');
  const dateInput = document.getElementById('appointment-date');
  const timeInput = document.getElementById('appointment-time');
  const statusSelect = document.getElementById('appointment-status');
  const errorDiv = document.getElementById('appointment-error');

  form.style.display = 'block';
  errorDiv.textContent = '';
  if (appointment) {
    formTitle.textContent = 'Edit Appointment';
    idInput.value = appointment.id;
    patientSelect.value = appointment.patientId;
    doctorSelect.value = appointment.doctorId;
    dateInput.value = appointment.date;
    timeInput.value = appointment.time;
    statusSelect.value = appointment.status;
  } else {
    formTitle.textContent = 'Schedule Appointment';
    idInput.value = '';
    patientSelect.value = '';
    doctorSelect.value = '';
    dateInput.value = '';
    timeInput.value = '';
    statusSelect.value = 'Scheduled';
  }

  formElement.onsubmit = function (e) {
    e.preventDefault();
    const patientId = parseInt(patientSelect.value);
    const doctorId = parseInt(doctorSelect.value);
    const date = dateInput.value;
    const time = timeInput.value;

    // Basic Validation
    if (!patientId || !patients.find(p => p.id === patientId)) {
      errorDiv.textContent = 'Please select a valid patient.';
      return;
    }
    if (!doctorId || !doctors.find(d => d.id === doctorId)) {
      errorDiv.textContent = 'Please select a valid doctor.';
      return;
    }
    const today = new Date().toISOString().split('T')[0];
    if (date < today) {
      errorDiv.textContent = 'Appointment date cannot be in the past.';
      return;
    }

    const id = idInput.value ? parseInt(idInput.value) : null;
    const newAppointment = {
      id: id || appointments.length + 1,
      patientId,
      doctorId,
      date,
      time,
      status: statusSelect.value
    };

    if (id) {
      const index = appointments.findIndex(a => a.id === id);
      appointments[index] = newAppointment;
    } else {
      appointments.push(newAppointment);
    }

    renderAppointments();
    hideAppointmentForm();
  };
}

function hideAppointmentForm() {
  const form = document.getElementById('appointment-form');
  form.style.display = 'none';
  document.getElementById('appointment-form-element').reset();
  document.getElementById('appointment-error').textContent = '';
}

function editAppointment(id) {
  const appointment = appointments.find(a => a.id === id);
  if (appointment) {
    showAppointmentForm(appointment);
  }
}

function deleteAppointment(id) {
  if (confirm('Are you sure you want to cancel this appointment?')) {
    appointments = appointments.filter(a => a.id !== id);
    renderAppointments();
  }
}

// Reports Management
function populateReportDoctorOptions() {
  const doctorSelect = document.getElementById('report-doctor');
  doctorSelect.innerHTML = '<option value="">All Doctors</option>';
  doctors.forEach(doctor => {
    const option = document.createElement('option');
    option.value = doctor.id;
    option.textContent = doctor.name;
    doctorSelect.appendChild(option);
  });
}

function generateReport() {
  const doctorId = document.getElementById('report-doctor').value;
  const startDate = document.getElementById('report-start-date').value;
  const endDate = document.getElementById('report-end-date').value;

  let filteredAppointments = appointments;
  if (doctorId) {
    filteredAppointments = filteredAppointments.filter(a => a.doctorId === parseInt(doctorId));
  }
  if (startDate) {
    filteredAppointments = filteredAppointments.filter(a => a.date >= startDate);
  }
  if (endDate) {
    filteredAppointments = filteredAppointments.filter(a => a.date <= endDate);
  }

  const summary = {
    totalAppointments: filteredAppointments.length,
    patientsSeen: new Set(filteredAppointments.map(a => a.patientId)).size,
    completed: filteredAppointments.filter(a => a.status === 'Completed').length,
    cancelled: filteredAppointments.filter(a => a.status === 'Cancelled').length
  };

  const tableBody = document.getElementById('reports-table-body');
  tableBody.innerHTML = '';
  const doctorGroups = doctorId
    ? [{ id: parseInt(doctorId), appointments: filteredAppointments }]
    : doctors.map(doctor => ({
        id: doctor.id,
        appointments: filteredAppointments.filter(a => a.doctorId === doctor.id)
      }));

  doctorGroups.forEach(group => {
    if (group.appointments.length > 0) {
      const doctor = doctors.find(d => d.id === group.id);
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${doctor ? doctor.name : 'Unknown'}</td>
        <td>${group.appointments.length}</td>
        <td>${new Set(group.appointments.map(a => a.patientId)).size}</td>
        <td>${group.appointments.filter(a => a.status === 'Completed').length}</td>
        <td>${group.appointments.filter(a => a.status === 'Cancelled').length}</td>
      `;
      tableBody.appendChild(row);
    }
  });

  const summaryDiv = document.getElementById('report-summary');
  summaryDiv.innerHTML = `
    <h3>Report Summary</h3>
    <p>Total Appointments: ${summary.totalAppointments}</p>
    <p>Unique Patients Seen: ${summary.patientsSeen}</p>
    <p>Completed Appointments: ${summary.completed}</p>
    <p>Cancelled Appointments: ${summary.cancelled}</p>
  `;
}

// Initial Render
renderPatients();
renderDoctors();
renderAppointments();
populateAppointmentFormOptions();
populateReportDoctorOptions();
updateDashboard();
</script>
</body>
</html>