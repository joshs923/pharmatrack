<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $presc_id = $_POST["presc_id"];
    $patient_id = $_POST["patient_id"];
    $doc_id = $_POST["doc_id"];
    $med_id = $_POST["med_id"];
    $status = $_POST["status"];
    $date_presc = $_POST["date_presc"];
    $quantity = $_POST["quantity"];
    $refills = $_POST["refills"];

    $sql = "INSERT INTO Prescription 
    VALUES ($presc_id, '$status', '$date_presc', $quantity, $refills, $patient_id, $doc_id, $med_id)";

    if ($conn->query($sql)) {
        echo "Prescription added successfully.<br>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<p><a href="homepage.php">Back to Homepage</a></p>

<!DOCTYPE html>
<html>
<body>

<h2>Prescription Entry</h2>

<form method="post">
    Prescription ID: <input type="number" name="presc_id"><br>
    Patient ID: <input type="number" name="patient_id"><br>
    Doctor ID: <input type="number" name="doc_id"><br>
    Medicine ID: <input type="number" name="med_id"><br>
    Status: <input type="text" name="status"><br>
    Date: <input type="date" name="date_presc"><br>
    Quantity: <input type="number" name="quantity"><br>
    Refills: <input type="number" name="refills"><br>

    <input type="submit" value="Add">
</form>

</body>
</html>