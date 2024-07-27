<?php
include 'navbar.php';
require 'conn.php';

$result = mysqli_query($conn, 'SELECT * FROM  data_buku');

$bukus = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bukus[] = $row;
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

    <h1>Tabel Data Buku</h1>
    <br>
    <a href="tambah.php" class="fs-3 fw-bold">Tambah Data </a>
    <br>
  <table class="table">
  <thead>
    <tr>

      <th scope="col">no</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">Pengarang</th>
      <th scope="col">Harga</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
foreach ($bukus as $buku) { ?>
        <tr>
        <th scope="row"><?php echo $no++; ?></th>
        <td><?php echo $buku['judul']; ?></td>
        <td><?php echo $buku['pengarang']; ?></td>
        <td>Rp<?php echo number_format($buku['harga'], 0, ',', '.'); ?></td>
        <td><a href="ubah.php?id=<?php echo $buku['id']; ?>">ubah</a> | <a href="detail.php?id=<?php echo $buku['id']; ?>">detail</a> |
        <a href="hapus.php?id=<?php echo $buku['id']; ?>" onclick="return confirm('yakin?');" >hapus</a></td>
      </tr>
    <?php } ?>
    
    
  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>