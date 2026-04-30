<?php
include "db.php";

$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST["patient_id"];

    $sql = "SELECT * FROM Patient WHERE patient_id = $patient_id";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Lookup</title>
    <link rel="stylesheet" href="ui_format.css">
</head>
<body>

<div class="container">

<p><a href="homepage.php">Back to Homepage</a></p>

<h2>Patient Lookup</h2>

<form method="post">
    Patient ID: <input type="number" name="patient_id">
    <input type="submit" value="Search">
</form>

<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
        echo "Email: " . $row["email"] . "<br><br>";
    }
}
?>

</div>

</body>
</html>
