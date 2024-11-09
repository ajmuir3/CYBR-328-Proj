<?php

include 'conn.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Start the table for users
    echo "<h1>Users</h1>"
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<thead>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Last 4 SSN</th></tr>";  // Column headers (adjust as per your table)
    echo "</thead>";
    echo "<tbody>";

    // Loop through the rows and display them
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";     
        echo "<td>" . $row["username"] . "</td>";  
        echo "<td>" . $row["email"] . "</td>";   
        echo "<td>" . $row["password"] . "</td>";    
        echo "<td>" . $row["ssn_last4"] . "</td>";  
        echo "</tr>";
    }

    // End the table
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results found";
}

$sql = "SELECT * FROM friends";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Start the table for users
    echo "<h1>Friends</h1>"
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<thead>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>";  // Column headers (adjust as per your table)
    echo "</thead>";
    echo "<tbody>";

    // Loop through the rows and display them
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";     
        echo "<td>" . $row["username"] . "</td>";  
        echo "<td>" . $row["email"] . "</td>";   
        echo "<td>" . $row["phone"] . "</td>";     
        echo "</tr>";
    }

    // End the table
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results found";
}

// Close the connection
$conn->close();
?>
