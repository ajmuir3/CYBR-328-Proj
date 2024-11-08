<?php
// Database connection parameters
$host = 'your-rds-endpoint';  // RDS endpoint
$dbname = 'your-database-name';
$username = 'your-database-username';
$password = 'your-database-password';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$user = $_POST['username'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password for security
$ssn_last4 = $_POST['ssn'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, email, password, ssn_last4) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $user, $email, $pass, $ssn_last4);

// Execute the query
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
