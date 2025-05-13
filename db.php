<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "voicetap"; // or whatever your DB is

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
