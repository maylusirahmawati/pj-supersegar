<?php

require_once "db.php";

$nama= $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];
$picture = $_FILES['gambar'] ['tmp_name'];

move_uploaded_file($picture, 'uploads/' . $gambar);

$sql = "INSERT INTO product (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $nama, $deskripsi, $harga, $gambar);

if ($stmt->execute()) {
    echo "<script> alert ('Data product berhasil di tambahkan');
    location.href = 'admin_product.php'; 
    </script>";
} else {
    echo "<script> alert ('Data product gagal ditambahkan');
    location.href = 'admin_product.php'; 
    </script>". $stmt->error;
}

$stmt->close();
$conn->close();

?>