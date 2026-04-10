<?php
session_start();
require 'db.php';

// Validasi ID
if (!isset($_GET['id'])) {
    header("Location: landingpage.php");
    exit;
}

$id = intval($_GET['id']);

// Ambil data product
$query = mysqli_query($conn, "SELECT * FROM buku WHERE id = $id");
$product = mysqli_fetch_assoc($query);
// $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
// $stmt->bind_param("i", $id);
// $stmt->execute();
// $result = $stmt->get_result();
// $product = $result->fetch_assoc();

// Kalau buku tidak ditemukan
if (!$product) {
    header("Location: landingpage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" href="detail_buku.css">
</head>
<body>

    <div class="navbar">
        ISINE NAVBAR POKOK E
    </div>

    <div class="container">
        <div class="detail-container">
            <img src="uploads/<?= $product['gambar']; ?>" alt="<?= $product['nama']; ?>" class="detail-cover">

            <div class="detail-info">
                <h1><?= $product['nama']; ?></h1>
                <h4>Deskripsi Produk</h4>
                <p><?= nl2br($product['deskripsi']); ?></p>
                <h2 class="price">Rp. <?= number_format($product['harga'], 0, ',', '.'); ?></h2>
            </div>
        </div>
    </div>

</body>
</html>


<!-- masih perlu nyesuain product sama yang di landingpage -->
