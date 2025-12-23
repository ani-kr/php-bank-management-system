<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['customer'])){
    header("Location: login.php");
    exit;
}

$uid = $_SESSION['customer'];

$res = mysqli_query($conn,"SELECT * FROM customers WHERE user_id='$uid'");
$data = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="profile.php">My Profile</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="container">
    <div class="card">
        <h2>My Profile</h2>

        <table>
            <tr>
                <th>Full Name</th>
                <td><?= htmlspecialchars($data['name']) ?></td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td><?= htmlspecialchars($data['father_name']) ?></td>
            </tr>
            <tr>
                <th>Mother's Name</th>
                <td><?= htmlspecialchars($data['mother_name']) ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= htmlspecialchars($data['phone']) ?></td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td><?= htmlspecialchars($data['occupation']) ?></td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td><?= htmlspecialchars($data['nationality']) ?></td>
            </tr>
        </table>

        <h3 style="margin-top:25px;">Uploaded Documents</h3>

        <div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:10px;">
            <div>
                <strong>Photo 1</strong><br>
                <img src="../uploads/photos/<?= htmlspecialchars($data['photo1']) ?>" width="120">
            </div>
            <div>
                <strong>Photo 2</strong><br>
                <img src="../uploads/photos/<?= htmlspecialchars($data['photo2']) ?>" width="120">
            </div>
            <div>
                <strong>Photo 3</strong><br>
                <img src="../uploads/photos/<?= htmlspecialchars($data['photo3']) ?>" width="120">
            </div>
        </div>

        <div style="margin-top:20px;">
            <p><strong>Aadhar Card:</strong>
                <a href="../uploads/aadhar/<?= htmlspecialchars($data['aadhar']) ?>" target="_blank">
                    View
                </a>
            </p>
            <p><strong>PAN Card:</strong>
                <a href="../uploads/pan/<?= htmlspecialchars($data['pan']) ?>" target="_blank">
                    View
                </a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
