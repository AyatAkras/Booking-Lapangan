<?php
session_start();
include 'config/database.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: admin/dashboard.php");
        exit;
    } else {
        header("Location: user/dashboard.php");
        exit;
    }
} else {
    header("Location: login.php?pesan=gagal");
    exit;
}
?>