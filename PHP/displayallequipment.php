<?php

include 'connection.php'; 

$data = [];

$sql = "SELECT * FROM computer_equipment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Equipment</title>
    
</head>
<body>



<div >
    <h2>Computer Equipment</h2>

    <?php if (!empty($data)) : ?>
        <table>
            <tr>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Serial No</th>
                <th>Assets</th>
                <th>Qty</th>
                <th>Location</th>
                <th>Sub Location</th>
                <th>System Ref</th>
                <th>REF NO</th>
                <th>Supplier</th>
                <th>Cost</th>
                <th>Dep Rate</th>
                <th>Status</th>
            </tr>

            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['Date'] ?></td>
                    <td><?= $row['InvoiceNo'] ?></td>
                    <td><?= $row['SerialNo'] ?></td>
                    <td><?= $row['Assets'] ?></td>
                    <td><?= $row['Qty'] ?></td>
                    <td><?= $row['Location'] ?></td>
                    <td><?= $row['SubLocation'] ?></td>
                    <td><?= $row['SystemRef'] ?></td>
                    <td><?= $row['REFNO'] ?></td>
                    <td><?= $row['Supplier'] ?></td>
                    <td><?= $row['Cost'] ?></td>
                    <td><?= $row['DepRate'] ?></td>
                    <td><?= $row['Status'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    <?php else : ?>
        <p>No data available</p>
    <?php endif; ?>
</div>

</body>
</html>
