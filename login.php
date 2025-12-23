<?php
session_start();
include 'config/db.php';

$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND role='admin'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    if($row && $password == $row['password']){
        $_SESSION['admin'] = $row['id'];
        header("Location: admin/dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="center-box">
    <div class="card" style="width:360px;">
        <h2 style="text-align:center;">Admin Login</h2>

        <?php if($error){ ?>
            <p style="color:red; text-align:center; margin-bottom:15px;">
                <?= $error ?>
            </p>
        <?php } ?>

        <form method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>

            <button class="btn btn-primary" name="login" style="width:100%;">
                Login
            </button>
        </form>
    </div>
</div>

</body>
</html>
