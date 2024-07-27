<?php

require 'conn.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $halaman = $_POST['halaman'];
    $harga = $_POST['harga'];

    mysqli_close($conn);
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM data_buku WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $buku = mysqli_fetch_assoc($result);
    mysqli_close($conn);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .book-cover {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .book-details {
            margin-top: 30px;
        }
        .book-details th {
            width: 20%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center my-4">Detail Buku</h1>
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img src="../images/<?php echo htmlspecialchars($buku['cover']); ?>" alt="<?php echo htmlspecialchars($buku['cover']); ?>" class="img-fluid rounded-start book-cover">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Judul: <?php echo htmlspecialchars($buku['judul']); ?></h5>
                    <table class="table table-borderless book-details">
                        <tbody>
                            <tr>
                                <th>Nama Penulis:</th>
                                <td><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                            </tr>
                            <tr>
                                <th>Halaman Buku:</th>
                                <td><?php echo htmlspecialchars($buku['halaman']); ?></td>
                            </tr>
                            <tr>
                                <th>Harga Buku:</th>
                                <td>Rp. <?php echo htmlspecialchars(number_format($buku['harga'], 0, ',', '.')); ?></td>
                            </tr>
                            <tr>
                                <th>Adaptasi Film</th>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                    <a href="data_buku.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
