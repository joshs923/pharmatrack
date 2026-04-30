<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $supp_id = $_POST["supp_id"];
    $med_id = $_POST["med_id"];
    $cost = $_POST["cost"];
    $lead_time = $_POST["lead_time"];

    
    if ($action == "add") {
        $sql = "INSERT INTO Supply VALUES ($supp_id, $med_id, $cost, $lead_time)";

        if ($conn->query($sql)) {
            $message = "Supply record added.";
        } else {
            // Failed addition for some reason (SUPPLY). Output error
            $message = "Error: " . $conn->error;
        }
    }

    if ($action == "update") {
        $sql = "UPDATE Supply 
                SET cost=$cost, lead_time=$lead_time
                WHERE supp_id=$supp_id AND med_id=$med_id";

        if ($conn->query($sql)) {
            $message = "Supply record updated.";
        } else {
            // Failed update for some reason (SUPPLY). Output error
            $message = "Error: " . $conn->error;
        }
    }

    if ($action == "delete") {
        $sql = "DELETE FROM Supply 
                WHERE supp_id=$supp_id AND med_id=$med_id";

        if ($conn->query($sql)) {
            $message = "Supply record deleted.";
        } else {
            // Failed deletion for some reason (SUPPLY). Output error
            $message = "Error: " . $conn->error;
        }
    }
}

$result = $conn->query("SELECT s.supp_id, sp.supp_name, s.med_id, m.med_name, s.cost, s.lead_time
                       FROM Supply s
                       JOIN Supplier sp ON s.supp_id = sp.supp_id
                       JOIN Medicine m ON s.med_id = m.med_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reorder / Add Medicine Form</title>
    <link rel="stylesheet" href="ui_format.css">
</head>
<body>

<div class="container">

<h1>PharmaTrack</h1>
<h2>Reorder / Add Medicine Form</h2>

<p><a href="homepage.php">Back to Homepage</a></p>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="post">
    Action:
    <select name="action">
        <option value="add">Add Supply Record</option>
        <option value="update">Update Supply Record</option>
        <option value="delete">Delete Supply Record</option>
    </select><br><br>

    Supplier ID: <input type="number" name="supp_id" required><br>
    Medicine ID: <input type="number" name="med_id" required><br>
    Cost: <input type="number" step="0.01" name="cost"><br>
    Lead Time: <input type="number" name="lead_time"><br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Clear">
</form>

<h3>Current Supply Records</h3>

<table border="1">
<tr>
    <th>Supplier ID</th>
    <th>Supplier Name</th>
    <th>Medicine ID</th>
    <th>Medicine Name</th>
    <th>Cost</th>
    <th>Lead Time</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["supp_id"] . "</td>";
    echo "<td>" . $row["supp_name"] . "</td>";
    echo "<td>" . $row["med_id"] . "</td>";
    echo "<td>" . $row["med_name"] . "</td>";
    echo "<td>" . $row["cost"] . "</td>";
    echo "<td>" . $row["lead_time"] . "</td>";
    echo "</tr>";
}
?>

</table>

</div>

</body>
</html>
