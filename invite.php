<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve form data
    $user = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO friends (name, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("ssss", $user, $email, $phone);

// Execute the query
if ($stmt->execute()) {
    header("Location: welcome.html");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
