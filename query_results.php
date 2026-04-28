<?php
include "db.php";

$sql = "SELECT p.presc_id, p.status, p.date_presc, p.quantity, p.refills,
               pt.first_name, pt.last_name, m.med_name
        FROM Prescription p
        JOIN Patient pt ON p.patient_id = pt.patient_id
        JOIN Medicine m ON p.med_id = m.med_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Query Results</title>
</head>
<body>

<h1>PharmaTrack</h1>
<h2>Query Results</h2>

<p><a href="homepage.php">Back to Homepage</a></p>

<table border="1">
<tr>
    <th>Prescription ID</th>
    <th>Patient</th>
    <th>Medicine</th>
    <th>Status</th>
    <th>Date</th>
    <th>Quantity</th>
    <th>Refills</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["presc_id"] . "</td>";
    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
    echo "<td>" . $row["med_name"] . "</td>";
    echo "<td>" . $row["status"] . "</td>";
    echo "<td>" . $row["date_presc"] . "</td>";
    echo "<td>" . $row["quantity"] . "</td>";
    echo "<td>" . $row["refills"] . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>