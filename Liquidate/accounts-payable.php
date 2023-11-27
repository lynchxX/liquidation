<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Payable Management</title>
</head>
<body>

<?php
// Database connection
$servername = "your_database_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch accounts payable records
function getAccountsPayable($conn) {
    $sql = "SELECT * FROM accounts_payable";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Display accounts payable records
$accountsPayable = getAccountsPayable($conn);
?>

<h2>Accounts Payable Management</h2>

<!-- Display Accounts Payable Records -->
<table border="1">
    <tr>
        <th>Invoice Number</th>
        <th>Vendor Name</th>
        <th>Due Date</th>
        <th>Amount</th>
        <th>Payment Status</th>
        <th>Action</th>
    </tr>
    <?php foreach ($accountsPayable as $row): ?>
        <tr>
            <td><?= $row['invoice_number'] ?></td>
            <td><?= $row['vendor_name'] ?></td>
            <td><?= $row['due_date'] ?></td>
            <td><?= $row['amount'] ?></td>
            <td><?= $row['payment_status'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">Update</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Add New Account Payable Form -->
<h3>Add New Account Payable</h3>
<form action="add.php" method="post">
    <label for="invoice_number">Invoice Number:</label>
    <input type="text" name="invoice_number" required><br>
    <label for="vendor_name">Vendor Name:</label>
    <input type="text" name="vendor_name" required><br>
    <label for="due_date">Due Date:</label>
    <input type="date" name="due_date" required><br>
    <label for="amount">Amount:</label>
    <input type="text" name="amount" required><br>
    <label for="payment_status">Payment Status:</label>
    <select name="payment_status">
        <option value="unpaid">Unpaid</option>
        <option value="partial">Partial</option>
        <option value="paid">Paid</option>
    </select><br>
    <input type="submit" value="Add">
</form>

<?php
$conn->close();
?>

</body>
</html>