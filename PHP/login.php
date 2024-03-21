<?php
session_start();

include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM Admin WHERE username = ?");
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the entered password with the stored hashed password
        if (password_verify($enteredPassword, $hashedPassword)) {
            // Admin credentials are valid, redirect to the admin panel
            $_SESSION['admin'] = $enteredUsername;
            header("Location: AdminPanel.php");
            exit();
        } else {
            // Invalid password, display an error message
            $errorMessage = "Invalid password.";
        }
    } else {
        // Invalid username, display an error message
        $errorMessage = "Invalid username.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: url('Logo.jpeg') center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    height: auto;
}

.container {
    width: 400px;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.1); 
    backdrop-filter: blur(10px); 
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.container:hover {
    transform: scale(1.01); 
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

form {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}

input {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease-in-out;
}

input:focus {
    border-color: #3498db; 
}

button {
    padding: 10px 20px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #078bea;
}

.error {
    color: red;
    margin-top: 10px;
}


    </style>
</head>
<body>

<div class="container">
    <h2>Admin Login</h2>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>

    <?php
    if (isset($errorMessage)) {
        echo "<p class='error'>$errorMessage</p>";
    }
    ?>
</div>

</body>
</html>
