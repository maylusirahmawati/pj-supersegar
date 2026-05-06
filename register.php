<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';   
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
            alert('Email sudah terdaftar!');
            window.location='register.php';
        </script>";

    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "INSERT INTO users (username, email, password, role) 
        VALUES ('$username', '$email', '$hash', 'user')");

        if ($query) {
            echo "<script>
                alert('Registrasi berhasil!');
                window.location='login.php';
            </script>";
        } else {
            echo "<script>
                alert('Registrasi gagal');
                window.location='register.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="css/logis.css">
</head>
<body style= "background: linear-gradient(to bottom, #0b4d3b, #e6d59c);">
    <header>
        <nav class="navbar" style="background-color: #0b4d3b;">
            <div class="navbar-logo">
                <img style="width: 30px; height: 30px;" src="picture/logo.png" alt="">
                <a href="">SUPERSEGAR</a>
            </div>
        </nav>
    </header>

    <div class="container">
            <div class="image-section">
                <img src="picture/regis.png" alt="">
            </div>

            <div class="card" style="height: 390px;">
                <h2>Register</h2>
                <form method="POST">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Masukkan username..." required><br>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email..." required><br>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password..." required><br>
                    <button class="btn" type="submit" name="regis">Register</button>
                    <p class="info">Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<!-- <?php
echo password_hash("admin123", PASSWORD_DEFAULT);
?> -->