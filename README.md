# Sistem Booking Lapangan Olahraga Berbasis Web

Project ini dibuat untuk memenuhi tugas akhir mata kuliah **Pemrograman Web**. Website ini dikembangkan berdasarkan studi kasus mahasiswa yang sering kesulitan mengetahui jadwal lapangan olahraga yang kosong. Melalui sistem ini, pengguna dapat melihat daftar lapangan, melakukan booking, membatalkan booking, dan melihat riwayat pemesanan. Admin dapat mengelola data lapangan serta menyetujui atau membatalkan booking pengguna.

## Fitur Website

### Fitur User

* Register akun
* Login user
* Melihat daftar lapangan
* Melakukan booking lapangan
* Melihat riwayat booking
* Membatalkan booking dengan status pending
* Logout

### Fitur Admin

* Login admin
* Dashboard admin
* Melihat total lapangan, total booking, booking pending, dan total user
* Mengelola data lapangan
* Menambah data lapangan
* Mengedit data lapangan
* Menghapus atau menonaktifkan data lapangan
* Mengelola booking user
* Menyetujui booking
* Membatalkan booking
* Logout

## Teknologi yang Digunakan

* HTML
* CSS
* JavaScript
* Bootstrap
* PHP Native
* MySQL
* XAMPP
* phpMyAdmin
* Visual Studio Code
* GitHub

## Struktur Folder

```text
booking-lapangan/
├── admin/
│   ├── booking.php
│   ├── dashboard.php
│   ├── edit_lapangan.php
│   ├── hapus_lapangan.php
│   ├── lapangan.php
│   ├── tambah_lapangan.php
│   └── ubah_status_booking.php
│
├── asset/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   └── js/
│       └── script.js
│
├── config/
│   └── database.php
│
├── database/
│   └── db_booking_lapangan.sql
│
├── user/
│   ├── batal_booking.php
│   ├── booking.php
│   ├── dashboard.php
│   ├── lapangan.php
│   ├── proses_booking.php
│   └── riwayat.php
│
├── index.php
├── login.php
├── logout.php
├── proses_login.php
├── register.php
└── README.md
```

## Cara Menjalankan Project

1. Download atau clone repository ini.

```bash
git clone https://github.com/AyatAkras/Booking-Lapangan.git
```

2. Pindahkan folder project ke dalam folder `htdocs`.

```text
C:\xampp\htdocs\booking-lapangan
```

3. Jalankan XAMPP.

Aktifkan:

```text
Apache
MySQL
```

4. Buka phpMyAdmin melalui browser.

```text
http://localhost/phpmyadmin
```

5. Import database.

Pilih menu **Import**, lalu pilih file:

```text
database/db_booking_lapangan.sql
```

6. Buka website melalui browser.

```text
http://localhost/booking-lapangan
```

## Akun Admin

Gunakan akun berikut untuk login sebagai admin:

```text
Email    : admin@gmail.com
Password : admin123
```

## Alur Sistem

### Alur User

1. User melakukan register.
2. User login ke sistem.
3. User melihat daftar lapangan.
4. User memilih lapangan yang ingin dibooking.
5. User mengisi tanggal, jam mulai, dan jam selesai.
6. Sistem menyimpan data booking dengan status pending.
7. User dapat melihat riwayat booking.
8. User dapat membatalkan booking selama status masih pending.

### Alur Admin

1. Admin login ke sistem.
2. Admin masuk ke dashboard.
3. Admin dapat melihat data booking user.
4. Admin dapat menyetujui atau membatalkan booking.
5. Admin dapat menambah, mengedit, dan menghapus data lapangan.

## Database

Database yang digunakan bernama:

```text
db_booking_lapangan
```

Tabel utama:

```text
users
lapangan
booking
notifikasi
```

## Status Project

Project sudah memiliki fitur utama sesuai kebutuhan sistem booking lapangan olahraga, yaitu login/register, booking lapangan, riwayat pemesanan, pembatalan booking, dashboard admin, kelola booking, dan kelola data lapangan.
