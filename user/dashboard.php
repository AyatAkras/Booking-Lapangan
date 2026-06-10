<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">Booking Lapangan</a>

        <div>
            <a href="dashboard.php" class="btn btn-warning btn-sm me-2">Dashboard</a>
            <a href="lapangan.php" class="btn btn-light btn-sm me-2">Lapangan</a>
            <a href="riwayat.php" class="btn btn-light btn-sm me-2">Riwayat</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <h3 class="fw-bold">Halo, <?php echo $_SESSION['nama']; ?>!</h3>
            <p class="text-muted">Selamat datang di Sistem Booking Lapangan Olahraga.</p>

            <div class="alert alert-success">
                Kamu bisa melihat daftar lapangan, melakukan booking, dan mengecek riwayat pemesanan.
            </div>

            <a href="lapangan.php" class="btn btn-success rounded-pill">
                Lihat Daftar Lapangan
            </a>
        </div>
    </div>
</div>

</body>
</html>