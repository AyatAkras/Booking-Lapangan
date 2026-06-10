<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

if (!isset($_GET['id_lapangan'])) {
    header("Location: lapangan.php");
    exit;
}

$id_lapangan = $_GET['id_lapangan'];

$data_lapangan = mysqli_query($conn, "SELECT * FROM lapangan WHERE id_lapangan='$id_lapangan'");

if (!$data_lapangan) {
    die("Query error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($data_lapangan);

if (!$data) {
    echo "Data lapangan tidak ditemukan!";
    exit;
}

if (isset($_POST['update'])) {
    $nama_lapangan = $_POST['nama_lapangan'];
    $jenis_lapangan = $_POST['jenis_lapangan'];
    $lokasi = $_POST['lokasi'];
    $harga_per_jam = $_POST['harga_per_jam'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "
        UPDATE lapangan SET
        nama_lapangan='$nama_lapangan',
        jenis_lapangan='$jenis_lapangan',
        lokasi='$lokasi',
        harga_per_jam='$harga_per_jam',
        status='$status'
        WHERE id_lapangan='$id_lapangan'
    ");

    if ($query) {
        header("Location: lapangan.php?pesan=edit_berhasil");
        exit;
    } else {
        echo "Gagal mengupdate data lapangan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lapangan</title>

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

<div class="container mt-5 mb-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <h3 class="fw-bold mb-4">Edit Lapangan</h3>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Lapangan</label>
                    <input type="text" name="nama_lapangan" class="form-control" value="<?php echo $data['nama_lapangan']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Lapangan</label>
                    <input type="text" name="jenis_lapangan" class="form-control" value="<?php echo $data['jenis_lapangan']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga per Jam</label>
                    <input type="number" name="harga_per_jam" class="form-control" value="<?php echo $data['harga_per_jam']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif" <?php if ($data['status'] == 'aktif') echo 'selected'; ?>>Aktif</option>
                        <option value="tidak aktif" <?php if ($data['status'] == 'tidak aktif') echo 'selected'; ?>>Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-primary rounded-pill">
                    Update
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