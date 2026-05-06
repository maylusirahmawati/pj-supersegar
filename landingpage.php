<?php
require_once 'db.php';
$sql = "SELECT * FROM product";
$result= $conn->query($sql);  

session_start();
$user_id = $_SESSION['user_id'] ?? null;

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/landingpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Landingpage-Supersegar</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-logo">
                <img style="width: 30px; height: 30px;" src="picture/logo.png" alt="">
                <a href="">SUPERSEGAR</a>
            </div>

            <div class="search-container">
                <input type="text" id="search-input" placeholder="Cari produk...">
                <button type="button" id="search-btn"><i class="bi bi-search"></i></button>
            </div>

            <div class="navbar-nav">
                <a href="#about"><i class="bi bi-info-square-fill"></i> About Us</a>
                <a href="#product"><i class="bi bi-bag-fill"></i> Product</a>
                <a href="#review"><i class="bi bi-telephone-fill"></i> Review</a>
<<<<<<< HEAD
=======
                <a href="#message"><i class="bi bi-telephone-fill"></i> Contact Us</a>
>>>>>>> c39d1b556227b733288175de80e9b7ce83182c1f
            </div>

            <div class="nav-icon">
                <a href=""><i class="bi bi-cart" style="font-size: 22px;"></i></a>
                <a id="user-btn" class="bi bi-person-fill"></a>
                <a href="#" id="hamburger-menu"><i class="bi bi-list"></i></a>
            </div>

            <div class="account-box">
                <?php if(isset($_SESSION['user_id'])): ?>
                <p>Username : <span><?php echo $_SESSION['username']; ?></span></p>
                <p>Email : <span><?php echo $_SESSION['email']; ?></span></p>
                <a href="logout.php" class="delete-btn">logout <i class="bi bi-arrow-bar-right"></i> </a>
                <?php else: ?>
                <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
                <?php endif; ?>
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

        <section class="about" id="about">
            <img src="picture/about.png" alt="">
            <div class="container">
                <div class="flex">
                    <div class="about-content">
                        <h1>About Us</h1>
                        <p>Solusi Praktis, Kualitas Tak Terkompromi <br>
                            Di SuperSegar, kami percaya bahwa keterbatasan waktu tidak seharusnya menghalangi Anda untuk
                            menyajikan hidangan lezat dan berkualitas bagi keluarga tercinta. Berawal dari keinginan untuk
                            memudahkan setiap dapur di Indonesia, kami hadir sebagai penyedia pilihan frozen food premium
                            yang terjaga kesegarannya mulai dari pembeku kami hingga ke meja makan Anda.</p>
                    </div>
                </div>
            </div>
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

        <section class="product" id="product">
            <div class="container">
                <h5>Product</h5>
                <div class="title-product">
                    <h1>Best Product</h1>
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

        <section class="services" id="services">
            <div class="container">
                <h1>Why Choose Us</h1>
                <div class="services-wrapper">
                    <div class="box-services">
                        <svg width="80" height="80" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="90" height="90" fill="url(#pattern0_88_52)" />
                            <defs>
                                <pattern id="pattern0_88_52" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_88_52" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_88_52" width="90" height="90" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEn0lEQVR4nO2cS4gcVRSGW3zEx0JBg4oivlaKG40JggiiLsSNgkFcBkQQHB9J7HO6x9AQQQUX4gtFcCW4EEE3CupCBVGDgTga0+d0MwaSGN8PzEzq3NJw5fSM0tNd3dU9U+85P/w0TN8q/vtN9a3bfc+tWs1kMplMJpPJZDKZTCaTyWQymUyD8gdbp0sbHhbCPcK44Bh9lS0EJ4TxNyH4wjE8GzLc5H3tpFQhL3bqFwvDXN6dd/nD3ydUvz29K9kg+xXAGV/znZkNiYLW4SLvjrkCWgg/8d+3zkwONOGevDvliut3Ehu3heFYATrki+qA8cFEQOfdEVdwC8Fi0IZLDTRnYIJ3DTRnY2G4y0BzFoajfh7ONtCcgQmeM9Cczdf2sIs3GGjOADbDnN97/6kGmjOBvcNAc0Zza5q9zEBzJn7PQHM2lnbjbgPNmfgHf7B1TmKgp/9FED7+/79O8Gpcew0bcn2zMM46wsOROQiOTJ2D4dP+cwSMl09zvGN8KvaqZnipNKD75b/acZYQvFEa0Dq3ZtxSOtAq77ee3H+OIoNevqrn/EetUxIHHXTxSke4dbTh23Ggl1d1nlYL4fZFbl402Ea/gcWBdm24ZmwORhoHeuFA88Lxx8Pbk47XQo168qAZZiYPAMOgCfatbIN/DkLQlQ0h+HksaIInJ80RBVoY7pjm+DXNrYsA2i0tiM4OtWP8siygY+fWBQLdGAYN35QM9Oj72WoOdoT3COPeKCuQaUELw6/H5+GS/ja63L+ikCcCtN4rAsZboyyEj8SB9rT9vFHHL50DTuQKepyEEOJAuw5u03a9th3c5juNjRG57l3LrCMkuDEO9AR9+afUoOPkD+C5juE7A50iaNdtXiuMXw/lmHJ6J4S74kDHTe9yHzqEGnc6wg+jDd040CHjFh0DXbd+9VAewucjc6zHm2Fisw6CH/2hR8/of29h/84LdE5qoBOe3gnjQxEAnzHQSc+jCY4MVm7qtEsY/yrTV/Dig2b0IcEDQ7kIn4gDXZQflUoD2hEc8vtbp/W30WIVrcg30EmC5h7I+yJAPb6uQJvRQLuC2UCzgfZVsoFmA+2rZAPNBtpXyQaaDbSvkg00G2hfJa+Aq5vJtQpSK4TWemLd4qw1GVqlo3s79FUYmmV55kfS+YXgD8f4Ym/lSAhfSSpk2Mbroj4pYfuxTUWHnWZ+ZaygjycTdLi6aOTPnFw8p5lf1z0TAx23YSbo7Lwib5h55f8PdCJDx+CqyKB8Z2ZD3jDzyi8EL9d0oHYELywP3IW8IlwGTiO/MP6utSmDZRQTyRF+EH1SaI47TiKqhXomeL+WoUqTf9RNQe/KIeH1UceEuvknqhBmgg6u2/y9ueWIgj8Nqx3RhU8d8/TjpleCjA7592CJbtoqVf7InVKrsDC+nlrIKuTXGmZH+NMaQ/5ybL5xfqpBq5A/aDduXu0cXAgW9bGUqYesSv6gU79Nt0JMeyUE1LilVgCVKr8+y9QRvhVXqC1L778ZtY8wT5UuvxaSO4bdQvi5PtxJGMPeK8Fnvb93GlfVCqyy5zeZTCaTyWQymUwmk8lkqmWofwFhWbX9DEn75AAAAABJRU5ErkJggg==" />
                            </defs>
                        </svg>
                        <h4>Free Delivery</h4>
                        <p>Freshly frozen and delivered straight to your door, completely free for every minimum
                            purchase.</p>
                    </div>
                    <div class="box-services">
                        <svg width="80" height="80" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="90" height="90" fill="url(#pattern0_88_54)" />
                            <defs>
                                <pattern id="pattern0_88_54" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_88_54" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_88_54" width="90" height="90" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>
                        <h4>100% secure payment</h4>
                        <p>Shop with peace of mind. We use encrypted payment systems to keep your transactions safe and
                            chilly</p>
                    </div>
                    <div class="box-services">
                        <svg width="80" height="80" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="90" height="90" fill="url(#pattern0_88_50)" />
                            <defs>
                                <pattern id="pattern0_88_50" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_88_50" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_88_50" width="90" height="90" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFPElEQVR4nO2dS2gkVRRA34g6fjci+EPFpfgHUTd+8TfqLNyIC4m6UUeMMjrpeztRG0RBQRfDgC7UcaGMiGtBBBEkRh2iJBjT99YQxNER/8rk0/dVHJ/c/jBxSE8n3VX1qirvwIUm6bz37sntqldVr6qNCQQCgUAgEAgEAoHA/3GTDx3XoLEL4qh6vWUYEsJnLMFOYXzbEnwghJ9bRrKEc8L4ZzsWLKPT0Nedn+t79L1CMNH821YbO5ttMgxpH9qX9mnKiJvZflrM1WtjrjxsGV4SwneFYdwS/CgEhzrSsopmn9o3w7gQ7NEx6dh0jDpWk3fc/u0nxlHlmriOj1iCXZbxY0vwc9Yi7aDRGrOOfZfmEjNerbn5lftd7YQGw7AQfikMy94lcUqfAoZlYdgrdXhCc85U8iKPniMM074l2OylT2vumUh20fBmIZzynbT1JZtwSh2kLlo/Qr6Ttb5lMz6evmiGvb4Ttb5FE3yRvmiCRd+JWt+iGRdSF+07SZuTCKI5iHZliiCag2hXpgiiOYh2ZYogmoNoV6YIovnoIYQihLAws+NMDX0tDDaI5qQlV7YcmZMQYBDNCUlmsBLB1tVymp+rnhFEc7qSlcX6yNlBNA8omaCx2uZiJcJYDaI5ZclU2aLb7iCa09lcKI165Tb9Z/TTfhDN6UsOojkbyZmIFsJ/NrpkYVjesNcMJSPJrb7wYPqiGf/wLdVmOLvoIvq31EVbgn0DSvlU17U1GB8TxsmiSW4FcOqim6tB+5eyx7naMZ223Ce1Y4Vgd7Ekt4olddGW4f1+B7j07dj5R7an4oXxzaJIbvbN+J5JG8v4Yp9VcKjbQvD1yl7jYfUdaUhuBuELJm1shA/2O8BGvXpjt3bXKtu75Fbcb9Im5spV/Q8Q2NGTp/crOyeSXVwfuTIVuass2+0/EcJZvbLRtX1nNgnjq33NkwlvT2Ke3OsT5WZqx5ss0NWUAw2WYXo9la3JqUTfldwey4TJCsvw3MCDprVVdl4qOdMdYQfdRiVSHdy7si3DZXmo5E7EDNelInV1AWaT3kaWhew8SdbTD5nfqygEryX4cZw92mbE++bisOjX0zPaLdEIb002CVhzZWddyZ1oMN5ssqa5+dBbiJNMhnpXto9Kbke08jxNpujdSYknRN1le5TsYsJHjS9cfeRUIfw76aSEYVoXtazsSyK8y8fmojkegr/cTO0U4xPL8EoqCRL+0n46wQNC+JYQ/utDcnssLxvftG5XPvx4h7KFMMzrSiaTB4Tg2RKLftrkBX3UgiX83rcUm3QQ/uAO1E4yecIS3OddDCcdlXtN3mgdluNH/uVgUvGh5mTyiO40hOH3HEhygy4nWJgdPcvkGWG427coO2hQ5R5TBHTeW9hqJthtioI+e6j9OLViSWaczN0soxd6vsIS7Pctz649DmT2vKSksRFcUYSjRmGY73UlJ/foOVwhXMqtZMKlBsFNpgw0osotvk5v9qhkKwx3mjIhHk9zdqlk0TGZMtKoww1pnL9efyXjQb0UZ8qM3Ve5yO9sBH6yPHq52QgszcF5QvCVh0qeXNo3dq7ZSDg9qGF4IzvJ8E7hDkaSJCbYlub0T9vWWzl855kLhCsXCuHXKVTxN5aql/rOL1e4aHizJXheGOMEBFtdiJnZ8toiYutwSfNZ/f3v8D6zs9WLfedRGCSCre0vSVib5OaUEYZye1Ukzzi9u4BhRK94dN/Zwa/CuCOTh2eXHTf11Mmt2QlM6Kqh1teCwLh+44T+zvf4AoFAIBAIBAKBQMAUmf8AmnC8v6KQcBAAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                        <h4>Quality guarantee</h4>
                        <p>From our freezer to yours, we ensure only the premium and best-tasting frozen treats reach
                            your kitchen.</p>
                    </div>
                    <div class="box-services">
                        <svg width="80" height="80" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="90" height="90" fill="url(#pattern0_88_49)" />
                            <defs>
                                <pattern id="pattern0_88_49" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_88_49" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_88_49" width="90" height="90" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>
                        <h4>Guaranteed savings</h4>
                        <p>Get more for less! High-quality frozen food that fits your budget perfectly every single day.
                        </p>
                    </div>
                    <div class="box-services">
                        <svg width="80" height="80" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="90" height="90" fill="url(#pattern0_88_48)" />
                            <defs>
                                <pattern id="pattern0_88_48" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_88_48" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_88_48" width="90" height="90" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACzElEQVR4nO2dvW4TQRDHtwIega8CxFOAKIDnIUFxTGYIRR4iBR8vAhIfJZAKEFZuxxTUEBqIrZtxs2gdCYF1l9hg3+3m/j9ppOg0xfx/We+tXKydAwAAAADoHGXx4LZ6empChQqPYk3/9vRo4unmbH98pp4fm7D/u5+flAXdaidFwpTD/jUTfmXC4fiiZ2PZvhTLhJ+f2O/5RekfXm07XxJMiq0bKvT9ZMm/5X2d1pz9Knww+czXXZcpC7qinr7NLfkfK/4j46fGdRUTerlqyX9sO69dFyk93WlO8lF18gWp09NFxcfcU6meNkaD/vnR/vYF9dyLz2q3hQX64wnFdQ0T9jXiNmZ7VWjzGNHz93ved11DhQ6rZMSVOdsbn9WJXqRfhX+6rqELiI7Uia7qHRf3L9as/h+ua6jnQc0+2vtf0Srcr17R9Ml1DfO0W/9y4158sS0qevoyFNpUz1q9R9Ouy4HwZeecFnRPPe8dfa/Q7PHMWq7p9yme3qnwehiunV2J5PFw67IKfWw7rCVS6vlDdLL8lQzJoUr2Uld23C7aDmWJVim0tjzRnvfaDmSJlnp+u/IzL4rjkfFwaaLbDmOJF0QLRIfTVBAtEB1OU0G0ZCYaAAAAAKB5UjtCWWLzQLRAdIDoDIJZYvNAtEB0gOgMglli80C0QHSA6AyCWWLzQLRAdIDoDIJZYvNAtEB0gOgMglli80C0QHSA6AyCWWLzQLRAdIDoDIJZYvNAtEB0gOgMglli80C0QHSA6AyCWWLzQLRAdIDoDIJZYvNAtEB0gOgMglli80C0QHSA6AyCWWLzQLRAdIDohO5XcgmJbuSO07ZuDHNJiV7izWC1ooXXuy66FL67ctHx5sJ4g2FXRaun92Gwc8Y1wfSe0oZluwRER8nxN2Bck8SVHa+LjPtVEy9I15LomE09vYnbRWMrGQAAAAAAAABcg/wCoxgX9WQ0KcAAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                        <h4>Daily offers</h4>
                        <p>Don't miss out! Check back every day for 'cool' deals and special discounts on your favorite
                            snacks.</p>
                    </div>
                </div>
            </div>
        </section>

