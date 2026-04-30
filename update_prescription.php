<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $presc_id = $_POST["presc_id"];
    $status = $_POST["status"];

    $sql = "UPDATE Prescription SET status='$status' WHERE presc_id=$presc_id";

    if ($conn->query($sql)) {
        echo "Updated successfully";
    } else {
        // Failed update for some reason. Output error
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Prescription</title>
    <link rel="stylesheet" href="ui_format.css">
</head>
<body>

<div class="container">

<p><a href="homepage.php">Back to Homepage</a></p>

<h2>Update Prescription</h2>

<form method="post">
    Prescription ID: <input type="number" name="presc_id"><br>
    New Status: <input type="text" name="status"><br>
    <input type="submit" value="Update">
</form>

</div>

</body>
</html>
