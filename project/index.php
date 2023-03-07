<?php 
// cek apakah user sudah login
session_start();
if (!isset($_SESSION['username'])) {
    // jika belum, redirect ke login.php
    header('Location: login.php');
}

// jika sudah login, tampilkan halaman index.php 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tiket Pesawat</title>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="library\css\bootstrap.min.css" rel="stylesheet">
    <script src="library\js\bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Navbar dengan posisi di tengah -->
    <div class="container" style="margin-top: 100px;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tiket Pesawat</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home </a>
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
                </div>
                <!-- Masukan username yang sedang login -->
                <span class="navbar-text" style="margin-left: 600px;">
                    <?php echo "Selamat datang, " .$_SESSION['username']; ?>
                </span>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Strat Gambar -->
        <div class="row">
            <div class="col-md-12">
                <img src="img\pesawat.jpg" class="img-fluid" alt="Responsive image" style="width: 100%;">
            </div>
        </div>

    <h1 class="text-center">Pendaftaran Rute Terbang </h1>
    <!-- Start Form Input -->
    <!-- Style Form dengan Bootstrap -->
    <form action="fungsi.php" method="POST" class="form-horizontal">
        <table class="table table-striped" border="1">
            <tr class="form-group">
                <td class="col-sm-2">
                    Maskapai
                    <input type="text" name="maskapai" class="form-control">
                </td>
            </tr>
            <tr>
                <td class="col-sm-2">
                    Bandara Asal
                    <select name="asal" class="form-control">
                        <option value="Soekarno Hatta (CGK)">Soekarno Hatta (CGK)</option>
                        <option value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                        <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                        <option value="Juanda (SUB)">Juanda (SUB)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-sm-2">
                    Bandara Tujuan
                    <select name="tujuan" class="form-control">
                        <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                        <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                        <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                        <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-sm-2">
                    Harga Tiket
                    <input type="text" name="harga_tiket" id="harga_tiket" class="form-control">
                </td>
            </tr>
            <!-- Button dengan Bootstrap -->
            <tr class="form-group" style="text-align: center">
                <td class="col-sm-2" style="text-align: center">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <!-- Tombol Batal
                    <input type="submit" name="batal" value="Batal" class="btn btn-danger">
                    Jika tombol batal diklik, hapus data.json 
                    -->
                </td>
            </tr>
        </table>
    </form>
    <!-- End Form Input -->
    <h1 class="text-center">Daftar Rute Tersedia</h1>
    <!-- Read Data JSON -->
    <?php
    // Jika batal, hapus data.json
    if (isset($_POST['batal'])) {
        unlink('data\data.json');
    }
    // Baca data JSON
    $data = file_get_contents('data\data.json');

    // Konversi JSON menjadi array asosiatif
    $penerbangan = json_decode($data, true);
    ?>
    
    <!-- Start Table -->
    <table class="table table-striped" border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Maskapai</th>
                <th scope="col">Bandara Asal</th>
                <th scope="col">Bandara Tujuan</th>
                <th scope="col">Harga Tiket</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <!-- Tampilkan data Baru -->
        <?php
        $no = 1;
        foreach ($penerbangan as $p) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p['maskapai']; ?></td>
                <td><?= $p['asal']; ?></td>
                <td><?= $p['tujuan']; ?></td>
                <td><?= $p['harga_tiket']; ?></td>
                <td><?= $p['pajak']; ?></td>
                <td><?= $p['total']; ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table>
    <!-- End Table -->
    </div>
</body>
</html>
