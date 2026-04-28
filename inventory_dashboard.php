<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $med_id = $_POST["med_id"];

    if ($action == "add") {
        $ndc_code = $_POST["ndc_code"];
        $med_name = $_POST["med_name"];
        $strength = $_POST["strength"];
        $dosage_form = $_POST["dosage_form"];

        $sql = "INSERT INTO Medicine VALUES ($med_id, '$ndc_code', '$med_name', '$strength', '$dosage_form')";

        if ($conn->query($sql)) {
            $message = "Medicine added.";
        } else {
            $message = "Error: " . $conn->error;
        }
    }

    if ($action == "update") {
        $med_name = $_POST["med_name"];
        $strength = $_POST["strength"];
        $dosage_form = $_POST["dosage_form"];

        $sql = "UPDATE Medicine 
                SET med_name='$med_name', strength='$strength', dosage_form='$dosage_form'
                WHERE med_id=$med_id";

        if ($conn->query($sql)) {
            $message = "Medicine updated.";
        } else {
            $message = "Error: " . $conn->error;
        }
    }

    if ($action == "delete") {
        $sql = "DELETE FROM Medicine WHERE med_id=$med_id";

        if ($conn->query($sql)) {
            $message = "Medicine deleted.";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}

$result = $conn->query("SELECT * FROM Medicine");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Dashboard</title>
</head>
<body>

<h1>PharmaTrack</h1>
<h2>Inventory Dashboard</h2>

<p><a href="homepage.php">Back to Homepage</a></p>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="post">
    Action:
    <select name="action">
        <option value="add">Add Medicine</option>
        <option value="update">Update Medicine</option>
        <option value="delete">Delete Medicine</option>
    </select><br><br>

    Medicine ID: <input type="number" name="med_id" required><br>
    NDC Code: <input type="text" name="ndc_code"><br>
    Medicine Name: <input type="text" name="med_name"><br>
    Strength: <input type="text" name="strength"><br>
    Dosage Form: <input type="text" name="dosage_form"><br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Clear">
</form>

<h3>Current Medicine Records</h3>

<table border="1">
<tr>
    <th>Medicine ID</th>
    <th>NDC Code</th>
    <th>Medicine Name</th>
    <th>Strength</th>
    <th>Dosage Form</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["med_id"] . "</td>";
    echo "<td>" . $row["ndc_code"] . "</td>";
    echo "<td>" . $row["med_name"] . "</td>";
    echo "<td>" . $row["strength"] . "</td>";
    echo "<td>" . $row["dosage_form"] . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>