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
</head>
<body>
<h2>Register</h2>
<form method="POST">
    <label>Username</label><br>
    <input type="text" name="username" placeholder="Masukkan username..." required><br><br>
    <label>Email</label><br>
    <input type="email" name="email" placeholder="Masukkan email..." required><br><br>
    <label>Password</label><br>
    <input type="password" name="password" placeholder="Masukkan password..." required><br><br>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
</form>

</body>
</html>

<?php
echo password_hash("admin123", PASSWORD_DEFAULT);
?>