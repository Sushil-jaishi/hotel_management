<?php
// process_bookings.php



// SQL query to retrieve bookings
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["booking_id"] . "</td>
            <td>" . $row["room_number"] . "</td>
            <td>" . $row["customer_name"] . "</td>
            <td>" . $row["checkin_date"] . "</td>
            <td>" . $row["checkout_date"] . "</td>
            <td>
                <a href='edit_booking.php?id=" . $row["booking_id"] . "' class='button'>Edit</a>
                <a href='delete_booking.php?id=" . $row["booking_id"] . "' class='button' style='background-color: #e74c3c;'>Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No bookings found.</td></tr>";
}

$conn->close();
?>
