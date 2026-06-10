<?php
include 'config/database.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = md5($_POST['password']);

    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($cek_email) > 0) {
        $pesan = "Email sudah terdaftar!";
    } else {
        $query = mysqli_query($conn, "INSERT INTO users (nama, email, password, role, no_hp) 
        VALUES ('$nama', '$email', '$password', 'user', '$no_hp')");

        if ($query) {
            header("Location: login.php?pesan=register_berhasil");
            exit;
        } else {
            $pesan = "Registrasi gagal!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Booking Lapangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="text-center mb-2 fw-bold">Daftar Akun</h3>
                    <p class="text-center text-muted mb-4">Buat akun untuk booking lapangan olahraga</p>

                    <?php if (isset($pesan)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $pesan; ?>
                        </div>
                    <?php } ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-success w-100 rounded-pill">
                            Daftar
                        </button>
                    </form>

                    <p class="text-center mt-4 mb-0">
                        Sudah punya akun?
                        <a href="login.php" class="text-decoration-none">Login di sini</a>
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