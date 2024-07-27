<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'add') {
    $product_id = $_GET['id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = $_POST['quantity'];

    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $product_quantity,
    ];

    $_SESSION['cart'][] = $cart_item;
}


if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $index = $_GET['index'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['cart'] as $index => $item) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>Rp <?php echo htmlspecialchars(number_format($item['price'], 0, ',', '.')); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td>Rp <?php echo htmlspecialchars(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?></td>
                    <td>
                        <a href="cart.php?action=remove&index=<?php echo $index; ?>" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php } ?>
            </tbody>
        </table>
        <h3>Total: Rp <?php echo htmlspecialchars(number_format($total, 0, ',', '.')); ?></h3>
        
        <h2>Delivery Details</h2>
        <form action="place_order.php" method="post">
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_address">Customer Address</label>
                <textarea class="form-control" id="customer_address" name="customer_address" rows="3" required></textarea>
            </div>
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
        <br>
    <?php } else { ?>
        <p>Tidak Ada Barang</p>
    <?php } ?>
    <br>
    <a href="products.php" class="btn btn-primary">Continue Shopping</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
