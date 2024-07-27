<?php
include 'navbar.php';
require 'conn.php';

if ($conn->connect_error) {
    exit('Koneksi gagal: '.$conn->connect_error);
}

$result = $conn->query('SELECT * FROM data_buku');
$bukus = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bukus[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Buku</h1>
    <div class="row">
        <?php foreach ($bukus as $buku) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="../images/<?php echo $buku['cover']; ?>"  alt="<?php echo htmlspecialchars($buku['judul']); ?>" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $buku['judul']; ?></h5>
                        <p class="card-text"><?php echo $buku['pengarang']; ?></p>
                        <p class="card-text"><?php echo $buku['tahun_terbit']; ?></p>
                        <p class="card-text">Rp<?php echo number_format($buku['harga'], 0, ',', '.'); ?></p>
                        <form method="post" action="cart.php?action=add&id=<?php echo $buku['id']; ?>">
                            <input type="number" name="quantity" value="1" class="form-control mb-2" min="1">
                            <input type="hidden" name="name" value="<?php echo $buku['judul']; ?>">
                            <input type="hidden" name="price" value="<?php echo $buku['harga']; ?>">
                            <input type="hidden" name="image" value="<?php echo $buku['cover']; ?>">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
