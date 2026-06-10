<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$total_lapangan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lapangan"));
$total_booking = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking"));
$total_pending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking WHERE status_booking='pending'"));
$total_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role='user'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">Admin Booking Lapangan</a>

        <div>
            <a href="dashboard.php" class="btn btn-warning btn-sm me-2">Dashboard</a>
            <a href="lapangan.php" class="btn btn-light btn-sm me-2">Kelola Lapangan</a>
            <a href="booking.php" class="btn btn-light btn-sm me-2">Kelola Booking</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold mb-2">Dashboard Admin</h2>
    <p class="text-muted mb-4">Selamat datang, <?php echo $_SESSION['nama']; ?>.</p>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h3 class="fw-bold"><?php echo $total_lapangan; ?></h3>
                    <p class="text-muted mb-0">Total Lapangan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h3 class="fw-bold"><?php echo $total_booking; ?></h3>
                    <p class="text-muted mb-0">Total Booking</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h3 class="fw-bold"><?php echo $total_pending; ?></h3>
                    <p class="text-muted mb-0">Booking Pending</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <h3 class="fw-bold"><?php echo $total_user; ?></h3>
                    <p class="text-muted mb-0">Total User</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <h4 class="fw-bold">Menu Admin</h4>
            <p class="text-muted">Gunakan menu berikut untuk mengelola sistem booking lapangan.</p>

            <a href="lapangan.php" class="btn btn-primary rounded-pill me-2">
                Kelola Lapangan
            </a>

            <a href="booking.php" class="btn btn-success rounded-pill">
                Kelola Booking
            </a>
        </div>
    </div>
</div>

</body>
</html>