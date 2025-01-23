<?php
// koneksi.php
include 'config.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];

    // Mengecek apakah kode mata kuliah sudah ada
    $cek_query = "SELECT * FROM mata_kuliah WHERE kode_mata_kuliah = '$kode_mata_kuliah'";
    $cek_result = mysqli_query($conn, $cek_query);

    if (mysqli_num_rows($cek_result) > 0) {
        echo "<script>alert('Kode mata kuliah sudah ada! Silakan gunakan kode yang berbeda.'); window.history.back();</script>";
    } else {
        // Query untuk menambahkan mata kuliah
        $query = "INSERT INTO mata_kuliah (kode_mata_kuliah, nama_mata_kuliah) VALUES ('$kode_mata_kuliah', '$nama_mata_kuliah')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Mata kuliah berhasil ditambahkan!'); window.location.href='dosen_dashboard.php';</script>";
        } else {
            echo "Error menambahkan mata kuliah: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah - Rekapitulasi Nilai Amikom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #800000;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .container {
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #800000;
            border-color: #800000;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Rekapitulasi Nilai Amikom</a>
    </div>
</nav>

<div class="container">
    <h2 class="mt-4">Tambah Mata Kuliah</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="kode_mata_kuliah" class="form-label">Kode Mata Kuliah</label>
            <input type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah" class="form-control" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
        </div>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 Universitas Amikom Yogyakarta. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
