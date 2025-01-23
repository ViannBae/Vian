<?php
// koneksi.php
include 'config.php'; // Menghubungkan ke database

// Mengambil data nilai dari database
$query = "SELECT n.id, m.nim, m.nama AS nama_mahasiswa, mk.nama_mata_kuliah, n.nilai 
          FROM nilai n 
          JOIN users m ON n.mahasiswa_id = m.id  
          JOIN mata_kuliah mk ON n.mata_kuliah_id = mk.id";  
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Nilai - Rekapitulasi Nilai Amikom</title>
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
    <h2 class="mt-4">Lihat Nilai Mahasiswa</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
                <th>Aksi</th> <!-- Kolom untuk Edit dan Hapus -->
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['nim']}</td>
                            <td>{$row['nama_mahasiswa']}</td>
                            <td>{$row['nama_mata_kuliah']}</td>
                            <td>{$row['nilai']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus nilai ini?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Tidak ada data nilai.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="footer">
    <p>&copy; 2024 Universitas Amikom Yogyakarta. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
