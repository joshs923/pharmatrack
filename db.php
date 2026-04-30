<?php
$conn = new mysqli("localhost", "root", "", "pharmatrack");

// Connection failed. Output error message to user.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
