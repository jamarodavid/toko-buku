<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_buku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $total = $_POST['total'];


    $sql = "INSERT INTO orders (customer_name, customer_address, total_price, status) VALUES ('$customer_name', '$customer_address', $total, 'pending')";

    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;
        foreach ($_SESSION['cart'] as $item) {
            $product_name = $item['name'];
            $product_price = $item['price'];
            $product_quantity = $item['quantity'];
            $sql = "INSERT INTO order_items (order_id, product_name, product_price, product_quantity) VALUES ($order_id, '$product_name', $product_price, $product_quantity)";
            $conn->query($sql);
        }
        unset($_SESSION['cart']);
        header("Location: order_confirmation.php?order_id=$order_id");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
