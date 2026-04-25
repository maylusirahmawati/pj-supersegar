<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['role'] = $data['role'];
        $_SESSION['username'] = $data['username'];

        if ($data['role'] == 'admin') {
            header("Location: admin_dashboard.php");
            exit;
        } else {
            header("Location: landingpage.php");
            exit;
        }
    } else {
        $error = "Login gagal! Email atau password salah.";
    }
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
    <p>Don't have any accout? <a href="register.php">Sign Up</a></p>
</form>
</body>
</html>