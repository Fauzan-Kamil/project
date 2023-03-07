<?php
session_start();

// kalau sudah login, arahkan ke index
if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

require 'functions/functions.php';


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $data = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        //! cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
        }


        // ------------------------------------ 
        $_SESSION["login"] = true;
        // CEK LEVEL USER
        if ($data["level"] == "admin") {
            // Kalau berhasil sebagai admin
            echo " <script>alert('Berhasil Login')</script>";
            echo "  <script>document.location = 'admin/index.php'</script>";
        } else {
            // Kalau berhasil sebagai user
            echo " <script>alert('Berhasil Login')</script>";
            echo "  <script>document.location = 'index.php'</script>";
        }
    } else {
        echo "<script>alert('Username atau password salah')</script>";
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
                <div class="signin-form">
                    <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                        <h4 class="mb-5 text-secondary">Login Akun</h4>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label>Username</span></label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" name="login" class="btn btn-primary float-end">Login</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3 text-secondary">Jika kamu belum memiliki akun <a href="register.php" class="text-decoration-none">Registrasi Sekarang</a></p>
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