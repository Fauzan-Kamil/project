<?php 
// Deklarasi array penerbangan
$penerbangan = array();

// Ambil data dari form
if (isset($_POST['maskapai'], $_POST['asal'], $_POST['tujuan'], $_POST['harga_tiket'])) {
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $harga_tiket = (float) $_POST['harga_tiket'];

    // Hitung pajak bandara asal
    if ($asal == 'Soekarno Hatta (CGK)') {
        $pajak = 50000;
    } elseif ($asal == 'Abdul Rachman Saleh (MLG)') {
        $pajak = 40000;
    } elseif ($asal == 'Husein Sastranegara (BDO)') {
        $pajak = 30000;
    } elseif ($asal == 'Juanda (SUB)') {
        $pajak = 40000;
    }

    // Hitung Pajak Bandara Tujuan
    if ($tujuan == 'Ngurah Rai (DPS)') {
        $pajak += 80000;
    } elseif ($tujuan == 'Hasanuddin (UPG)') {
        $pajak += 70000;
    } elseif ($tujuan == 'Inanwatan (INX)') {
        $pajak += 90000;
    } elseif ($tujuan == 'Sultan Iskandarmuda (BTJ)') {
        $pajak += 70000;
    }

    // Hitung Total
    $total = $harga_tiket + $pajak;

    // ubah harga_tiket ke format rupiah
    $harga_tiket = "Rp " . number_format($harga_tiket, 2, ',', '.');
    $pajak = "Rp " . number_format($pajak, 2, ',', '.');
    $total = "Rp " . number_format($total, 2, ',', '.');

    // Tambahkan data ke array
    $penerbangan[] = array(
        'maskapai' => $maskapai,
        'asal' => $asal,
        'tujuan' => $tujuan,
        'harga_tiket' => $harga_tiket,
        'pajak' => $pajak,
        'total' => $total
    );

    // simpan data kedalam file JSON tanpa menghapus data sebelumnya
    $file = 'data\data.json';
    $data = file_get_contents($file);
    $data = json_decode($data, true);
    $data = array_merge($data, $penerbangan);
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($file, $data);

    // Setelah data disimpan, kembalikan ke index.php
    header('Location: index.php');

    // Sort data berdasarkan yang diisi terakhir
    //$data = json_decode($data, true);
    //$data = array_reverse($data);
    //$data = json_encode($data, JSON_PRETTY_PRINT);
    //file_put_contents($file, $data);

    // Sort data berdasarkan abjad maskapai
    $data = json_decode($data, true);
    usort($data, function ($a, $b) {
        return $a['maskapai'] <=> $b['maskapai'];
    });
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($file, $data);
}

// Tampilkan data kedalam index.php dengan foreach
$no = 1;
foreach ($penerbangan as $p) {
    echo "<tr>
            <td>{$no}</td>
            <td>{$p['maskapai']}</td>
            <td>{$p['asal']}</td>
            <td>{$p['tujuan']}</td>
            <td>{$p['harga_tiket']}</td>
            <td>{$p['pajak']}</td>
            <td>{$p['total']}</td>
        </tr>";
    $no++;
}

?>
