<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM lapangan ORDER BY id_lapangan DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lapangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">Admin Booking Lapangan</a>

        <div>
            <a href="dashboard.php" class="btn btn-light btn-sm me-2">Dashboard</a>
            <a href="lapangan.php" class="btn btn-warning btn-sm me-2">Kelola Lapangan</a>
            <a href="booking.php" class="btn btn-light btn-sm me-2">Kelola Booking</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold mb-2">Kelola Lapangan</h2>
    <p class="text-muted mb-4">Admin dapat menambah, mengedit, dan menghapus data lapangan.</p>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'tambah_berhasil') { ?>
        <div class="alert alert-success">Data lapangan berhasil ditambahkan.</div>
    <?php } ?>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'edit_berhasil') { ?>
        <div class="alert alert-success">Data lapangan berhasil diperbarui.</div>
    <?php } ?>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'hapus_berhasil') { ?>
        <div class="alert alert-success">Data lapangan berhasil dihapus.</div>
    <?php } ?>

    <a href="tambah_lapangan.php" class="btn btn-primary rounded-pill mb-3">
        + Tambah Lapangan
    </a>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Lapangan</th>
                            <th>Jenis</th>
                            <th>Lokasi</th>
                            <th>Harga/Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($query)) { 
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_lapangan']; ?></td>
                                <td><?php echo $data['jenis_lapangan']; ?></td>
                                <td><?php echo $data['lokasi']; ?></td>
                                <td>Rp<?php echo number_format($data['harga_per_jam'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php if ($data['status'] == 'aktif') { ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="edit_lapangan.php?id_lapangan=<?php echo $data['id_lapangan']; ?>" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="hapus_lapangan.php?id_lapangan=<?php echo $data['id_lapangan']; ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus lapangan ini?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if (mysqli_num_rows($query) == 0) { ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada data lapangan.
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