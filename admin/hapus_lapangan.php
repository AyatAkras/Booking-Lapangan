<?php
session_start();
require_once '../config/database.php';

if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

if (!isset($conn)) {
    die('Database connection not established.');
}

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$id_lapangan = $_GET['id_lapangan'];

$cek_booking = mysqli_query($conn, "SELECT * FROM booking WHERE id_lapangan='$id_lapangan'");

if (mysqli_num_rows($cek_booking) > 0) {
    $query = mysqli_query($conn, "
        UPDATE lapangan 
        SET status='tidak aktif' 
        WHERE id_lapangan='$id_lapangan'
    ");
} else {
    $query = mysqli_query($conn, "
        DELETE FROM lapangan 
        WHERE id_lapangan='$id_lapangan'
    ");
}

if ($query) {
    header("Location: lapangan.php?pesan=hapus_berhasil");
    exit;
} else {
    echo "Gagal menghapus data lapangan!";
}
?>