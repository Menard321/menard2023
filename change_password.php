<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Change Password</title>
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
        max-width: 400px;
        margin: auto;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input {
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

    .back-btn {
        margin-top: 10px;
        background: #aaa;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Change Password</h2>
        <form action="update_password.php" method="post">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required />

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required />

            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required />

            <button type="submit">Update Password</button>
        </form>

        <button class="back-btn" onclick="window.history.back()">Cancel</button>
    </div>
</body>

</html>