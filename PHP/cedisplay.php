<?php
session_start();
include 'connection.php';

$systemref = '';
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['displayData'])) {
    $systemref = $_POST['systemref'];

    $sql = "SELECT * FROM computer_equipment WHERE SYSTEMREF = $systemref";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Record not found";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('Logo.jpeg') center center fixed;
            background-size: cover;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9); /* Glass effect background */
    backdrop-filter: blur(10px); /* Glass effect blur */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            filter: brightness(110%);
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e74c3c;
            color: #fff;
            
        }

        .error-message {
            color: #f44336;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Display Data</h2>

    <form method="POST" action="">
        <label for="systemref">Enter System Ref:</label>
        <input type="text" id="systemref" name="systemref" value="<?php echo $systemref; ?>" required>
        <button type="submit" name="displayData">Display Data</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['displayData'])) : ?>
        <?php if ($data) : ?>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <?php foreach ($data as $field => $value) : ?>
                    <tr>
                        <td><?php echo $field; ?></td>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <div class="error-message">Record not found</div>
        <?php endif; ?>
    <?php endif; ?>

    <a href="adminpanel.php">Back to Admin Panel</a>
</div>

</body>
</html>
