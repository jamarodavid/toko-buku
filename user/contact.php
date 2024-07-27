<?php 

    include "navbar.php";
    require "conn.php";

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pesan = $_POST['pesan'];
       
    
        $sql = "INSERT INTO contact (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>
        alert('Berhasil Di Kirim');
    </script>";
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <br>
        <h1>Contact Us</h1>

    <form action="" method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email</label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Pesan</label>
    <input type="text-area" name="pesan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pesan">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>