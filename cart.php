<?php
require_once 'db.php';
$sql = "SELECT * FROM product";
$result= $conn->query($sql);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produk.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="heading">
            <h3>Our Products</h3>
            <p><a href="landingpage.php" style="color: white;" ><i class="bi bi-house" style="color: white;" ></i> Home</a> <a href="cart.php" style="color: white;">/ <i class="bi bi-cart-fill" style="color: white;"></i> Cart </a>/ <i class="bi bi-bag-fill"></i> My Orders </p>
        </div>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Cari produk...">
            <button type="button" id="search-btn"><i class="bi bi-search"></i></button>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="box-container">
                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM product") or die('query failed');
    
                if(mysqli_num_rows($select_product) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
    
                <div class="box-product">
                    <span class="discount" style="color: white">-10%</span>
                    <div class="image">
                        <img src="uploads/<?php echo $fetch_product['gambar']; ?>" alt=""><br>
                        <div class="icons-produk">
                            <a href="#" class="bi bi-heart-fill"></a>
                            <a href="cart.php?id=<?php echo $fetch_product['id']; ?>">Add to Cart</a>
                            <a href="" class="bi bi-eye-fill"></a> 
                        </div>
                    </div>
                    <div class="content-product">
                        <div class="name"><?php echo $fetch_product['nama']; ?></div> 
                        <div class="price">Rp<?php echo $fetch_product['harga'];?>.000</div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo '<p class="empty">Tidak ada Product Untuk Sekarang</p>';
                }
                ?>
            </div>
        </div>
    </main>

    <script src="js/search.js"></script>
</body>
</html>