<?php
require_once 'db.php';
$sql = "SELECT * FROM message";
$result= $conn->query($sql);  
$produk = $result->fetch_assoc();
?>

<?php include 'admin_dashboard.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="reviews" id="reviews">
    <link rel="stylesheet" href="css/admin_menus.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Customer Reviews</h1>
        <div class="scroll-container">
            <?php
            $query_review = mysqli_query($conn, "SELECT * FROM message");

            while($row = mysqli_fetch_assoc($query_review)):
            ?>

            <div class="box-container">
                <div class="box-reviews">
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
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</div>

</body>
</html>