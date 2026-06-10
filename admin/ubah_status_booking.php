<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$id_booking = $_GET['id_booking'];
$status = $_GET['status'];

$allowed_status = ['disetujui', 'dibatalkan', 'selesai'];

if (!in_array($status, $allowed_status)) {
    echo "Status tidak valid!";
    exit;
}

$query = mysqli_query($conn, "
    UPDATE booking 
    SET status_booking='$status' 
    WHERE id_booking='$id_booking'
");

if ($query) {
    header("Location: booking.php?pesan=status_berhasil");
    exit;
} else {
    echo "Gagal mengubah status booking!";
}
?>