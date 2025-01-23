<?php
session_start();
include 'config.php';

if ($_SESSION['level'] != 'Admin') {
    header("Location: index.php");
    exit();
}

if (isset($_POST['tambah_mata_kuliah'])) {
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];

    // Tambahkan mata kuliah ke database
    $stmt = $conn->prepare("INSERT INTO mata_kuliah (nama) VALUES (?)");
    $stmt->bind_param("s", $nama_mata_kuliah);
    
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Mata kuliah berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan mata kuliah.</div>";
    }
    
    $stmt->close();
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
    <h2 class="mt-4">Tambah Mata Kuliah</h2>
    <form method="post" action="proses_tambah_mata_kuliah.php">
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
