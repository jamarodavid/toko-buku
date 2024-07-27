<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_buku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $sql = "SELECT * FROM orders WHERE id = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "Order not found.";
        exit;
    }

    $sql = "SELECT * FROM order_items WHERE order_id = $order_id";
    $items_result = $conn->query($sql);
    $items = $items_result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Invalid order ID.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Order Confirmation</h1>
    <p>Thank you for your order, <?= htmlspecialchars($order['customer_name']) ?>!</p>
    <p>Your order has been placed and will be delivered to:</p>
    <p><?= nl2br(htmlspecialchars($order['customer_address'])) ?></p>
    <p><strong>Total Price:</strong> Rp <?= htmlspecialchars(number_format($order['total_price'], 0, ',', '.')) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars(ucfirst($order['status'])) ?></p>

    <h2>Order Items</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['product_name']) ?></td>
                <td>Rp <?= htmlspecialchars(number_format($item['product_price'], 0, ',', '.')) ?></td>
                <td><?= htmlspecialchars($item['product_quantity']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="products.php" class="btn btn-primary">Continue Shopping</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
