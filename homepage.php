<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

require_once 'db.php';
$sql = "SELECT * FROM product";
$result= $conn->query($sql);  


session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/homepages.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Homepage-Supersegar</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-logo">
                <img src="picture/logo.png" alt="">
                <a href="">SUPERSEGAR</a>
            </div>

            <div class="navbar-nav" id="nav-menu">
                <a href="#home"><i class="bi bi-house-door-fill"></i> Home</a>
                <a href="#product"><i class="bi bi-bag-fill"></i> Product</a>
                <a href="#message"><i class="bi bi-telephone-fill"></i> Message</a>

                <div class="mobile-profile">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <span><?php echo $_SESSION['username']; ?></span>
                        <a href="logout.php">Logout</a>
                    <?php else: ?>
                        <a href="login.php">Login</a>
                        <a href="register.php">Register</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="nav-right">
                <div class="user-profile">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <div class="user-info">
                            <a href="cart.php"><i class="bi bi-cart"></i></a>
                            <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['username']; ?>" class="profile-img">
                            <div class="user-details">
                                <span class="username">Hello, <?php echo $_SESSION['username']; ?></span>
                                <a href="logout.php" class="logout-icon" onclick="return confirm('logout dari akun ini?');">
                                    logout <i class="bi bi-box-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="auth-links">
                            <a href="login.php">login</a>
                        </div>
                    <?php endif; ?>
                </div>
                <a href="#" id="hamburger-menu"><i class="bi bi-list"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <main class="content">
                <h1>Bingung Masak Apa Pagi Ini?</h1>
                <h2>Tenang, Ada <span> SUPERSEGAR! <span></h2>
                <br>
                <p>Temukan berbagai pilihan frozen food favorit untuk stok di rumah. Solusi lapar tengah malam atau sarapan pagi, tinggal goreng—satset tanpa ribet!</p>
            </main>
        </section>

        <section class="categories">
            <div class="container">
                <div class="box-container">
                    <div class="box-categories">
                        <h4>Nuggets & Chicken</h4>
                    </div>
                    <div class="box-categories">
                        <h4>Meat & Sausage</h4>
                    </div>
                    <div class="box-categories">
                        <h4>Fish & Processed Food</h4>
                    </div>
                    <div class="box-categories">
                        <h4>Snacks & Others</h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="product" id="product">
            <div class="container">
                <h5>Product</h5>
                <div class="title-product">
                    <h1>Our Product Frozen Food</h1>
                </div>
                <div class="search-container">
                    <input type="text" id="search-input" placeholder="Cari produk...">
                    <button type="button" id="search-btn"><i class="bi bi-search"></i></button>
                </div>
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
        </section>        

        <section class="message" id="message">
            <div class="container">
                <div class="message-bg">
                    <div class="message-content">
                        <h2>QUESTION ABOUT YOUR <span>ORDER?</span></h2>
                        <h5>MESSAGE US AND WE'LL REPLY BEFORE IT <span>Mealts!</span></h5>
                    </div>
                    <div class="wrapper">
                        <form action="message.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="nama" placeholder="username"
                                value="<?php echo $_SESSION['username'] ?? ''; ?>" readonly> <br> <br>
                            <textarea name="message" id="message" placeholder="input message...."></textarea> <br> <br>
                            <button type="submit">Send Message!</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include 'footer.php'; ?>
    
    <script src="js/search.js"></script>
    <script>
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.location.href = "login.php";
        };
    </script>
</body>
</html>