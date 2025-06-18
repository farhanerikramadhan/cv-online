<?php
$koneksi = mysqli_connect("localhost", "root", "", "cvweb");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM tb_komentar WHERE id = $id";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) == 0) {
    die("Komentar tidak ditemukan!");
}

$komentar = mysqli_fetch_assoc($hasil);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $komentar_text = mysqli_real_escape_string($koneksi, $_POST['komentar']);
    
    if (empty($nama) || empty($email) || empty($komentar_text)) {
        $error = "Semua field harus diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } else {
        $sql_update = "UPDATE tb_komentar SET nama='$nama', email='$email', komentar='$komentar_text' WHERE id=$id";
        
        if (mysqli_query($koneksi, $sql_update)) {
            header("Location: index.php?status=updated");
            exit();
        } else {
            $error = "Gagal memperbarui komentar: " . mysqli_error($koneksi);
        }
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-content">
            <h1>✏️ Edit Komentar</h1>
        </div>
    </header>

    <main>
        <section>
            <h2>Edit Komentar</h2>
            
            <?php if (isset($error)): ?>
                <div class="error-message" style="color: red; margin-bottom: 1rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($komentar['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($komentar['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="komentar">Komentar:</label>
                    <textarea id="komentar" name="komentar" rows="4" required><?php echo htmlspecialchars($komentar['komentar']); ?></textarea>
                </div>
                <button type="submit" class="submit-btn">Simpan Perubahan</button>
                <a href="index.php" class="interactive-btn" style="display: inline-block; margin-left: 1rem;">Batal</a>
            </form>
        </section>
    </main>

    <footer>
        <p>© 2023 CV Mahasiswa Sistem Informasi - Masoem University</p>
    </footer>
</body>
</html>