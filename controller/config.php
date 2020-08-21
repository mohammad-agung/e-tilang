<?php
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbName = 'e-tilang';

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
