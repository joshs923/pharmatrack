<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $presc_id = $_POST["presc_id"];

    $sql = "DELETE FROM Prescription WHERE presc_id = $presc_id";

    if ($conn->query($sql)) {
        echo "Deleted successfully";
    } else {
        // Failed deletion for some reason. Output error
        echo "Error: " . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Prescription</title>
    <link rel="stylesheet" href="ui_format.css">
</head>
<body>

<div class="container">

<p><a href="homepage.php">Back to Homepage</a></p>

<form method="post">
    Prescription ID to delete: <input type="number" name="presc_id">
    <input type="submit" value="Delete">
</form>

</div>

</body>
</html>
