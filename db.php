<?php
$koneksi = mysqli_connect("localhost", "root", "", "cvweb");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
