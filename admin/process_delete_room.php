<?php
require_once "../database/connection.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("location:../login.php");
    exit();
}

// Check if room_id is set
if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
    
    // Delete the room from the database
    $sql = "DELETE FROM rooms WHERE id = $room_id";
    
    if ($conn->query($sql)) {
        header("Location: admin.php?status=room_deleted");
        exit();
    } else {
        echo "Error deleting room: " . $conn->error;
    }
} else {
    echo "No room ID specified!";
}
?>
