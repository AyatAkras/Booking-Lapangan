CREATE DATABASE IF NOT EXISTS db_booking_lapangan;
USE db_booking_lapangan;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    no_hp VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE lapangan (
    id_lapangan INT AUTO_INCREMENT PRIMARY KEY,
    nama_lapangan VARCHAR(100) NOT NULL,
    jenis_lapangan VARCHAR(50) NOT NULL,
    lokasi VARCHAR(150) NOT NULL,
    harga_per_jam INT NOT NULL,
    status ENUM('aktif','tidak aktif') DEFAULT 'aktif',
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE booking (
    id_booking INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_lapangan INT NOT NULL,
    tanggal_booking DATE NOT NULL,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL,
    total_harga INT NOT NULL,
    status_booking ENUM('pending','disetujui','dibatalkan','selesai') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_lapangan) REFERENCES lapangan(id_lapangan)
);

CREATE TABLE notifikasi (
    id_notifikasi INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    pesan TEXT NOT NULL,
    status_baca ENUM('belum','sudah') DEFAULT 'belum',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

INSERT INTO users (nama, email, password, role, no_hp)
VALUES ('Admin', 'admin@gmail.com', MD5('admin123'), 'admin', '081234567890');

INSERT INTO lapangan (nama_lapangan, jenis_lapangan, lokasi, harga_per_jam, status, gambar)
VALUES 
('Lapangan Futsal A', 'Futsal', 'Gedung Olahraga Kampus', 50000, 'aktif', 'futsal.jpg'),
('Lapangan Basket B', 'Basket', 'Area Sport Center', 40000, 'aktif', 'basket.jpg'),
('Lapangan Badminton C', 'Badminton', 'GOR Indoor Kampus', 30000, 'aktif', 'badminton.jpg');