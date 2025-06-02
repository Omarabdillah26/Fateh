<?php
$page_title = "Home";
include 'includes/config.php';
include 'includes/header.php';
?>


<main class="main-content">
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang di KantinKu</h1>
            <p class="subtitle">Kantin digital sekolah dengan pembayaran mudah</p>
            <a href="cafeteria.php" class="cta-button">Lihat Menu</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="feature">
                <div class="feature-icon">⚡</div>
                <h3>Cepat</h3>
                <p>Proses pemesanan dan pembayaran hanya dalam hitungan detik</p>
            </div>
            
            <div class="feature">
                <div class="feature-icon">📱</div>
                <h3>Mudah</h3>
                <p>Bayar cukup dengan scan QR code</p>
            </div>
            
            <div class="feature">
                <div class="feature-icon">🧼</div>
                <h3>Hygienis</h3>
                <p>Makanan dan minuman terjamin kebersihannya</p>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>