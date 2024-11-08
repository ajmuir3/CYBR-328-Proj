<?php
// Database connection parameters
$host = 'cybr-328-rds.cj24gusco7ni.us-east-2.rds.amazonaws.com';  // RDS endpoint
$dbname = 'CYBR328';
$username = 'admin';
$password = 'CYBR328password';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve form data
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $ssn_last4 = $_POST['ssn'];
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, email, password, ssn_last4) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $user, $email, $pass, $ssn_last4);

// Execute the query
if ($stmt->execute()) {
    echo "Registration successful!";
    echo "<a href='login.html'><button>Back</button></a>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
