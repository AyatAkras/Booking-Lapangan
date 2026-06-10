<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Booking Lapangan Olahraga</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Booking Lapangan</a>

        <div class="d-flex">
            <a href="login.php" class="btn btn-light btn-sm me-2">Login</a>
            <a href="register.php" class="btn btn-warning btn-sm">Daftar</a>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-6">
                <h1 class="fw-bold display-5">
                    Booking Lapangan Olahraga Jadi Lebih Mudah
                </h1>

                <p class="lead mt-3">
                    Sistem ini membantu mahasiswa untuk melihat jadwal lapangan yang tersedia,
                    melakukan pemesanan, membatalkan booking, dan melihat riwayat pemesanan secara online.
                </p>

                <a href="login.php" class="btn btn-success btn-lg rounded-pill mt-3">
                    Mulai Booking
                </a>

                <a href="register.php" class="btn btn-outline-success btn-lg rounded-pill mt-3 ms-2">
                    Daftar Akun
                </a>
            </div>

            <div class="col-md-6 text-center">
                <div class="hero-card shadow">
                    <h3 class="fw-bold">Fitur Website</h3>
                    <hr>

                    <div class="row text-start mt-4">
                        <div class="col-12 mb-3">
                            <div class="feature-box">
                                <strong>Login & Register</strong>
                                <p>Pengguna dapat membuat akun dan masuk ke sistem.</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="feature-box">
                                <strong>Booking Lapangan</strong>
                                <p>Mahasiswa dapat memilih lapangan, tanggal, dan jam pemakaian.</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="feature-box">
                                <strong>Dashboard Admin</strong>
                                <p>Admin dapat mengelola data lapangan dan status pemesanan.</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="feature-box">
                                <strong>Riwayat Booking</strong>
                                <p>Pengguna dapat melihat riwayat pemesanan lapangan.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>