<?php
$page_title = "Cafetaria List";
include 'includes/config.php';
include 'includes/header.php';

// Get all cafeterias with their menus
$cafeterias = $conn->query("SELECT * FROM cafeterias");
?>

<section id="cafetaria">
    <div class="container">
        <h2>Daftar Kantin Sekolah</h2>

        <div class="kantin-container">
            <?php while($cafeteria = $cafeterias->fetch_assoc()): ?>
            <?php 
                $menus = $conn->query("SELECT * FROM menus WHERE cafeteria_id = {$cafeteria['id']} LIMIT 4");
            ?>
            <div class="kantin-box">
                <h3 class="kantin-title"><?php echo $cafeteria['name']; ?></h3>
                <div class="kantin-content">
                    <div class="kantin-image">
                        <img src="<?php echo $base_url; ?>assets/images/<?php echo $cafeteria['image']; ?>" alt="<?php echo $cafeteria['name']; ?>">
                    </div>
                    <div class="menu-list">
                        <?php while($menu = $menus->fetch_assoc()): ?>
                        <div class="menu-item">
                            <img src="<?php echo $base_url; ?>assets/images/<?php echo $menu['image']; ?>" alt="<?php echo $menu['name']; ?>">
                            <p><?php echo $menu['name']; ?> - <?php echo format_rupiah($menu['price']); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>