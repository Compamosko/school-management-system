<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="register" value="Register">
        </form>
        <?php
        // PHP code for registration process
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            // Establish database connection
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "bscs"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Function to sanitize input data
            function sanitize_input($data) {
                return htmlspecialchars(stripslashes(trim($data)));
            }

            $username = sanitize_input($_POST['username']);
            $password = sanitize_input($_POST['password']);

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Registration successful!</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Close database connection
            $conn->close();
        }
		
        ?>
        <p>Already registered? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
