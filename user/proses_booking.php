<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php?pesan=belum_login");
    exit;
}

$id_user = $_SESSION['id_user'];
$id_lapangan = $_POST['id_lapangan'];
$tanggal_booking = $_POST['tanggal_booking'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$harga_per_jam = $_POST['harga_per_jam'];

$mulai = strtotime($jam_mulai);
$selesai = strtotime($jam_selesai);
$durasi = ($selesai - $mulai) / 3600;

if ($durasi <= 0) {
    header("Location: booking.php?id_lapangan=$id_lapangan&pesan=jam_salah");
    exit;
}

$total_harga = $durasi * $harga_per_jam;

$cek_jadwal = mysqli_query($conn, "
    SELECT * FROM booking 
    WHERE id_lapangan='$id_lapangan'
    AND tanggal_booking='$tanggal_booking'
    AND status_booking != 'dibatalkan'
    AND (
        ('$jam_mulai' < jam_selesai) 
        AND 
        ('$jam_selesai' > jam_mulai)
    )
");

if (mysqli_num_rows($cek_jadwal) > 0) {
    header("Location: booking.php?id_lapangan=$id_lapangan&pesan=jadwal_penuh");
    exit;
}

$query = mysqli_query($conn, "
    INSERT INTO booking 
    (id_user, id_lapangan, tanggal_booking, jam_mulai, jam_selesai, total_harga, status_booking)
    VALUES 
    ('$id_user', '$id_lapangan', '$tanggal_booking', '$jam_mulai', '$jam_selesai', '$total_harga', 'pending')
");

if ($query) {
    header("Location: riwayat.php?pesan=booking_berhasil");
    exit;
} else {
    echo "Booking gagal!";
}
?>