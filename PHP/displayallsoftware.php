<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
</head>
<body>



<div >
    <h2>Computer Software</h2>

    <?php
    include 'connection.php';

    $sql = "SELECT * FROM AssetInventory";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Date</th>
                    <th>Invoice No</th>
                    <th>Assets</th>
                    <th>Qty</th>
                    <th>Location</th>
                    <th>Device Serial Number</th>
                    <th>Sub Location</th>
                    <th>System Ref</th>
                    <th>REF NO</th>
                    <th>Supplier</th>
                    <th>Cost</th>
                    <th>Dep Rate</th>
                    <th>Status</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Date']}</td>
                    <td>{$row['InvoiceNo']}</td>
                    <td>{$row['Assets']}</td>
                    <td>{$row['Qty']}</td>
                    <td>{$row['Location']}</td>
                    <td>{$row['DeviceSerialNumber']}</td>
                    <td>{$row['SubLocation']}</td>
                    <td>{$row['SYSTEMREF']}</td>
                    <td>{$row['REFNO']}</td>
                    <td>{$row['Supplier']}</td>
                    <td>{$row['Cost']}</td>
                    <td>{$row['DepRate']}</td>
                    <td>{$row['Status']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No data available</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
