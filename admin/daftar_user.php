<?php
require 'navbar.php';
require 'conn.php';

$sql = 'SELECT * FROM userr';

$users = [];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar User</h2>
        <br>
       
        <br>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">email</th>

    </tr>
  </thead>
  <tbody>
    <tr>
        <?php ?>
      <?php $i = 1;
foreach ($users as $user) {?>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $user['username']; ?></td>
      <td><?php echo $user['password']; ?></td>      
      <td><?php echo $user['email']; ?></td>      
 
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