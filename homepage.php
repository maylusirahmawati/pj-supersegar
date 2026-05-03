<?php
require_once 'db.php';
$sql = "SELECT * FROM product";
$result= $conn->query($sql);  

session_start();
$user_id = $_SESSION['user_id'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/homepage.css">
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
                <a href="#about"><i class="bi bi-info-square-fill"></i> About Us</a>
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
                                <span class="username"><?php echo $_SESSION['username']; ?></span>
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
        



        
    </main>
</body>
</html>