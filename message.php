<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('Harus login dulu!');
        location.href = 'login.php';
    </script>";
    exit;
}

$user_id = $_SESSION['user_id'];
$nama = $_POST['nama'];
$message = $_POST['message'];

$sql = "INSERT INTO message (user_id, nama, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $nama, $message);

if ($stmt->execute()) {
    echo "<script>
        alert('Pesan berhasil dikirim');
        location.href = 'landingpage.php'; 
    </script>";
} else {    
    echo "<script>
        alert('Pesan gagal dikirim');
        location.href = 'landingpage.php'; 
    </script>";
}

$stmt->close();
$conn->close();
?>