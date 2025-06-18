<?php
$koneksi = mysqli_connect("localhost", "root", "", "cvweb");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "DELETE FROM tb_komentar WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    header("Location: index.php?status=deleted");
} else {
    echo "Error menghapus komentar: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>