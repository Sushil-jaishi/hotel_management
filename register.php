<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Your Hotel</title>
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
            max-width: 800px;
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
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input {
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
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="container">
        <h1>Register</h1>
        <form action="process_register.php" method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="contact" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="button">Register</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Your Hotel. All Rights Reserved.</p>
    </div>

</body>
</html>
