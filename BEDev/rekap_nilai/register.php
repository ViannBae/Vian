<?php
include 'config.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kode_verifikasi = $_POST['kode_verifikasi'];

    $result = $conn->query("SELECT * FROM mahasiswa WHERE level='Mahasiswa' AND kode_verifikasi='$kode_verifikasi'");

    if ($result->num_rows > 0) {
        $conn->query("INSERT INTO users (username, password, nama, nim, level, kode_verifikasi) VALUES ('$username', '$password', '$nama','$nim', 'Mahasiswa', '$kode_verifikasi')");
        echo "Registrasi berhasil. Silakan login.";
    } else {
        echo "Kode verifikasi salah atau tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Rekapitulasi Nilai Amikom</title>
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
        
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Rekapitulasi Nilai Amikom</a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_verifikasi" class="form-label">Kode Verifikasi</label>
                            <input type="text" name="kode_verifikasi" id="kode_verifikasi" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Sudah punya akun? <a href="index.php">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
