<?php
$page_title = "About Kantin";
include 'includes/config.php';
include 'includes/header.php';

// Get about info from database
$about_query = $conn->query("SELECT * FROM about LIMIT 1");
$about = $about_query->fetch_assoc();
?>

<section id="about">
    <div class="container">
        <h2>Tentang Kantin Sekolah</h2>
        <p><?php echo $about['description']; ?></p>

        <div class="media-container">
            <img src="<?php echo $base_url; ?>assets/images/<?php echo $about['image']; ?>" alt="Gambar Kantin" width="400">
            <video width="400" controls>
                <source src="<?php echo $base_url; ?>assets/videos/<?php echo $about['video']; ?>" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>