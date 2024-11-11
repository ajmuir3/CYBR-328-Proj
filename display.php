<?php
include 'conn.php';

echo "<a href='welcome.html'><button>Back to welcome.html</button></a>";
echo "<a href='login.html'><button>Back to login.html</button></a>";

// Function to display results in a table
function displayTable($result, $tableName, $headers, $keys) {
    if ($result->num_rows > 0) {
        echo "<h1>$tableName</h1>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";

        // Display column headers
        foreach ($headers as $header) {
            echo "<th>$header</th>";
        }

        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Loop through the rows and display them
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($keys as $key) {
                echo "<td>" . htmlspecialchars($row[$key]) . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<h1>$tableName</h1>";
        echo "<p>No results found.</p>";
    }
}

// Fetch and display Users table
$sql = "SELECT id, username, email, password, ssn_last4 FROM users";
$result = $conn->query($sql);
displayTable($result, "Users", ["ID", "Name", "Email", "Password", "Last 4 SSN"], ["id", "username", "email", "password", "ssn_last4"]);

// Fetch and display Friends table
$sql = "SELECT id, name, email, phone FROM friends"; // Ensure this query is correct
$result = $conn->query($sql); // Fetch the result again for the Friends table
displayTable($result, "Friends", ["ID", "Name", "Email", "Phone"], ["id", "name", "email", "phone"]);

// Close the connection
$conn->close();
?>
