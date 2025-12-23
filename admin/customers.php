<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}

$search = $_GET['search'] ?? '';

$query = "SELECT * FROM customers 
          WHERE name LIKE '%$search%' 
          OR phone LIKE '%$search%'";

$res = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="add-customer.php">Add Customer</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="container">
    <div class="card">
        <h2>Customer List</h2>

        <!-- SEARCH -->
        <form method="get" style="margin-bottom:15px;">
            <div class="form-group">
                <input type="text" name="search" placeholder="Search by name or phone"
                       value="<?= htmlspecialchars($search) ?>">
            </div>
        </form>

        <!-- TABLE -->
        <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($res)){ ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td>
                    <a class="btn btn-secondary" href="edit-customer.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-danger"
                       href="delete-customer.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('Are you sure you want to delete this customer?')">
                        Delete
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <?php if(mysqli_num_rows($res) == 0){ ?>
            <p style="margin-top:15px;">No customers found.</p>
        <?php } ?>
    </div>
</div>

</body>
</html>
