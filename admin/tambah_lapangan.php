<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

if (isset($_POST['simpan'])) {
    $nama_lapangan = $_POST['nama_lapangan'];
    $jenis_lapangan = $_POST['jenis_lapangan'];
    $lokasi = $_POST['lokasi'];
    $harga_per_jam = $_POST['harga_per_jam'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "
        INSERT INTO lapangan 
        (nama_lapangan, jenis_lapangan, lokasi, harga_per_jam, status)
        VALUES 
        ('$nama_lapangan', '$jenis_lapangan', '$lokasi', '$harga_per_jam', '$status')
    ");

    if ($query) {
        header("Location: lapangan.php?pesan=tambah_berhasil");
        exit;
    } else {
        echo "Gagal menambahkan lapangan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lapangan</title>

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
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <h3 class="fw-bold mb-4">Tambah Lapangan</h3>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Lapangan</label>
                    <input type="text" name="nama_lapangan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Lapangan</label>
                    <input type="text" name="jenis_lapangan" class="form-control" placeholder="Contoh: Futsal, Basket, Badminton" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga per Jam</label>
                    <input type="number" name="harga_per_jam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary rounded-pill">
                    Simpan
                </button>

                <a href="lapangan.php" class="btn btn-secondary rounded-pill">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>