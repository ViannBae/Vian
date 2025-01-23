<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM nilai WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];

    $conn->query("UPDATE nilai SET nilai='$nilai' WHERE id=$id");
    
    header("Location: lihat_nilai.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Nilai</title>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center text-primary">Edit Nilai Perkuliahan</h2>
        <form method="post" class="p-4 bg-light shadow-sm rounded">
            <div class="mb-3">
                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" class="form-control" id="mata_kuliah" value="<?php echo $row['mata_kuliah_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" name="nilai" class="form-control" id="nilai" value="<?php echo $row['nilai']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="lihat_nilai.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
