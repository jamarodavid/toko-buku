<?php
require 'navbar.php';
require 'conn.php';

$sql = 'SELECT * FROM data_kategori';

$books = [];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <h2>Kategori Buku</h2>
        <br>
        <a href="tambah_kategori.php" class="btn btn-primary">Tambah Kategori</a>
        <br>
        <br>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kategori</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
        <?php ?>
      <?php $i = 1;
foreach ($books as $book) {?>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $book['kategori']; ?></td>
      <td><?php echo $book['deskripsi']; ?></td>      
      <td><a href="ubah_kategori.php?id=<?php echo $book['id']; ?>">ubah</a> |
      <a href="hapus_kategori.php?id=<?php echo $book['id']; ?>" onclick="return confirm('yakin?');" >hapus</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>