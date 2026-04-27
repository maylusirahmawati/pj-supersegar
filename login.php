<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {

        if (password_verify($password, $data['password'])) {

            // ✅ SESSION LENGKAP
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];

            if ($data['role'] == 'admin') {
                echo "<script>
                    alert('Login Admin Berhasil!');
                    location.href = 'admin_dashboard.php'; 
                </script>";
            } else {
                echo "<script>
                    alert('Login Berhasil!');
                    location.href = 'landingpage.php'; 
                </script>";
            }
            exit;

        } else {
            echo "<script>
                alert('Password salah!');
                location.href = 'login.php';
            </script>";
        }

    } else {
        echo "<script>
            alert('Email tidak ditemukan.');
            location.href = 'login.php';
        </script>";
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