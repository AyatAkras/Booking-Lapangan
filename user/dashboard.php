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
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Booking Lapangan</a>
        <a href="../logout.php" class="btn btn-light btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <h3>Halo, <?php echo $_SESSION['nama']; ?>!</h3>
            <p class="text-muted">Selamat datang di Dashboard User.</p>

            <div class="alert alert-success">
                Login user berhasil.
            </div>
        </div>
    </div>
</div>

</body>
</html>