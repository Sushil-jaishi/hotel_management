<?php
require_once 'connection.php';

$sql = "CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(50) NOT NULL,
    room_type VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image VARCHAR(255)
)";

if ($conn->query($sql)==true){
    echo "Table room created successfully";
}
else{
    echo "Error creating table: " . $conn->error;
}

?> 