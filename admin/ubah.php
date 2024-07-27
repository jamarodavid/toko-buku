<?php

require 'conn.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $halaman = $_POST['halaman'];
    $harga = $_POST['harga'];

    if ($_FILES['cover']['name']) {
        $cover = $_FILES['cover']['name'];
        $target_dir = "../images/";
        $target_file = $target_dir . basename($cover);
        move_uploaded_file($_FILES['cover']['tmp_name'], $target_file);

        $sql = "UPDATE data_buku SET judul = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', halaman = '$halaman', harga = '$harga', cover = '$cover' WHERE id = $id";
    } else {
        $sql = "UPDATE data_buku SET judul = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', halaman = '$halaman', harga = '$harga' WHERE id = $id";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>
          alert('Data berhasil diubah');
          window.location.href = 'data_buku.php';
          </script>";
    } else {
        echo "<script>
          alert('Data gagal diubah');
          window.location.href = 'data_buku.php';
          </script>";
    }

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
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Ubah Data</h1>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $buku['judul']; ?>" placeholder="Judul">
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" id="pengarang" value="<?php echo $buku['pengarang']; ?>" placeholder="Pengarang">
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="date" name="tahun_terbit" class="form-control" id="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" placeholder="Tahun Terbit">
        </div>
        <div class="mb-3">
            <label for="halaman" class="form-label">Halaman</label>
            <input type="text" name="halaman" class="form-control" id="halaman" value="<?php echo $buku['halaman']; ?>" placeholder="Halaman">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" value="<?php echo $buku['harga']; ?>" placeholder="Harga">
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="file" name="cover" class="form-control" id="cover">
            <img src="../images/<?php echo $buku['cover']; ?>" alt="Current Cover" width="100" class="mt-2">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
