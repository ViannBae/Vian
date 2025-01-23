<?php
session_start();
if ($_SESSION['level'] != 'Mahasiswa') {
    header("Location: index.php");
    exit();
}
include 'config.php';

// Ambil ID mahasiswa dari session
$id = $_SESSION['id'];

// Query untuk mendapatkan data nilai mahasiswa dari tabel `nilai` yang bergabung dengan `mata_kuliah`
$nilai_query = "SELECT mata_kuliah.nama_mata_kuliah, nilai.nilai 
                FROM nilai 
                JOIN mata_kuliah ON nilai.mata_kuliah_id = mata_kuliah.id 
                WHERE nilai.mahasiswa_id = $id";
$nilai_result = $conn->query($nilai_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - Rekapitulasi Nilai Amikom</title>
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
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-4">Dashboard Mahasiswa</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Nilai Mata Kuliah</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Cek apakah ada data nilai
                            if ($nilai_result->num_rows > 0) {
                                // Tampilkan data nilai
                                while ($row = $nilai_result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['nama_mata_kuliah']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nilai']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='2'>Tidak ada data nilai tersedia.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 Universitas Amikom Yogyakarta. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
