<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="add-customer.php">Add Customer</a>
    <a href="customers.php">View Customers</a>
    <a href="../logout.php">Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="container">
    <div class="card">
        <h2>Welcome, Admin </h2>
        <p style="margin-top:10px;">
            You can manage all customer accounts from here.
        </p>

        <hr style="margin:20px 0; border:0; border-top:1px solid #ddd;">

        <div style="display:flex; gap:15px; flex-wrap:wrap;">
            <a href="add-customer.php" class="btn btn-primary">➕ Add Customer</a>
            <a href="customers.php" class="btn btn-secondary">📋 View Customers</a>
        </div>
    </div>
</div>

</body>
</html>
