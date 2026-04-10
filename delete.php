<?php

require_once 'db.php';

//ambil dari id dari url
$productid = $_GET['id'];

//query hapus data product berdasarkan id
$sql = "DELETE FROM product WHERE id = $productid";
if ($conn->query($sql) === TRUE) {
    header("Location: admin_product.php");
} else {
    echo "Error deleting record: ". $conn->error;
}
$conn->close();