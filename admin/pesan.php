<?php
require 'navbar.php';
require 'conn.php';

$sql = 'SELECT * FROM contact';

$pesans = [];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pesans[] = $row;
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <br>
    <h1>Pesan User</h1>

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">nama</th>
      <th scope="col">email</th>
      <th scope="col">pesan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php $i = 1;
foreach ($pesans as $pesan) {?>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $pesan['nama']; ?></td>
      <td><?php echo $pesan['email']; ?></td>
      <td><?php echo $pesan['pesan']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>