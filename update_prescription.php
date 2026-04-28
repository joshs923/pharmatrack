<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $presc_id = $_POST["presc_id"];
    $status = $_POST["status"];

    $sql = "UPDATE Prescription SET status='$status' WHERE presc_id=$presc_id";

    if ($conn->query($sql)) {
        echo "Updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<p><a href="homepage.php">Back to Homepage</a></p>

<form method="post">
    Prescription ID: <input type="number" name="presc_id"><br>
    New Status: <input type="text" name="status"><br>
    <input type="submit" value="Update">
</form>