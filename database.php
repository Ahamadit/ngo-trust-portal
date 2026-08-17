<?php
// db_connect.php
$servername = "localhost";   // usually localhost
$username   = "root";        // your DB username
$password   = "";            // your DB password (keep blank for XAMPP)
$dbname     = "jkewtrust"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
