<?php
// process_booking.php

require_once 'database/connection.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = intval($_POST['room_id']);
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $user_id = $_SESSION['id'];

    // Insert booking into the database
    $sql = "INSERT INTO bookings (room_id, customer_id, checkin_date, checkout_date) VALUES ($room_id, '$user_id', '$checkin', '$checkout')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=order complete");
    } else {
        echo "Error: Could not complete the booking.";
    }
} else {
    header("Location: rooms.php");
}
