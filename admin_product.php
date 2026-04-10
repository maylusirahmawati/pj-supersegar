<?php
require_once 'db.php';
$sql = "SELECT * FROM product";
$result= $conn->query($sql);  

$produk = $result->fetch_assoc();

?>

<?php include 'admin_sidebar.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="icon" type="image/png" href="picture/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/admin_produkk.css">
    <link rel="stylesheet" href="css/admin_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <h1 class="title">PRODUCT</h1>
    <div class="wrapper">
        <form action="product.php" method="post" enctype="multipart/form-data">
            <h2>Add Product</h2>
            <div class="card">
                <input type="text" name="nama" id="nama" placeholder="input nama produk......"><br><br>
                <input type="number" name="harga" id="harga" placeholder="input harga......"><br><br>
                <input type="deskripsi" name="deskripsi" id="deskripsi" placeholder="input deskripsi......"><br><br>
                <input type="file" name="gambar" id="gambar" placeholder="input gambar......"><br><br>
                <button type="submit">Add Product</button>
             </div>
        </form>
    </div>

    <section class="show-products">
        <div class="box-container">
            <?php
            $select_product = mysqli_query($conn, "SELECT * FROM product") or die('query failed');

            if(mysqli_num_rows($select_product) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_product)){
            ?>

            <div class="box">
                <img src="uploads/<?php echo $fetch_product['gambar']; ?>" alt=""><br>
                <div class="name"><?php echo $fetch_product['nama']; ?></div> 
                <div class="deskripsi"><?php echo $fetch_product['deskripsi']; ?></div> 
                <div class="price">Rp<?php echo $fetch_product['harga'];?>.000</div><br>
                <br>
                <a href="edit_form.php?id=<?php echo $fetch_product['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $fetch_product['id']; ?>">Delete</a>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">Tidak ada Product Untuk Sekarang</p>';
            }
            ?>
        </div>
    </section>
</body>
</html>
