<?php
// koneksi.php
include 'config.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $kode_verifikasi = $_POST['kode_verifikasi'];

    // Query untuk memeriksa kode verifikasi
    $query = "SELECT * FROM mahasiswa WHERE nim='$nim' AND kode_verifikasi='$kode_verifikasi'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Verifikasi berhasil! Anda sekarang dapat masuk.";
        // Update kode verifikasi menjadi NULL untuk menghindari verifikasi ganda
        $update_query = "UPDATE mahasiswa SET kode_verifikasi=NULL WHERE nim='$nim'";
        mysqli_query($conn, $update_query);
    } else {
        echo "Kode verifikasi salah atau NIM tidak terdaftar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Kode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Verifikasi Kode</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kode_verifikasi" class="form-label">Kode Verifikasi</label>
            <input type="text" name="kode_verifikasi" id="kode_verifikasi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Verifikasi</button>
    </form>
</div>
</body>
</html>
