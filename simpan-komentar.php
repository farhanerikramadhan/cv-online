<?php
$koneksi = mysqli_connect("localhost", "root", "", "cvweb");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

if (empty($nama) || empty($email) || empty($komentar)) {
    die("Semua field harus diisi!");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid!");
}

$sql = "INSERT INTO tb_komentar (nama, email, komentar, waktu) 
        VALUES ('$nama', '$email', '$komentar', NOW())";

if (mysqli_query($koneksi, $sql)) {
    header("Location: index.php?status=success");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>