<<<<<<< HEAD
=======


>>>>>>> c39d1b556227b733288175de80e9b7ce83182c1f
        <div class="reviews" id="review">
            <div class="container">
                <h1>Customer Reviews</h1>

                <div class="scroll-container">
                    <?php
                    $query_review = mysqli_query($conn, "SELECT * FROM message ORDER BY id_message DESC LIMIT 15");

                    while($row = mysqli_fetch_assoc($query_review)):
                    ?>

                    <div class="box-reviews">

                        <!-- ⭐ BINTANG -->
                        <div class="stars">
                            <?php 
                            $rating = (int)$row['rating'];
                            for($i = 1; $i <= 5; $i++) {
                                echo $i <= $rating 
                                    ? '<i class="bi bi-star-fill"></i>' 
                                    : '<i class="bi bi-star"></i>';
                            }
                            ?>
                        </div>

                        <!-- 💬 TEXT -->
                        <p class="review-text">
                            <?php echo htmlspecialchars($row['message']); ?>
                        </p>

                        <!-- 👤 USER -->
                        <div class="user">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['nama']); ?>" alt="">
                            <h3><?php echo htmlspecialchars($row['nama']); ?></h3>
                        </div>

                        <!-- ❝ QUOTE -->
                        <span class="fas fa-quote-right"></span>

                    </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <!-- <section class="message" id="message">
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
        </section> -->

        <section class="location" id="location">
            <div class="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.561841467607!2d106.8770341740287!3d-6.466420163224434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c16de02647a3%3A0xad4860b56fb85362!2sSupersegar!5e1!3m2!1sid!2sid!4v1777189850635!5m2!1sid!2sid"
                    width="1160" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>

                           
    <?php include 'footer.php'; ?>

    <script src="js/home.js"></script>
</body>

</html>