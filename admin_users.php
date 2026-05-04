<?php
require_once 'db.php';
$sql = "SELECT * FROM users";
$result= $conn->query($sql);  
$users = $result->fetch_assoc();
?>

<?php include 'admin_dashboard.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/admin_menus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>admin-user</title>
</head>
<body>
    <h1 class="title">Data Users</h1>
    <section class="users">
        <div class="box-container">
            <?php
                $select_users = mysqli_query($conn, "SELECT * FROM users") or die('query failed');
                while($fetch_users = mysqli_fetch_assoc($select_users)){
            ?>
            <div class="box-users">
                <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
                <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
                <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
                <p> role : <span style="color:<?php if($fetch_users['role'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['role']; ?></span> </p>
                <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Delete user ini?');" class="delete-btn">Delete user</a>
            </div>
            <?php
                };
            ?>
        </div>
    </section>
</body>
</html>