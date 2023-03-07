<?php
$koneksi = mysqli_connect("localhost", "root", "", "ppdb_db");


function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function tambahSiswa($data)
{
    global $koneksi;
    $nama       = $data['nama'];
    $gender     = $data['gender'];
    $ttl        = $data['tempat'] . "," . $data['tanggal'];
    $alamat     = $data['alamat'];
    $ortu       = $data['ortu'];
    $sekolah    = $data['sekolah'];
    $un         = $data['un'];
    $wa         = $data['wa'];

    // upload gambar
    $file     = upload();
    if (!$file) {
        return false;
    }


    $query = "INSERT INTO siswa VALUES ('','$nama', '$gender', '$ttl', '$alamat', '$ortu', '$sekolah', '$un', '$file', 'Menunggu Konfirmasi')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    // 4 = tidak ada gambar yg di upload
    if ($error === 4) {
        echo "<script>
                alert('Pilih file terlebih dahulu!');
            </script>";
        return false;
    }


    // verifikasi ukuran file
    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('Ukuran file melebihi 2 MB!');
            </script>";
        return false;
    }

    // lolos verifikasi
    $namaFileBaru = rand(1, 1000) . '-' . $namaFile;
    move_uploaded_file($tmpName, 'files/' . $namaFileBaru);

    // kenapa di return untuk mengembalikan namanya di function 'tambah' dan nama bisa dimasukan di DB
    return $namaFileBaru;
}


function ubah($data)
{
    global $koneksi;

    $status = $data["status"];
    $id = $data["id"];

    $query = "UPDATE siswa SET status = '$status' WHERE id = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function register($data)
{
    global $koneksi;

    $nama       = $data['fname'] . " " . $data['lname'];
    $username   = $data['username'];
    $email      = $data['email'];
    $password   = $data['password'];
    $password2  = $data['confirmPassword'];

    if ($password !== $password2) {
        echo "<script>
        alert('Password yang dimasukan tidak sama!');
            </script>";
        return false;
    }

    // //! Enkripsi password
    // $password = md5($password);
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES ('', '$nama', '$username' ,'$email', '$password' , 'user')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function cari($keyword)
{
    $query = "SELECT * FROM siswa WHERE
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                asal_sekolah LIKE '%$keyword%' OR
                rata_un LIKE '%$keyword%'";

    return query($query);
}
