<?php

require 'functions.php';
$siswa = query("SELECT * FROM siswa");


//tombol cari ditekan
if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style/nav.css">

    <title>Settings</title>
</head>

<body>


<header>
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <a class="navbar-brand" href="#">PENDAFTARAN TK ABC</a>
                </div>
                <div class="nav-right">
                    <a href="index.php">Home</a>
                    <a href="settings.php">Settings</a>
                    <a href="logout.php">Logout</a>
                    <a href="login.php">Login</a>
                </div>
            </div>
        </nav>
    </header>



    <div class="container p-4">
        <div class="row">



            <div class="col mt-3">
                <form action="" method="post" class="d-flex " role="search">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Telusuri..." aria-label="Search" autocomplete="off" style="border: 3px solid #d87093;">
                    <button class="btn btn-outline-primary" name="cari" type="submit">Telusuri</button>
                </form>
            </div>

            <div class="col text-end mt-3">
                <a href="tambah.php">
                    <button type="button" class="btn btn-outline-success">Tambah data siswa</button>
                </a>
            </div>



            <table class="table table-striped table-hover mt-3">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Pendaftaran</th>
                    <th> Aksi </th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($siswa as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["nik"]; ?></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["gender"]; ?></td>
                        <td><?= $row["daftar"]; ?></td>
                        <td>

                            <a class="text-decoration-none" href="ubah.php?id=<?= $row["id"]; ?>">
                                <button type="button" class="btn btn-outline-warning">UPDATE</button>
                            </a>
                            <a class="text-decoration-none" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('anda yakin menghapus data ini');">
                                <button type="button" class="btn btn-outline-danger">DELETE</button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>

</body>

</html>
