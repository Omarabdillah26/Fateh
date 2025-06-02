<?php
$page_title = "How to Buy";
include 'includes/config.php';
include 'includes/header.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_items = $_POST['menu'] ?? [];
    $total = 0;
    
    // Calculate total
    foreach ($selected_items as $item_id) {
        $item = $conn->query("SELECT price FROM menus WHERE id = $item_id")->fetch_assoc();
        $total += $item['price'];
    }
    
    // Generate QR code data
    $qr_data = [
        'items' => $selected_items,
        'total' => $total,
        'date' => date('Y-m-d H:i:s')
    ];
    
    // Save to session
    $_SESSION['cart'] = $qr_data;
}
?>

<section id="buy">
    <div class="container">
        <h2>Cara Membeli</h2>

        <div class="buy-container">
            <form method="post" class="form-container">
                <h3>Pilih Menu</h3>

                <?php 
                $cafeterias = $conn->query("SELECT * FROM cafeterias");
                while($cafeteria = $cafeterias->fetch_assoc()): 
                ?>
                <div class="menu-select">
                    <label><?php echo $cafeteria['name']; ?></label>
                    <select multiple name="menu[]" onchange="updateTotal()">
                        <?php 
                        $menus = $conn->query("SELECT * FROM menus WHERE cafeteria_id = {$cafeteria['id']}");
                        while($menu = $menus->fetch_assoc()): 
                        ?>
                        <option value="<?php echo $menu['id']; ?>">
                            <?php echo $menu['name']; ?> - <?php echo format_rupiah($menu['price']); ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <?php endwhile; ?>

                <p class="note">* Tekan Ctrl/Cmd untuk memilih multiple items</p>

                <div class="total-box">
                    <p>Total Harga: <span id="total">Rp0</span></p>
                </div>

                <button type="submit" class="pay-button">Bayar Sekarang</button>
            </form>

            <?php if (isset($_SESSION['cart'])): ?>
            <div class="qr-container">
                <h3>Pembayaran</h3>
                <p>Scan QR code berikut untuk menyelesaikan pembayaran:</p>
                <div class="qr-code">
                    <?php
                    require_once 'phpqrcode/qrlib.php';
                    $qr_file = 'assets/qrcodes/' . md5(json_encode($_SESSION['cart'])) . '.png';
                    QRcode::png(json_encode($_SESSION['cart']), $qr_file);
                    ?>
                    <img src="<?php echo $base_url . $qr_file; ?>" width="200" alt="QR Code Pembayaran">
                </div>
                <p class="qr-note">Total: <?php echo format_rupiah($_SESSION['cart']['total']); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
function updateTotal() {
    const selected = document.querySelectorAll('select[name="menu[]"] option:checked');
    let total = 0;
    
    selected.forEach(opt => {
        const priceText = opt.textContent.split(' - Rp')[1];
        if (priceText) {
            total += parseInt(priceText.replace(/\./g, ''));
        }
    });
    
    document.getElementById("total").innerText = "Rp" + total.toLocaleString("id-ID");
}
</script>

<?php include 'includes/footer.php'; ?>