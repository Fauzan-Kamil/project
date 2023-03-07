<?php


require 'functions/functions.php';


if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "
            <script> 
                alert('Register Akun Berhasil!');
                document.location.href = 'login.php';
            </script>
        ";
    } else {

        echo "
            <script> 
                alert('Register Akun Gagal!');
            </script>
        ";

        echo mysqli_error($koneksi);
    }
}


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

    <!-- FORM -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form class="mt-5 border p-4 bg-light shadow" action="" method="post">
                        <h4 class="mb-5 text-secondary">Buat Akun Baru</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Nama Depan</label>
                                <input type="text" name="fname" class="form-control" placeholder="Masukan Nama Depan">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Nama Belakang</label>
                                <input type="text" name="lname" class="form-control" placeholder="Masukan Nama Belakang">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Konfirmasi Password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary float-end" type="submit" name="register">Register</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3 text-secondary">Jika kamu sudah memiliki akun <a href="login.php" class="text-decoration-none">Login Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END FORM -->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>