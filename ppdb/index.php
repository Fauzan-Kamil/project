<?php
session_start();

// jika tidak ada session login pindahkan ke halaman login (paksa masuk lewat url)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

require 'functions/functions.php';



?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Siswa</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PPBD</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                </ul>
                <a href="logout.php" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan keluar akun?')"><i class="bi bi-box-arrow-left"></i> Logout</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container mt-4 p-1">

        <!-- Carousel -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/library.jpg" class="d-block w-100">
                </div>
            </div>
        </div>
        <!-- End Carousel  -->

        <!-- Cards -->
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hasil Seleksi Peserta PPDB</h5>
                        <p class="card-text">Lihat hasil pengumuman peserta seleksi PPDB.</p>
                        <a href="dataPeserta.php" class="btn btn-primary">Data Peserta Seleksi</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftaran Siswa PPDB</h5>
                        <p class="card-text">Pendaftar peserta untuk mengikuti seleksi PPDB.</p>
                        <a href="registerSiswa.php" class="btn btn-success">Pendaftaran Siswa PPDB</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cards -->






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>