<?php
session_start();

// jika tidak ada session login pindahkan ke halaman login (paksa masuk lewat url)
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
}

require '../functions/functions.php';
$detail_siswa = query("SELECT * FROM siswa");


if (isset($_POST["simpan"])) {

    if (ubah($_POST) > 0) {
        echo "
            <script> 
                alert('Status Pendaftaran Berhasil Diubah!');
            </script>
        ";
    } else {

        echo mysqli_error($koneksi);
        echo "
            <script> 
                alert('Status Pendaftaran Gagal Diubah!');
            </script>
        ";
    }
}

// search
if (isset($_POST["cari"])) {
    $detail_siswa = cari($_POST["keyword"]);
    echo mysqli_error($koneksi);
}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Admin</title>
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
                <a href="../logout.php" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan keluar akun?')"><i class="bi bi-box-arrow-left"></i> Logout</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    <div class="container border mt-5">
        <h4 class="text-center p-2">Data Peserta Seleksi</h4>
        <div class="row mb-3">
            <div class="col-4">
                <form class="d-flex" action="" method="post">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Search">
                    <button class="btn btn-outline-primary btn-sm" type="submit" name="cari">Cari</button>
                </form>
            </div>
        </div>




        <!-- TABLE -->
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tempat & Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Orang Tua</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Rata-rata UN</th>
                    <th scope="col">Status Pendaftaran</th>
                    <th scope="col">Ubah Status Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = +1; ?>
            <?php foreach ($detail_siswa as $siswa) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $siswa["nama"]; ?></td>
                    <td><?= $siswa["gender"]; ?></td>
                    <td><?= $siswa["ttl"]; ?></td>
                    <td><?= $siswa["alamat"]; ?></td>
                    <td><?= $siswa["orang_tua"]; ?></td>
                    <td><?= $siswa["asal_sekolah"]; ?></td>
                    <td><?= $siswa["rata_un"]; ?></td>
                    <td><?= $siswa["status"]; ?></td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $siswa["id"] ?>">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>

                        <!-- Modal -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
                            <div class="modal fade" id="staticBackdrop<?= $siswa["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Status Pendaftaran Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Select Bar -->
                                            <div class="form-floating">
                                                <select name="status" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                    <option selected disabled>Pilih Status Pendaftaran</option>
                                                    <option name="status" value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    <option name="status" value="Terima">Terima</option>
                                                    <option name="status" value="Cadangkan">Cadangkan</option>
                                                    <option name="status" value="Tidak Diterima">Tidak Diterima</option>
                                                </select>
                                                <label for="floatingSelect">Pilih Status Pendaftaran</label>
                                            </div>
                                            <!-- End Select Bar -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                            <!-- Jika tombol simpan ditekan maka akan otomatis ter-refresh -->
                                            <?php if (isset($_POST["simpan"])) : ?>
                                                <script>
                                                    window.location.href = "seleksiPeserta.php";
                                                </script>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <!-- END TABLE -->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>