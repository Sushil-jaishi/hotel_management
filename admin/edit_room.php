<?php
require_once "../database/connection.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("location:../login.php");
    exit();
}

// Get room ID from URL
if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    // Fetch room details based on room_id
    $sql = "SELECT * FROM rooms WHERE id = $room_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
    } else {
        echo "Room not found!";
        exit();
    }
} else {
    echo "No room ID specified!";
    exit();
}

// Update room details if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $sql = "UPDATE rooms SET 
            room_number = '$room_number', 
            room_type = '$room_type', 
            price = '$price', 
            description = '$description' 
            WHERE id = $room_id";
    
    if ($conn->query($sql)) {
        header("Location: admin.php?status=room_updated");
        exit();
    } else {
        echo "Error updating room: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
        }
        .nav-menu {
            display: flex;
        }
        .nav-menu a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #2c3e50;
        }
        .nav-menu a:hover {
            background-color: #34495e;
        }
        .admin-container {
            margin: 40px auto;
            max-width: 1000px;
        }
        .main-content {
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #007BFF;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }
        .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Edit Room</h1>
        <div class="nav-menu">
            <a href="admin.php">Admin Panel</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>

    <div class="admin-container">
        <div class="main-content">
            <h2>Edit Room</h2>
            <form action="" method="POST">
                <label for="room_number">Room Number</label>
                <input type="text" id="room_number" name="room_number" value="<?php echo $room['room_number']; ?>" required>

                <label for="room_type">Room Type</label>
                <select id="room_type" name="room_type" required>
                    <option value="single" <?php if ($room['room_type'] == 'single') echo 'selected'; ?>>Single Room</option>
                    <option value="double" <?php if ($room['room_type'] == 'double') echo 'selected'; ?>>Double Room</option>
                    <option value="suite" <?php if ($room['room_type'] == 'suite') echo 'selected'; ?>>Suite</option>
                </select>

                <label for="price">Price Per Night</label>
                <input type="number" id="price" name="price" value="<?php echo $room['price']; ?>" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" required><?php echo $room['description']; ?></textarea>

                <button type="submit" class="button">Update Room</button>
            </form>
        </div>
    </div>
</body>
</html>
