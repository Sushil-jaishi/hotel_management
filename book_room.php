<?php
// book_room.php

require_once 'database/connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
// Ensure a room ID is provided
if (isset($_GET['room_id'])) {
    


$room_id = intval($_GET['room_id']);

// Fetch room details from the database
$sql = "SELECT * FROM rooms WHERE id = $room_id";
$result = $conn->query($sql);
$room = $result->fetch_assoc();
// var_dump($room);
// exit();

if (!$room) {
    die('Room not found.');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room - Your Hotel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 50px;
            margin-right: 15px;
        }
        .container {
            flex: 1;
            max-width: 1200px;
            min-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 30px 10px;
            height: 80px;
        }
        #username{
            font-size: 150%;
            margin-left: 50px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="logo.png" alt="Your Hotel Logo">
            <h2>Your Hotel</h2>
        </div>
        <div>
            <a href="index.php">Home</a>
            <a href="rooms.php">Rooms</a>
            <?php
           
            if(isset($_SESSION['username'])){
            ?>
            <span id="username"><?php echo "Welcome ".$_SESSION['username']; ?></span>
            <a href="logout.php">Logout</a>
            <?php
            }else{
            ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <?php } ?>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="container">
        <h1>Book a Room</h1>
        <h2><?php echo htmlspecialchars($room['room_type']); ?> - Room <?php echo htmlspecialchars($room['room_number']); ?></h2>
        <p><?php echo htmlspecialchars($room['description']); ?></p>
        <p><strong>Price:</strong> <?php echo htmlspecialchars(number_format($room['price'], 2)); ?></p>
<br>
        <form action="process_booking.php" method="post">
            <input type="hidden" name="room_id" value="<?php echo htmlspecialchars($room['id']); ?>">

            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" required>

            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" required>
            <select id="payment-method" name="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="cash_payment">Cash Payment</option>
                <option value="online_payment">Online Payment</option>
            </select>

            <button type="submit" class="button">Book Now</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Your Hotel. All Rights Reserved.</p>
    </div>

</body>
</html>
