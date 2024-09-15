<?php
require_once 'connection.php';

$sql = "CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(50) NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL
)";

if ($conn->query($sql)==true){
    echo "Table room created successfully";
}
else{
    echo "Error creating table: " . $conn->error;
}

?> 