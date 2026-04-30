<?php
include "db.php";

$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];

    $stmt = $conn->prepare("SELECT patient_id, first_name, last_name, phone, DOB, email, insurance_provider
                            FROM Patient
                            WHERE first_name = ?
                            AND last_name = ?");

    $stmt->bind_param("ss", $first_name, $last_name);
    $stmt->execute();

    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection Demo - Secure</title>
</head>
<body>

<h1>PharmaTrack</h1>
<h2>Patient Search - Prepared Statement Version</h2>

<p><a href="homepage.php">Back to Homepage</a></p>

<form method="post">
    First Name: <input type="text" name="first_name"><br>
    Last Name: <input type="text" name="last_name"><br><br>
    <input type="submit" value="Search">
    <input type="reset" value="Clear">
</form>

<p>This version uses a prepared statement with placeholders.</p>

<?php
if ($result && $result->num_rows > 0) {
    echo "<h3>Results</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Patient ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Insurance</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["patient_id"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["DOB"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["insurance_provider"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>No matching patient found.</p>";
}
?>

</body>
</html>