<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$query = "DELETE FROM nilai WHERE id = $id";
if ($conn->query($query) === TRUE) {
    header("Location: lihat_nilai.php?message=deleted");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
