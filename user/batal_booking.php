<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$id_user = $_SESSION['id_user'];
$id_booking = $_GET['id_booking'];

$cek = mysqli_query($conn, "
    SELECT * FROM booking 
    WHERE id_booking='$id_booking' 
    AND id_user='$id_user'
    AND status_booking='pending'
");

if (mysqli_num_rows($cek) == 0) {
    header("Location: riwayat.php?pesan=batal_gagal");
    exit;
}

$query = mysqli_query($conn, "
    UPDATE booking 
    SET status_booking='dibatalkan' 
    WHERE id_booking='$id_booking'
");

if ($query) {
    header("Location: riwayat.php?pesan=batal_berhasil");
    exit;
} else {
    echo "Gagal membatalkan booking!";
}
?>