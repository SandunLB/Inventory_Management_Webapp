<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $invoiceNo = $_POST["invoiceNo"];
    $assets = $_POST["assets"];
    $qty = $_POST["qty"];
    $location = $_POST["location"];
    $deviceSerial = $_POST["deviceSerial"];
    $subLocation = $_POST["subLocation"];
    $refNo = $_POST["refNo"];
    $supplier = $_POST["supplier"];
    $cost = $_POST["cost"];
    $depRate = $_POST["depRate"];
    $status = $_POST["status"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CS";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Calculate the next SYSTEMREF based on the current maximum value
    $maxSql = "SELECT MAX(CAST(SUBSTRING(SYSTEMREF, 7) AS UNSIGNED)) as maxVal FROM AssetInventory";
    $result = $conn->query($maxSql);

    if ($result && $row = $result->fetch_assoc()) {
        $nextVal = $row["maxVal"] + 1;
        $formattedSYSTEMREF = '400710' . str_pad($nextVal, 4, '0', STR_PAD_LEFT);

        // Insert data
        $sql = "INSERT INTO AssetInventory (`Date`, `InvoiceNo`, `Assets`, `Qty`, `Location`, `DeviceSerialNumber`, `SubLocation`, `SYSTEMREF`, `REFNO`, `Supplier`, `Cost`, `DepRate`, `Status`) VALUES ('$date', '$invoiceNo', '$assets', '$qty', '$location', '$deviceSerial', '$subLocation', '$formattedSYSTEMREF', '$refNo', '$supplier', '$cost', '$depRate', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Data added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error calculating next SYSTEMREF: " . $conn->error;
    }

    $conn->close();
}
?>
