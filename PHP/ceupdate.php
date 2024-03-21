<?php
session_start();
include 'connection.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

$systemref = $date = $invoiceNo = $serialNo = $assets = $qty = $location = $subLocation = $refNo = $supplier = $cost = $depRate = $status = '';



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changeData'])) {
    $systemref = $_POST['systemref'];

    $sql = "SELECT * FROM computer_equipment WHERE SYSTEMREF = $systemref";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Assign values to variables for pre-filling the form
        $date = $row['Date'];
        $invoiceNo = $row['InvoiceNo'];
        $serialNo = $row['SerialNo'];
        $assets = $row['Assets'];
        $qty = $row['Qty'];
        $location = $row['Location'];
        $subLocation = $row['SubLocation'];
        $refNo = $row['REFNO'];
        $supplier = $row['Supplier'];
        $cost = $row['Cost'];
        $depRate = $row['DepRate'];
        $status = $row['Status'];
    } else {
        $_SESSION['error'] = "Record not found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateData'])) {
    $systemref = $_POST['systemref'];
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

    // Build the SQL update statement
    $sql = "UPDATE computer_equipment SET 
            Date = '$date',
            InvoiceNo = '$invoiceNo',
            SerialNo = '$serialNo',
            Assets = '$assets',
            Qty = $qty,
            Location = '$location',
            SubLocation = '$subLocation',
            REFNO = '$refNo',
            Supplier = '$supplier',
            Cost = $cost,
            DepRate = '$depRate',
            Status = '$status'
            WHERE SYSTEMREF = $systemref";

try {
    $conn->query($sql);
    $_SESSION['message'] = "Data updated successfully!";
    header("Location: ceupdate.php");
    exit();
} catch (mysqli_sql_exception $e) {
    $_SESSION['error'] = "Error updating data: Unable to update the record. Please check your input.";
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Data</title>
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
    <h2>Change Data</h2>

    <form method="POST" action="">
        <label for="systemref">Enter System Ref:</label>
        <input type="number" id="systemref" name="systemref" value="<?php echo $systemref; ?>" required>
        <button type="submit" name="changeData">Load Data</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changeData'])) : ?>
        <form method="POST" action="">
            <input type="hidden" name="systemref" value="<?php echo $systemref; ?>">

           
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $date; ?>">

            <label for="invoiceNo">Invoice No:</label>
            <input type="text" id="invoiceNo" name="invoiceNo" value="<?php echo $invoiceNo; ?>">

            <label for="serialNo">Serial No:</label>
            <input type="text" id="serialNo" name="serialNo" value="<?php echo $serialNo; ?>">

            <label for="assets">Assets:</label>
            <input type="text" id="assets" name="assets" value="<?php echo $assets; ?>">

            <label for="qty">Qty:</label>
            <input type="number" id="qty" name="qty" value="<?php echo $qty; ?>">

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $location; ?>">

            <label for="subLocation">Sub Location:</label>
            <input type="text" id="subLocation" name="subLocation" value="<?php echo $subLocation; ?>">

            <label for="refNo">Ref No:</label>
            <input type="text" id="refNo" name="refNo" value="<?php echo $refNo; ?>">

            <label for="supplier">Supplier:</label>
            <input type="text" id="supplier" name="supplier" value="<?php echo $supplier; ?>">

            <label for="cost">Cost:</label>
            <input type="number" id="cost" name="cost" value="<?php echo $cost; ?>">

            <label for="depRate">Dep Rate:</label>
            <input type="text" id="depRate" name="depRate" value="<?php echo $depRate; ?>">

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="<?php echo $status; ?>">

            <button type="submit" name="updateData">Update Data</button>
        </form>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error-message"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="success-message"><?php echo $_SESSION['message']; ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <a href="adminpanel.php">Back to Admin Panel</a>
</div>

</body>
</html>
