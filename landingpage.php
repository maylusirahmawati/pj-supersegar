<?php
require_once 'db.php';
$sql = "SELECT * FROM product";
$result= $conn->query($sql);  

$produk = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/landingpages.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <header> 
        <nav class="navbar">
            <div class="navbar-logo">
                <img style="width: 30px; height: 30px;" src="picture/logo.png" alt="">
                <a href="">SUPERSEGAR</a>
            </div>
            <div class="navbar-nav">
                <a href=""><i class="bi bi-house-door-fill"></i> Home</a>
                <a href=""><i class="bi bi-info-square-fill"></i> About Us</a>
                <a href=""><i class="bi bi-bag-fill"></i> Product</a>
                <a href=""><i class="bi bi-telephone-fill"></i> Contact</a>
            </div>
    
            <div class="nav-icon">
                <a href=""><i class="bi bi-cart"  style="font-size: 22px;"></i></a>
                <a href="login.php" id="user-btn" class="bi bi-person-fill"></a>
                <a href="#" id="hamburger-menu"><i class="bi bi-list"></i></a>  
            </div>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <main class="content">
                <h1>SUPERSEGAR</h1>
                <p>Nikmati kemudahan memasak tanpa ribet dengan pilihan frozen food berkualitas dari kami.</p>
                <a href="#produk" class="sn">Shop Now</a>
            </main>
        </section>

        <section class="categories">
            <div class="container">
                <h1>Featured <span>Categories</span> </h1>
                <div class="category-list">
                    <div class="category-item">
                        <img src="picture/category1.jpg" alt="">
                        <p class="category-title">Nuggets & Chicken</p>
                    </div>
                    <div class="category-item">
                        <img src="picture/category2.jpg" alt="">
                        <p class="category-title">Meat & Sausage</p>
                    </div>
                    <div class="category-item">
                        <img src="picture/category3.png" alt="">
                        <p class="category-title">Fish & Pro Food</p>
                    </div>
                    <div class="category-item">
                        <img src="picture/category4.png" alt="">
                        <p class="category-title">Snacks & Others</p>
                    </div>
                </div>

                <div class="promo-content">
                    <div class="promo-item-left" style="background-image: url('picture/promo1.jpg');">
                        <div class="content-promo">
                            <h4>Frozen Snack Combo</h4>
                            <p>Save up to<span>25%</span></p>
                            <a href="">Shop now</a>
                        </div>
                    </div>
                    <div class="promo-item-left" style="background-image: url('picture/promo2.jpg');">
                        <div class="content-promo">
                            <h4>Frozen Nugget Sale</h4>
                            <p>Up to<span>30%</span> Discount</p>
                            <a href="">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product">
            <div class="container">
                <h5>Product</h5>
                <div class="title-product">
                    <h1>Our Product</h1>
                    <a href="">Show All -></a>
                </div>
                <div class="box-container">
                    <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 8") or die('query failed');

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
        </section>

        <section class="about">
            <div class="about-content">
                <div class="container">
                    <h1>About Us</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet iure sint deleniti accusamus deserunt qui iste consectetur quibusdam, labore magnam, aut minima, vitae numquam error eos asperiores? Suscipit quia reiciendis assumenda beatae ratione sit rerum perspiciatis! Fugiat aliquid suscipit praesentium!</p>
                </div>
            </div>
        </section>
    </main>

   
    <script src="js/landing.js"></script>
</body>
</html>