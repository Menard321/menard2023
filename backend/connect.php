<?php
// $username = $_POST['username'];
// $password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    // Insert into login table
    // $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
    // $stmt->bind_param("ss", $username, $password);
    // $stmt->execute();

    echo "Login successfully...";
    
    // $stmt->close();
    // $conn->close();
}
?>
