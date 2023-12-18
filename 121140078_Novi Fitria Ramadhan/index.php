<?php
session_start();
if (isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    

    <title>Data Siswa </title>

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
                    <a href="login.php"> login </a>
                </div>
            </div>
        </nav>
    </header>


    <div class="centered">
        <h1> TK ABC Desa Sidorejo </h1>
        <p> Selamat Datang di halaman utama Website Pendaftaran TK ABC Desa Sidorejo</p>
        <img src="tk.png" alt="error">
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
