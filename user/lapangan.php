<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM lapangan WHERE status='aktif'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lapangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">Booking Lapangan</a>

        <div>
            <a href="dashboard.php" class="btn btn-light btn-sm me-2">Dashboard</a>
            <a href="lapangan.php" class="btn btn-warning btn-sm me-2">Lapangan</a>
            <a href="riwayat.php" class="btn btn-light btn-sm me-2">Riwayat</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold mb-2">Daftar Lapangan</h2>
    <p class="text-muted mb-4">Pilih lapangan olahraga yang ingin kamu booking.</p>

    <div class="row">
        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 rounded-4 h-100">
                    <div class="card-body p-4">
                        <h4 class="fw-bold"><?php echo $data['nama_lapangan']; ?></h4>
                        <p class="text-muted mb-2"><?php echo $data['jenis_lapangan']; ?></p>

                        <p class="mb-1">
                            <strong>Lokasi:</strong><br>
                            <?php echo $data['lokasi']; ?>
                        </p>

                        <p class="mb-3">
                            <strong>Harga:</strong><br>
                            Rp<?php echo number_format($data['harga_per_jam'], 0, ',', '.'); ?> / jam
                        </p>

                        <a href="booking.php?id_lapangan=<?php echo $data['id_lapangan']; ?>" class="btn btn-success w-100 rounded-pill">
                            Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>