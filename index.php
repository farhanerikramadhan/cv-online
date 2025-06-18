<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Saya - Mahasiswa Sistem Informasi</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <header>
        <div class="header-content">
            <img src="foto-profil.jpg" alt="Foto Profil" class="profile-image" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #00bcd4;">
            <h1>👨‍🎓 Farhan Erik Ramadhan</h1>
            <p>Mahasiswa Sistem Informasi Semester 2 - Masoem University</p>
        </div>
        <nav id="main-nav">
    <button class="hamburger" id="hamburger">☰</button>
    <ul id="nav-links">
        <li><a href="#about">🏠 Tentang Saya</a></li>
        <li><a href="#skills">🛠️ Keahlian</a></li>
        <li><a href="#education">📚 Pendidikan</a></li>
        <li><a href="#contact">📱 Kontak</a></li>
        <li><a href="#guestbook">📖 Buku Tamu</a></li>
    </ul>
</nav>
    </header>

    <main>
        <section id="about">
            <h2>👋 Tentang Saya</h2>
            <p>Halo! Nama saya Farhan Erik Ramadhan, mahasiswa aktif semester 2 Program Studi Sistem Informasi di Masoem University. Saya merupakan lulusan dari SMA Pasundan Rancaekek, jurusan Ilmu Pengetahuan Sosial (IPS). Latar belakang pendidikan saya di bidang IPS memperkuat kemampuan analisis dan komunikasi saya, sementara minat dan ketertarikan saya terhadap teknologi informasi mendorong saya untuk mendalami dunia sistem informasi.

Sejak memulai perkuliahan, saya aktif mempelajari berbagai dasar dalam pengembangan web, pemrograman, serta pengelolaan data. Saya memiliki semangat belajar tinggi dalam memahami HTML, CSS, JavaScript, dan dasar-dasar PHP & MySQL. Selain itu, saya juga terbiasa menggunakan aplikasi produktivitas seperti Microsoft Office dan tertarik pada bidang analisis data.

Saya memiliki karakter yang bertanggung jawab, suka bekerja dalam tim, dan terbuka terhadap hal-hal baru. Dalam jangka panjang, saya berharap dapat berkontribusi di dunia teknologi melalui pengembangan sistem yang bermanfaat bagi masyarakat serta terus meningkatkan keterampilan teknis dan profesional saya di bidang ini.</p>
        </section>

        <section id="skills">
            <h2>🛠️ Keahlian</h2>
            <ul>
                <li>HTML & CSS Dasar</li>
                <li>JavaScript Dasar</li>
                <li>PHP & MySQL Dasar</li>
                <li>Analisis Data Dasar</li>
            </ul>
        </section>

        <section id="education">
            <h2>📚 Pendidikan</h2>
            <div class="education-item">
                <h3>Masoem University</h3>
                <p>Jurusan Sistem Informasi | 2024 - Sekarang</p>
            </div>
            <div class="education-item">
                <h3>SMA Pasundan Rancaekek</h3>
                <p>Jurusan IPS | 2021 - 2024</p>
            </div>
        </section>

        <section id="contact">
            <h2>📱 Kontak</h2>
            <ul>
                <li>Email: farhanerikramadhan@masoemuniversity.ac.id</li>
                <li>Telepon: +62 812-3456-7890</li>
                <li>GitHub: github.com/farhanerikramadhan</li>
            </ul>
            <button id="contact-btn" class="interactive-btn">💬 Tampilkan Info Kontak Lengkap</button>
            <div id="contact-details" class="hidden">
                <p>Alamat: Jl.Kamboja 2, Bandung</p>
                <p>Instagram: @ahaaannnnnnnnn</p>
            </div>
        </section>

        <section id="guestbook">
            <h2>📖 Buku Tamu</h2>
            <div class="guestbook-container">
                <form action="simpan-komentar.php" method="POST" class="guestbook-form">
                    <h3>Tinggalkan Komentar</h3>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="komentar">Komentar:</label>
                        <textarea id="komentar" name="komentar" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Kirim Komentar</button>
                </form>

                <div class="comments-section">
                    <h3>Komentar Pengunjung</h3>
                    <div class="comments-list">
                        <?php

                        $koneksi = mysqli_connect("localhost", "root", "", "cvweb");
                        
                        if (!$koneksi) {
                            die("Koneksi gagal: " . mysqli_connect_error());
                        }
                        
                        $sql = "SELECT * FROM tb_komentar ORDER BY waktu DESC";
                        $hasil = mysqli_query($koneksi, $sql);
                        
                        if (mysqli_num_rows($hasil) > 0) {
                            while($row = mysqli_fetch_assoc($hasil)) {
                                                                echo '<small>' . date('d M Y - H:i', strtotime($row['waktu'])) . '</small>';
                                echo '<p>' . htmlspecialchars($row['komentar']) . '</p>';
                                echo '<a href="edit.php?id=' . $row['id'] . '">✏️ Edit</a> | ';
                                echo '<a href="hapus.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus komentar ini?\')">🗑️ Hapus</a>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Belum ada komentar.</p>';
                        }

                        mysqli_close($koneksi);
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 FarhanErikRamadhan - Masoem University</p>
    </footer>

    <script>
    document.getElementById('contact-btn').addEventListener('click', function () {
        const detail = document.getElementById('contact-details');
        detail.classList.toggle('hidden');
        this.textContent = detail.classList.contains('hidden') 
            ? '💬 Tampilkan Info Kontak Lengkap' 
            : '🙈 Sembunyikan Info Kontak';
    });

    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('nav-links');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>
<script src="script.js"></script>
</body>
</html>

