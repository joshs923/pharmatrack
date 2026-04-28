<?php
$conn = new mysqli("localhost", "root", "", "pharmatrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>