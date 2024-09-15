<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hotel_management';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error == true) {
    echo "connection failed" . $conn->connect_error;
} else {
    // echo 'mysql connection successful!!';
}
