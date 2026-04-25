<?php

require_once 'db.php';

$productid = $_GET['id'];

$sql = "DELETE FROM product WHERE id = $productid";
if ($conn->query($sql) === TRUE) {
    header("Location: admin_product.php");
} else {
    echo "Error deleting record: ". $conn->error;
}
$conn->close();