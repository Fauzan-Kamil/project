<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="library\css\bootstrap.min.css" rel="stylesheet">
    <script src="library\js\bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Form register -->
    <form action="" method="POST" class="form-horizontal">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" required>
        <small id="emailHelp" class="form-text text-muted">Masukan username anda</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required />
      </div>
      <br>
      <div>
        <p class="text-center">Sudah punya akun? <a href="login.php">Login</a></p>
      </div>
      <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
    </form>
    <!-- End Form register -->
    <?php
    // Register system
    session_start();
    // cek apakah form register disubmit
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // ambil data dari file user.json
        $data = file_get_contents('data/user.json');
        // ubah data json menjadi array
        $data = json_decode($data, true);
        // cek apakah username sudah ada di dalam array
        foreach ($data as $user) {
            if ($user['username'] == $_POST['username']) {
                // jika ada, tampilkan pesan error
                echo "<div class='alert alert-danger' role='alert'>Username sudah ada</div>";
                exit;
            }
        }
        // jika tidak ada, tambahkan data ke dalam array
        $data[] = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];
        // ubah data array menjadi json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        // simpan data ke file user.json
        file_put_contents('data/user.json', $data);
        // redirect ke halaman login.php
        header('Location: login.php');
        exit;
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // jika form kosong, tampilkan pesan error
        echo "<div class='alert alert-danger' role='alert'>Form register harus diisi</div>";
    }
    ?>