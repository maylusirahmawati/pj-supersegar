<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="admin_users.php" class="active"><i class="bi bi-people"></i> Data Pelanggan</a></li>
                <li><a href="admin_product.php" class="active"><i class="bi bi-bag-heart-fill"></i> Kelola Product</a></li>
                <li><a href="data_pinjam.php"><i class="bi bi-cart"></i> Data Orders</a></li>
                <li><a href="data_pinjam.php"><i class="bi bi-envelope"></i> Data Message</a></li>
                <li><a href="landingpage.php"><i class="bi bi-house"></i> Kembali Ke Website</a></li>

                <li><a href="logout.php" style="background-color: #03695e; margin-top: 50px;"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</body>
</html>  