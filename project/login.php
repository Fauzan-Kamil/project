<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="library\css\bootstrap.min.css" rel="stylesheet">
    <script src="library\js\bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Form login -->
<form action="" method="POST" class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" required />
    <small id="emailHelp" class="form-text text-muted">Masukan username anda</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required />
  </div>
  <br>
  <div>
    <p class="text-center">Belum punya akun? <a href="register.php">Register</a></p>
  </div>
  <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
</form>
<!-- End Form login -->

<?php 
// Login system
session_start();
// cek apakah user sudah login
if (isset($_SESSION['username'])) {
    // jika sudah, redirect ke halaman index.php
    header('Location: index.php');
    exit;
}

// cek apakah form login disubmit
if (isset($_POST['username']) && isset($_POST['password'])) {
    // ambil data dari file user.json
    $data = file_get_contents('data/user.json');
    // ubah data json menjadi array
    $data = json_decode($data, true);
    // cek apakah username dan password ada di dalam array
    foreach ($data as $user) {
        if ($user['username'] == $_POST['username'] && $user['password'] == $_POST['password']) {
            // jika ada, buat session
            $_SESSION['username'] = $_POST['username'];
            // redirect ke halaman index.php
            header('Location: index.php');
            exit;
        }
    }
    // jika tidak ada, tampilkan pesan error
    echo "<div class='alert alert-danger' role='alert'>Username atau password salah</div>";
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // jika form kosong, tampilkan pesan error
    echo "<div class='alert alert-danger' role='alert'>Form login harus diisi</div>";
}
?>

</body>
</html>
