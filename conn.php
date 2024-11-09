<?php
// Database connection parameters
$host = 'cybr-328-rds.cj24gusco7ni.us-east-2.rds.amazonaws.com';  // RDS endpoint
$dbname = 'CYBR328';
$username = 'admin';
$password = 'CYBR328password';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

return $conn;
?>
