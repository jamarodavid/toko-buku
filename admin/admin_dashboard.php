

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            flex: 1;
            margin: 1rem;
        }
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .navbar {
            margin-bottom: 2rem;
        }
        footer {
            margin-top: 2rem;
            padding: 1rem 0;
            background-color: #f8f9fa;
            text-align: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4">Halo Admin!</h2>
        <p class="text-center">You are logged in.</p>

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Buku</h5>
                    <p class="card-text">Data Buku</p>
                    <a href="data_buku.php" class="btn btn-primary">Click</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Kategori Buku</h5>
                    <p class="card-text">Data Kategori Buku</p>
                    <a href="data_kategori.php" class="btn btn-primary">Click</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar User</h5>
                    <p class="card-text">List user Yang Sudah Daftar</p>
                    <a href="daftar_user.php" class="btn btn-primary">Click</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pesanan Buku</h5>
                    <p class="card-text">List Pesanan Buku dari User yang berbeda-beda</p>
                    <a href="pesanan.php" class="btn btn-primary">Click</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pesan Contact Us</h5>
                    <p class="card-text">Pesan user</p>
                    <a href="pesan.php" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
