<?php
session_start();

include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentUsername = $_SESSION['admin'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM Admin WHERE username = ?");
    $stmt->bind_param("s", $currentUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the entered old password with the stored hashed password
        if (password_verify($oldPassword, $hashedPassword)) {
            // Old password is correct, update the password
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = $conn->prepare("UPDATE Admin SET password = ? WHERE username = ?");
            $updateStmt->bind_param("ss", $newHashedPassword, $currentUsername);
            $updateStmt->execute();
            $updateStmt->close();

            $_SESSION['message'] = "Password changed successfully.";
        } else {
            // Invalid old password, display an error message
            $_SESSION['error'] = "Invalid old password.";
        }
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
    <title>Password Change</title>
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
.loginnow {
        display: block;
        margin: 15px auto;
        text-decoration: None;
        color: #0300ff;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }

    .loginnow:hover {
        color: #2980b9;
    }
    </style>
</head>
<body>

<div class="container">
    <h2>Password Change</h2>

    <p>Change password for: <?php echo $_SESSION['admin']; ?></p>

    <form method="POST" action="">
    <label for="oldPassword">Old Password:</label>
    <input type="password" id="oldPassword" name="oldPassword" required>
    <br>
    
    <label for="newPassword">New Password:</label>
    <input type="password" id="newPassword" name="newPassword" required>
    <br>
    
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>
    <br>
    
    <button type="submit">Change Password</button>
</form>
<div>
<a class="loginnow" onclick="window.location.href='login.php'">Go to Login Page</a>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                alert("New Password and Confirm Password must match!");
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['message'])) {
        echo "<p class='success'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
</div>

</body>
</html>
