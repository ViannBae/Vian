<?php
// proses_tambah_nilai.php
include 'config.php'; // Menyertakan file koneksi

// Mendapatkan data dari form
$nim = $_POST['nim'];
$mata_kuliah = $_POST['mata_kuliah'];
$nilai = $_POST['nilai'];

// Menyimpan data ke database
$query = "INSERT INTO nilai (nim, mata_kuliah, nilai) VALUES ('$nim', '$mata_kuliah', '$nilai')";

if (mysqli_query($conn, $query)) {
    echo "Nilai berhasil ditambahkan!";
    header("Location: lihat_nilai.php"); // Redirect ke halaman lihat nilai setelah berhasil
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
