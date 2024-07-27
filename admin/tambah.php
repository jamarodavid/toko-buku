<?php

require 'conn.php';

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $halaman = $_POST['halaman'];
    $harga = $_POST['harga'];

    $cover = $_FILES['cover']['name'];
    $target_dir = "../images/";
    $target_file = $target_dir . basename($cover);


    move_uploaded_file($_FILES['cover']['tmp_name'], $target_file);

    $sql = "INSERT INTO data_buku (judul, pengarang, tahun_terbit, halaman, harga, cover) VALUES ('$judul', '$pengarang', '$tahun_terbit', '$halaman', '$harga', '$cover')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: data_buku.php');
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Tambah Data</h1>
    <br>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" name="judul" class="form-control" id="judul" placeholder="judul">
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="pengarang">
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="date" name="tahun_terbit" class="form-control" id="tahun_terbit" placeholder="tahun terbit">
        </div>
        <div class="mb-3">
            <label for="halaman" class="form-label">Halaman</label>
            <input type="text" name="halaman" class="form-control" id="halaman" placeholder="halaman">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" placeholder="harga">
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="file" name="cover" class="form-control" id="cover">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
