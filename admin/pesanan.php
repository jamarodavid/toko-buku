<?php
require 'navbar.php';
require 'conn.php';

$sql = 'SELECT * FROM orders';
$pesans = [];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pesans[] = $row;
    }
}

$sqls = 'SELECT * FROM order_items';
$pesanss = [];
$results = mysqli_query($conn, $sqls);

if (mysqli_num_rows($results) > 0) {
    while ($rows = mysqli_fetch_assoc($results)) {
        $pesanss[] = $rows;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br>
    <h1>Pesanan User</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Alamat</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Delete</th>
                <th scope="col">Nama Buku</th>
                

            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($pesans as $pesan) {
                ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $pesan['customer_name']; ?></td>
                    <td><?php echo $pesan['customer_address']; ?></td>
                    <td>Rp <?= htmlspecialchars(number_format($pesan['total_price'], 0, ',', '.')) ?></td>
                    <td>  <a href="hapus_pesanan.php?id=<?php echo $pesan['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin?');" >hapus</a></td>
                    <td>
                        <?php
                        foreach ($pesanss as $pes) {
                            if ($pes['order_id'] == $pesan['id']) {
                                echo $pes['product_name'] . "<br>";
                            }
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
