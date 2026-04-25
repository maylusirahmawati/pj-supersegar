<?php
require_once 'db.php';

$id = $_GET['id'];

$nama= $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name']; 
$picture = $_FILES['gambar'] ['tmp_name'];
$folder = "uploads/" . $gambar;
move_uploaded_file($picture, $folder);

if ($gambar) {
    $sql = "UPDATE product SET nama='$nama', deskripsi='$deskripsi', harga='$harga', gambar='$gambar' WHERE id=$id";
} else {
    $sql =  "UPDATE product SET nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: admin_product.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();