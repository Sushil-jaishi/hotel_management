<?php
require_once 'connection.php';

$sql = "CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    room_id int NOT NULL,
    customer_id int NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    FOREIGN KEY (room_id) references rooms(id) on delete cascade,
    FOREIGN KEY (customer_id) references customer(id) on delete cascade
)";

if ($conn->query($sql)==true){
    echo "Table room created successfully";
}
else{
    echo "Error creating table: " . $conn->error;
}

?> 