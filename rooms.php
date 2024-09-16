<?php  session_start(); ?>

<?php
require_once "database/connection.php";

// Fetch rooms from the database
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);
$rooms = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms - Your Hotel</title>
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
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
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

    <!-- Available Rooms -->
    <div class="container">
        <h1>Available Rooms</h1>
        <div class="cards">
            <?php foreach ($rooms as $room): ?>
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
