<?php
require_once "../database/connection.php";

session_start();
if(!isset($_SESSION['email'])){
    header("location:../login.php");
    exit();
}


$sql= "select * from bookings left join customer on bookings.customer_id=customer.id left join rooms on bookings.room_id=rooms.id";    
$result = $conn->query($sql);
$product = $result -> fetch_all(MYSQLI_ASSOC);
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
        #table{
            margin:60px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>Admin Panel</h1>
        <div class="nav-menu">
            <a href="admin.php#add-room">Add Rooms</a>
            <a href="admin.php#manage-bookings">Manage Bookings</a>
            <a href="total_checkouts.php">Total Checkouts</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>

<div id="table">
    <table>
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Customer Name</th>
                <th>room number</th>
                <th>checkin date</th>
                <th>checkout date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             for($i=0;$i<count($product);$i++){
             ?>
            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $product[$i]['username'];?></td>
              <td><?php echo $product[$i]['room_number'] ?></td>
              <td><?php echo $product[$i]['checkin_date'] ?></td>
              <td><?php echo $product[$i]['checkout_date'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
 </div>
    
</body>
</html>