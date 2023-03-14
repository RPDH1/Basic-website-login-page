<?php

// Database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_username";

// Create a new MySQL connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
