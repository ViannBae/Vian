<?php
include 'config.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username']; // Menambahkan username
    $level = 'Mahasiswa'; // Level default untuk mahasiswa

    // Menghasilkan kode verifikasi acak
    $kode_verifikasi = substr(md5(uniqid(rand(), true)), 0, 10);

    // Query untuk menambahkan mahasiswa ke tabel mahasiswa
    $query_mahasiswa = "INSERT INTO mahasiswa (nim, nama, email, username, level, kode_verifikasi) VALUES ('$nim', '$nama', '$email', '$username', '$level', '$kode_verifikasi')";

    // Eksekusi query untuk tabel mahasiswa
    if (mysqli_query($conn, $query_mahasiswa)) {
        // Kirim kode verifikasi atau notifikasi ke user
        echo "<script>alert('Data mahasiswa berhasil ditambahkan! Kode verifikasi: $kode_verifikasi'); window.location.href='mahasiswa_dashboard.php';</script>";
    } else {
        // Jika gagal menambahkan ke tabel mahasiswa
        echo "Error menambahkan ke tabel mahasiswa: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa - Rekapitulasi Nilai Amikom</title>
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
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php">Kembali</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-4">Tambah Mahasiswa</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
        </div>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 Universitas Amikom Yogyakarta. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
