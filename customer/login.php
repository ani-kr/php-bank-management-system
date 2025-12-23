<?php
session_start();
include '../config/db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND role='customer'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    if($row && $password == $row['password']){
        $_SESSION['customer'] = $row['id'];
        header("Location: profile.php");
    } else {
        echo "Invalid Credentials";
    }
}
?>

<form method="post">
    <h3>Customer Login</h3>
    <input type="email" name="email" required placeholder="Email"><br><br>
    <input type="password" name="password" required placeholder="Password"><br><br>
    <button name="login">Login</button>
</form>
