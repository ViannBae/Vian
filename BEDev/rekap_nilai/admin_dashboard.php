<?php
session_start();
if ($_SESSION['level'] != 'Admin') {
    header("Location: index.php");
    exit();
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Rekapitulasi Nilai Amikom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #800000;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .btn-primary {
            background-color: #800000;
            border-color: #800000;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Dashboard Admin</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">Selamat Datang, Admin</h2>
    <div class="row justify-content-center mt-4">
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Tambah Mahasiswa</h5>
                    <a href="tambah_mahasiswa.php" class="btn btn-primary">Tambah Mahasiswa</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Tambah Mata Kuliah</h5>
                    <a href="tambah_mata_kuliah.php" class="btn btn-primary">Tambah Mata Kuliah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
