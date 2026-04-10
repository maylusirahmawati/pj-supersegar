<?php
require_once 'db.php';
//ambil dari id url
$productid = $_GET['id'];

//query data product berdasarkan id
$sql = "SELECT * FROM product WHERE id=$productid";
$result = $conn->query($sql);

//ubah data ke array
$product = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="edit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>EDIT PRODUCT</h2>
    <div class="wrapper">
        <form action="editproduct.php?id=<?= $productid ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" value="<?= $product['nama']?>"><br><br>
            <textarea name="deskripsi" id="deskripsi"><?= $product['deskripsi'] ?></textarea> <br> <br>
            <input type="number" name="harga" id="harga" value="<?= $product['harga'] ?>"><br><br>
            <input type="file" name="gambar" id="gambar"><br><br>
            <img src="uploads/<?= $product['gambar']?>" alt="" width="55%"><br><br>
            <button type="submit">Update Product Buku</button>
        </form>
    </div>
</body>
</html>