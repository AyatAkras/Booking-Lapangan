<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
        exit;
    } else {
        header("Location: user/dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Booking Lapangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-2 fw-bold">Login</h3>
                        <p class="text-center text-muted mb-4">Sistem Booking Lapangan Olahraga</p>

                        <?php if (isset($_GET['pesan'])) { ?>
                            <?php if ($_GET['pesan'] == 'gagal') { ?>
                                <div class="alert alert-danger">Email atau password salah!</div>
                            <?php } elseif ($_GET['pesan'] == 'logout') { ?>
                                <div class="alert alert-success">Berhasil logout.</div>
                            <?php } elseif ($_GET['pesan'] == 'belum_login') { ?>
                                <div class="alert alert-warning">Silakan login terlebih dahulu.</div>
                            <?php } elseif ($_GET['pesan'] == 'register_berhasil') { ?>
                                <div class="alert alert-success">Registrasi berhasil! Silakan login.</div>
                            <?php } ?>
                        <?php } ?>

                        <form action="proses_login.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
                        </form>

                        <p class="text-center mt-4 mb-0">
                            Belum punya akun?
                            <a href="register.php" class="text-decoration-none">Daftar di sini</a>
                        </p>

                        <p class="text-center mt-2 mb-0">
                            <a href="index.php" class="text-decoration-none text-muted">Kembali ke Beranda</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>