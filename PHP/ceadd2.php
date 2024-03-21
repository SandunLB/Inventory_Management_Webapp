<?php
session_start();
include 'connection.php';





if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addData'])) {
    $date = $_POST['date'];
    $invoiceNo = $_POST['invoiceNo'];
    $serialNo = $_POST['serialNo'];
    $assets = $_POST['assets'];
    $qty = $_POST['qty'];
    $location = $_POST['location'];
    $subLocation = $_POST['subLocation'];
    $refNo = $_POST['refNo'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['cost'];
    $depRate = $_POST['depRate'];
    $status = $_POST['status'];

    $sql = "INSERT INTO computer_equipment (Date, InvoiceNo, SerialNo, Assets, Qty, Location, SubLocation, SystemRef, REFNO, Supplier, Cost, DepRate, Status)
        VALUES ('$date', '$invoiceNo', '$serialNo', '$assets', $qty, '$location', '$subLocation', NULL, '$refNo', '$supplier', $cost, '$depRate', '$status')";


    if ($conn->query($sql) === TRUE) {
        echo '<div style="color: #4caf50; text-align: center; margin-top: 10px;">Data added successfully!</div>';
    } else {
        echo '<div style="color: #f44336; text-align: center; margin-top: 10px;">Error adding data: ' . $conn->error . '</div>';
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            background-color: rgba(255, 255, 255, 0.9); 
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            padding: 15px;
            width: 100%;
            cursor: pointer;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button:hover {
            filter: brightness(110%);
        }

        .success-message {
            color: #4caf50;
            text-align: center;
            margin-top: 10px;
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
    <h2>Computer Equipment Data Adding Form!</h2>

    <form method="POST" action="">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="invoiceNo">Invoice No:</label>
        <input type="text" id="invoiceNo" name="invoiceNo" required>

        <label for="serialNo">Serial No:</label>
        <input type="text" id="serialNo" name="serialNo" required>

        <label for="assets">Assets:</label>
        <input type="text" id="assets" name="assets" required>

        <label for="qty">Qty:</label>
        <input type="number" id="qty" name="qty" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="subLocation">Sub Location:</label>
        <input type="text" id="subLocation" name="subLocation" required>

        <label for="refNo">REF NO:</label>
        <input type="text" id="refNo" name="refNo" required>

        <label for="supplier">Supplier:</label>
        <input type="text" id="supplier" name="supplier" required>

        <label for="cost">Cost:</label>
        <input type="number" id="cost" name="cost" required>

        <label for="depRate">Dep Rate:</label>
        <input type="text" id="depRate" name="depRate" required>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>

        <button type="submit" name="addData">Add Data</button>
    </form>

    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="success-message">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }

    if (isset($_SESSION['error'])) {
        echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>

</div>

</body>
</html>
