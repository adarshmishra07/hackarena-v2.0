<?php

    session_start();

    if(!isset($_SESSION['login_admin']) || $_SESSION['login_admin'] == "") {
        header("Location: adminlogin.php");
    }

 ?>
<?php
include "../db/config.php";
$sql="SELECT COUNT(*) AS applied FROM data";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $total=$row['applied'];
        }
        }
$sql="SELECT COUNT(*) AS approved FROM data where status='approved'";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $approvedtotal=$row['approved'];
        }
        }
$sql="SELECT SUM(nom) as participants FROM data";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $totalmem=$row['participants'];
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">dashboard</a></li>
            <li><a href="applied.php">Applied Forms</a></li>
            <li><a href="approved.php">Approved Forms</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="admin-logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="napproved">
            <div class="no"><?php echo $approvedtotal; ?></div>
            <div class="text">Approved forms</div>
        </div>
        <div class="napplied">
            <div class="no"><?php echo $total; ?></div>
            <div class="text">Applied forms</div>
        </div>
        <div class="napplied">
            <div class="no"><?php echo $totalmem; ?></div>
            <div class="text">Total Participants</div>
        </div>
        
    </div>
</body>
</html>