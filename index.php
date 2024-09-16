<?php 
session_start();
require_once "database/connection.php";

// Fetch the 3 most recent rooms from the database
$sql = "SELECT * FROM rooms ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);
$recent_rooms = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Hotel</title>
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
        .hero {
            background-image: url('hero_image.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 20px;
            position: relative;
            height: 400px;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .hero .button {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.2em;
        }
        .hero .button:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        h2 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 20px;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .card {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: calc(33.333% - 20px);
            text-align: center;
            transition: transform 0.3s;
        }
        .card img {
            width: 100%;
            border-radius: 10px;
            height: 200px;
            object-fit: cover;
        }
        .card h3 {
            color: #007BFF;
            margin: 15px 0;
        }
        .card p {
            color: #555;
            margin-bottom: 15px;
        }
        .card .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .card .button:hover {
            background-color: #0056b3;
        }
        .card:hover {
            transform: scale(1.05);
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

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to Your Hotel</h1>
            <p>Experience world-class hospitality with luxurious rooms and exceptional service.</p>
            <a href="rooms.php" class="button">View Rooms</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="cards">
            <?php foreach ($recent_rooms as $room): ?>
            <div class="card">
                <img src="assets/images/uploads/<?php echo $room['image']; ?>" alt="<?php echo $room['room_type']; ?>">
                <h3><?php echo ucfirst($room['room_type']); ?> Room</h3>
                <p><?php echo $room['description']; ?></p>
                <a href="book_room.php?room_id=<?php echo $room['id']; ?>" class="button">Book Now</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Your Hotel. All Rights Reserved.</p>
    </div>

</body>
</html>
