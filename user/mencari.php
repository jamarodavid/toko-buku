<?php
include 'navbar.php';
require 'conn.php';

$bukus = [];

if (isset($_POST["cari"])) {
    $bukus = cari($_POST["keyword"], $conn);
} else {
    $result = mysqli_query($conn, 'SELECT * FROM data_buku');

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bukus[] = $row;
        }
    }
}

function cari($keyword, $conn){
    $keyword = mysqli_real_escape_string($conn, $keyword);
    $query = "SELECT * FROM data_buku 
              WHERE judul LIKE '%$keyword%' 
              OR pengarang LIKE '%$keyword%' 
              OR tahun_terbit LIKE '%$keyword%' 
              OR halaman LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    $results = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }
    return $results;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4">
      <h1 class="text-center mb-4">Tabel Data Buku</h1>
      <div class="card p-4 shadow-sm">
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Masukkan input pencarian" autocomplete="off" autofocus>
            <button class="btn btn-dark" type="submit" name="cari" id="tombol-cari">Cari</button>
          </div>
        </form>
      </div>
      <br>
      <div class="card p-4 shadow-sm">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($bukus as $buku) { ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo htmlspecialchars($buku['judul']); ?></td>
                <td><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                <td>Rp <?php echo htmlspecialchars(number_format($buku['harga'], 0, ',', '.')); ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php if(empty($bukus)) { ?>
          <p class="text-center">Tidak ada buku yang ditemukan.</p>
        <?php } ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
