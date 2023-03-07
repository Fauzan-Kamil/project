<?php
session_start();

// jika tidak ada session login pindahkan ke halaman login (paksa masuk lewat url)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

require 'functions/functions.php';

if (isset($_POST["submit"])) {

    if (tambahSiswa($_POST) > 0) {
        echo "
        <script> 
            alert('data siswa berhasil ditambahkan!');
            document.location.href = 'dataPeserta.php';
        </script>
    ";

        echo mysqli_error($koneksi);
    } else {
        echo "
            <script> 
                alert('data siswa gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Register</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>


<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PPBD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form class="mt-5 border p-4 bg-light shadow" action="" method="post" enctype="multipart/form-data">
                        <h4 class="mb-5 text-secondary text-center">Daftar Siswa Baru</h4>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label>Nama<span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan nama..">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Pilih Jenis Kelamin<span class="text-danger">*</span></label>
                                <select class="form-select" id="floatingSelect" name="gender">
                                    <option selected disabled>Pilih..</option>
                                    <option name="gender" value="Laki-laki">Laki-laki</option>
                                    <option name="gender" value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" name="tempat" class="form-control" placeholder="Masukan tempat lahir..">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Alamat<span class="text-danger">*</span></label><br>
                                <textarea name="alamat" id="" cols="65" rows="3"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Nama Orang Tua<span class="text-danger">*</span></label>
                                <input type="text" name="ortu" class="form-control" placeholder="Masukan orang tua..">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Asal Sekolah<span class="text-danger">*</span></label>
                                <input type="text" name="sekolah" class="form-control" placeholder="Masukan asal sekolah..">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Rata-Rata Nilai Ujian Nasional (Dibulatkan)<span class="text-danger">*</span></label>
                                <input type="number" name="un" class="form-control" placeholder="Masukan nilai UN..">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Ijasah (max 2Mb)<span class="text-danger">*</span></label>
                                <input type="file" name="file" id="file" class="form-control" placeholder="Masukan asal sekolah.." accept=".jpg , .jpeg , .png , .pdf">
                            </div>


                            <div class="col-md-12">
                                <button class="btn btn-primary float-end" name="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>