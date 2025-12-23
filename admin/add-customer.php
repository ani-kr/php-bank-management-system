<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config/db.php';

$success = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $occupation = $_POST['occupation'];
    $nationality = $_POST['nationality'];
    $password = "123456";

    // Insert into users table
    mysqli_query($conn,"INSERT INTO users(role,email,password)
    VALUES('customer','$email','$password')");

    $user_id = mysqli_insert_id($conn);

    // File uploads
    $p1 = $_FILES['photo1']['name'];
    $p2 = $_FILES['photo2']['name'];
    $p3 = $_FILES['photo3']['name'];
    $aadhar = $_FILES['aadhar']['name'];
    $pan = $_FILES['pan']['name'];

    move_uploaded_file($_FILES['photo1']['tmp_name'],"../uploads/photos/$p1");
    move_uploaded_file($_FILES['photo2']['tmp_name'],"../uploads/photos/$p2");
    move_uploaded_file($_FILES['photo3']['tmp_name'],"../uploads/photos/$p3");
    move_uploaded_file($_FILES['aadhar']['tmp_name'],"../uploads/aadhar/$aadhar");
    move_uploaded_file($_FILES['pan']['tmp_name'],"../uploads/pan/$pan");

    mysqli_query($conn,"INSERT INTO customers
    (user_id,name,father_name,mother_name,phone,occupation,nationality,photo1,photo2,photo3,aadhar,pan)
    VALUES
    ('$user_id','$name','$father','$mother','$phone','$occupation','$nationality','$p1','$p2','$p3','$aadhar','$pan')");

    $success = "Customer added successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="customers.php">View Customers</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="container">
    <div class="card">
        <h2>Add New Customer</h2>

        <?php if($success){ ?>
            <p style="color:green; margin-bottom:15px;">
                <?= $success ?>
            </p>
        <?php } ?>

        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="father" required>
            </div>

            <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mother" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" required>
            </div>

            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation">
            </div>

            <div class="form-group">
                <label>Nationality</label>
                <input type="text" name="nationality">
            </div>

            <div class="form-group">
                <label>Photographs (3)</label>
                <input type="file" name="photo1" required>
                <input type="file" name="photo2" required style="margin-top:8px;">
                <input type="file" name="photo3" required style="margin-top:8px;">
            </div>

            <div class="form-group">
                <label>Aadhar Card</label>
                <input type="file" name="aadhar" required>
            </div>

            <div class="form-group">
                <label>PAN Card</label>
                <input type="file" name="pan" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Save Customer
            </button>
        </form>
    </div>
</div>

</body>
</html>
