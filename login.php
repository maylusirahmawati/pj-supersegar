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
                    location.href = 'homepage.php'; 
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
    <link rel="stylesheet" href="css/logis.css">
</head>
<body>
    <header> 
        <nav class="navbar">
            <div class="navbar-logo">
                <img style="width: 30px; height: 30px;" src="picture/logo.png" alt="">
                <a href="">SUPERSEGAR</a>
            </div>
        </nav>
    </header>
            
        <div class="container">
            <div class="card" style="height: 350px;">
                <h2>Login</h2>
                
                <form method="POST">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email..." required><br><br>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukan Password" required><br><br>
                    <button class="btn" type="submit" name="login">LOGIN</button>
                    <p class="info">Don't have any accout? <a href="register.php">Sign Up</a></p>
                </form>
            </div>
        
            <!-- IMAGE -->
            <div class="image-section">
                <img src="picture/login.png" alt="">
            </div>
          </div>
        </div>
                
</body>
</html>

