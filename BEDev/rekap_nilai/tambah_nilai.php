<?php
include 'config.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $nim = $_POST['nim'] ?? null;
    $mata_kuliah_id = $_POST['mata_kuliah_id'] ?? null; // Menggunakan mata_kuliah_id
    $nilai = $_POST['nilai'] ?? null;

    if ($nim && $mata_kuliah_id && $nilai !== null) {
        // Ambil `id` mahasiswa dari tabel `users` berdasarkan `nim`
        $mahasiswa_query = "SELECT id FROM users WHERE nim = '$nim'";
        $mahasiswa_result = mysqli_query($conn, $mahasiswa_query);
        $mahasiswa_row = mysqli_fetch_assoc($mahasiswa_result);
        $mahasiswa_id = $mahasiswa_row['id'] ?? null;

        if ($mahasiswa_id) {
            // Query untuk menambahkan nilai ke tabel `nilai`
            $query = "INSERT INTO nilai (mahasiswa_id, mata_kuliah_id, nilai) VALUES ('$mahasiswa_id', '$mata_kuliah_id', '$nilai')";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Nilai berhasil ditambahkan!'); window.location.href='dosen_dashboard.php';</script>";
            } else {
                echo "Error menambahkan nilai: " . mysqli_error($conn);
            }
        } else {
            echo "Mahasiswa tidak ditemukan.";
        }
    } else {
        echo "Pastikan semua field terisi dengan benar.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai - Rekapitulasi Nilai Amikom</title>
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
                    <a class="nav-link" href="dosen_dashboard.php">Kembali</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-4">Tambah Nilai</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <select name="nim" id="nim" class="form-select" required>
                <option value="">Pilih NIM</option>
                <?php
                // Ambil data NIM dari database
                $nim_query = "SELECT nim FROM mahasiswa";
                $nim_result = mysqli_query($conn, $nim_query);
                while ($row = mysqli_fetch_assoc($nim_result)) {
                    echo "<option value='{$row['nim']}'>{$row['nim']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-select" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php
                // Ambil data Mata Kuliah dari database
                $mk_query = "SELECT id, nama_mata_kuliah FROM mata_kuliah";
                $mk_result = mysqli_query($conn, $mk_query);
                while ($row = mysqli_fetch_assoc($mk_result)) {
                    echo "<option value='{$row['id']}'>{$row['nama_mata_kuliah']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Tambah Nilai</button>
        </div>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 Universitas Amikom Yogyakarta. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>