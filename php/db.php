<?php
$conn = new mysqli("localhost", "root", "", "job_portal");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
