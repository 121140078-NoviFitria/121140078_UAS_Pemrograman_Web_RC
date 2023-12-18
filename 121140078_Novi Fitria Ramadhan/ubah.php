<?php

require 'functions.php';

//ambil data  di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];


//cek apakah tombol sudaah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('DATA BERHASIL DIUBAH');
                document.location.href = 'settings.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA GAGAL DIUBAH');
                document.location.href = 'settings.php';
            </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/ubah.css">
    
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="row border rounded-3 p-3  shadow box-area" style="#607E1C  ;">



            <h1 class="mb-3 text-white">Update Data Siswa</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">

                <div class="mb-3">
                    <label class="form-label" for="nama"> NAMA : </label>
                    <input class="form-control" type="text" name="nama" id="nama" required value="<?= $siswa["nama"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nik"> NIK : </label>
                    <input class="form-control" type="number" name="nik" id="nik" required value="<?= $siswa["nik"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat"> ALAMAT : </label>
                    <input class="form-control" type="text" name="alamat" id="alamat" required value="<?= $siswa["alamat"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender"> Jenis Kelamin : </label>
                    <input class="form-control" type="text" name="gender" id="gender" required value="<?= $siswa["gender"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="daftar"> Jenis Pendaftaran : </label>
                    <input class="form-control" type="text" name="daftar" id="daftar" required value="<?= $siswa["daftar"]; ?>">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-light" type="submit" name="submit">Tambahkan Data</button>
                </div>


            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>