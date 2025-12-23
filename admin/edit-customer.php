<?php
include '../config/db.php';
$id = $_GET['id'];

$res = mysqli_query($conn,"SELECT * FROM customers WHERE id='$id'");
$data = mysqli_fetch_assoc($res);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $occupation = $_POST['occupation'];

    mysqli_query($conn,"UPDATE customers 
    SET name='$name', phone='$phone', occupation='$occupation'
    WHERE id='$id'");

    header("Location: customers.php");
}
?>

<form method="post">
    <input name="name" value="<?= $data['name'] ?>"><br><br>
    <input name="phone" value="<?= $data['phone'] ?>"><br><br>
    <input name="occupation" value="<?= $data['occupation'] ?>"><br><br>
    <button name="update">Update</button>
</form>
