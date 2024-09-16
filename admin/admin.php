<?php
require_once "../database/connection.php";

session_start();
if(!isset($_SESSION['email'])){
    header("location:../login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Rooms & Bookings</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>Admin Panel</h1>
        <div class="nav-menu">
            <a href="#add-room">Add Rooms</a>
            <a href="#manage-bookings">Manage Bookings</a>
            <a href="total_checkouts.php">Total Checkouts</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>
    <br>
<center><?php if(isset($_GET['status'])) echo $_GET['status']; ?></center>
    <div class="admin-container">
        <!-- Add Rooms Section -->
        <div id="add-room" class="main-content">
            <h2>Add New Room</h2>
            <form action="process_add_room.php" method="POST" enctype="multipart/form-data">
                <label for="room_number">Room Number</label>
                <input type="text" id="room_number" name="room_number" placeholder="Enter room number" required>

                <label for="room_type">Room Type</label>
                <select id="room_type" name="room_type" required>
                    <option value="">Select room type</option>
                    <option value="single">Single Room</option>
                    <option value="double">Double Room</option>
                    <option value="suite">Suite</option>
                </select>

                <label for="price">Price Per Night</label>
                <input type="number" id="price" name="price" placeholder="Enter price" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter room description" rows="5" required></textarea>

                <label for="image">Room Image</label>
                <input type="file" id="image" name="image" accept="image/*">

                <button type="submit" class="button">Add Room</button>
            </form>
        </div>

        <!-- Manage Bookings Section -->
         <?php 

            $sql= "select * from rooms";
            $result=$conn->query($sql);
            $rooms = $result->fetch_all(MYSQLI_ASSOC);
         ?>
        <div id="manage-bookings" class="main-content">
            <h2>Manage Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for($i=0;$i<count($rooms);$i++){
                        ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $rooms[$i]['room_number'] ?></td>
                        <td><?php echo $rooms[$i]['room_type'] ?></td>
                        <td><?php echo $rooms[$i]['price'] ?></td>
                        <td><?php echo $rooms[$i]['description'] ?></td>
                        <td>
                            <a href="edit_room.php?room_id=<?php echo $rooms[$i]['id']; ?>" class="button">Edit</a>
                            <a href="process_delete_room.php?room_id=<?php echo $rooms[$i]['id']; ?>" class="button" style="background-color: #e74c3c;" onclick="return confirm('Are you sure you want to delete this room?')">Delete</a>
                        </td>

                    </tr>
                    <?php } ?>
                    <!-- Add more bookings as needed -->
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
