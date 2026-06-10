<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$id_user = $_SESSION['id_user'];

$query = mysqli_query($conn, "
    SELECT booking.*, lapangan.nama_lapangan, lapangan.jenis_lapangan 
    FROM booking
    JOIN lapangan ON booking.id_lapangan = lapangan.id_lapangan
    WHERE booking.id_user='$id_user'
    ORDER BY booking.created_at DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">Booking Lapangan</a>

        <div>
            <a href="dashboard.php" class="btn btn-light btn-sm me-2">Dashboard</a>
            <a href="lapangan.php" class="btn btn-light btn-sm me-2">Lapangan</a>
            <a href="riwayat.php" class="btn btn-warning btn-sm me-2">Riwayat</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold mb-2">Riwayat Booking</h2>
    <p class="text-muted mb-4">Daftar pemesanan lapangan yang sudah kamu lakukan.</p>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'booking_berhasil') { ?>
        <div class="alert alert-success">
            Booking berhasil dibuat. Status masih menunggu persetujuan admin.
        </div>
    <?php } ?>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($query)) { 
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <?php echo $data['nama_lapangan']; ?><br>
                                    <small class="text-muted"><?php echo $data['jenis_lapangan']; ?></small>
                                </td>
                                <td><?php echo $data['tanggal_booking']; ?></td>
                                <td><?php echo $data['jam_mulai']; ?> - <?php echo $data['jam_selesai']; ?></td>
                                <td>Rp<?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php if ($data['status_booking'] == 'pending') { ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php } elseif ($data['status_booking'] == 'disetujui') { ?>
                                        <span class="badge bg-success">Disetujui</span>
                                    <?php } elseif ($data['status_booking'] == 'dibatalkan') { ?>
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary">Selesai</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if (mysqli_num_rows($query) == 0) { ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada riwayat booking.
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>