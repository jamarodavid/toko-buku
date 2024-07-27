<?php

require 'conn.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE data_kategori SET kategori = '$kategori', deskripsi = '$deskripsi' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
          alert('Data berhasil diubah');
          window.location.href = 'data_kategori.php';
          </script>";
    } else {
        echo "<script>
          alert('Data gagal diubah');
          window.location.href = 'data_kategori.php';
          </script>";
    }

    mysqli_close($conn);
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM data_kategori WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_assoc($result);
    mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Ubah Data Kategori</h1>
        <br>

    <form action="" method="post">
    <div class="mb-3">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?> ">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control"  value="<?php echo $book['kategori']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kategori">
          </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Deskripsi</label> 
    <input type="text" name="deskripsi" class="form-control" value="<?php echo $book['deskripsi']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="deskripsi">
  </div>
  
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html> 