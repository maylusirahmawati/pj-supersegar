<?php
require 'db.php';
session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $data  = mysqli_fetch_assoc($query);

    if ($data && $pass == $data['password']) {

        if ($data['role'] == 'admin') {
            $_SESSION['admin'] = $data;
            header("Location: admin_page.php");
        } else {
            $_SESSION['user'] = $data;
            header("Location: landingpage.php");
        }
        exit();
    }

    echo "<script>alert('Email atau Password Salah! Silakan Coba Lagi'); history.back();</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <label>Email</label><br>
    <input type="email" name="email" placeholder="Masukkan email..." required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" placeholder="Masukan Password" required><br><br>

    <button type="submit" name="login">LOGIN</button>
</form>

</body>
</html>