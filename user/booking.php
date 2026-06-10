<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$id_lapangan = $_GET['id_lapangan'];

$query = mysqli_query($conn, "SELECT * FROM lapangan WHERE id_lapangan='$id_lapangan'");
$lapangan = mysqli_fetch_assoc($query);

if (!$lapangan) {
    echo "Lapangan tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan</title>

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
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-3">Form Booking Lapangan</h3>

                    <div class="alert alert-success">
                        <strong><?php echo $lapangan['nama_lapangan']; ?></strong><br>
                        Jenis: <?php echo $lapangan['jenis_lapangan']; ?><br>
                        Lokasi: <?php echo $lapangan['lokasi']; ?><br>
                        Harga: Rp<?php echo number_format($lapangan['harga_per_jam'], 0, ',', '.'); ?> / jam
                    </div>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'jadwal_penuh') { ?>
                        <div class="alert alert-danger">
                            Jadwal pada tanggal dan jam tersebut sudah dibooking. Silakan pilih jam lain.
                        </div>
                    <?php } ?>

                    <form action="proses_booking.php" method="POST">
                        <input type="hidden" name="id_lapangan" value="<?php echo $lapangan['id_lapangan']; ?>">
                        <input type="hidden" name="harga_per_jam" value="<?php echo $lapangan['harga_per_jam']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Tanggal Booking</label>
                            <input type="date" name="tanggal_booking" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 rounded-pill">
                            Simpan Booking
                        </button>
                    </form>

                    <a href="lapangan.php" class="btn btn-secondary w-100 rounded-pill mt-3">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>