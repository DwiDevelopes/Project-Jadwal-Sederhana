-- Buat database
CREATE DATABASE IF NOT EXISTS dashboard_catatan;
USE dashboard_catatan;

-- Tabel untuk kategori
CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    warna VARCHAR(7) DEFAULT '#007bff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk catatan/kegiatan
CREATE TABLE IF NOT EXISTS catatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    kategori_id INT,
    tanggal DATE NOT NULL,
    waktu TIME,
    status ENUM('pending', 'selesai') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE SET NULL
);

-- Insert data kategori default
INSERT INTO kategori (nama, warna) VALUES 
('Pribadi', '#007bff'),
('Kerja', '#28a745'),
('Belajar', '#ffc107'),
('Olahraga', '#dc3545'),
('Hobi', '#6f42c1');

-- Insert beberapa data contoh
INSERT INTO catatan (judul, deskripsi, kategori_id, tanggal, waktu, status) VALUES 
('Meeting Tim', 'Diskusi proyek baru dengan tim pengembangan', 2, '2023-10-15', '10:00:00', 'selesai'),
('Belajar PHP', 'Mempelajari konsep OOP dan database', 3, '2023-10-16', '14:00:00', 'pending'),
('Jogging Pagi', 'Lari pagi di taman kota', 4, '2023-10-17', '06:30:00', 'pending');

-- Tambah tabel pengaturan
CREATE TABLE IF NOT EXISTS pengaturan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_setting VARCHAR(100) NOT NULL UNIQUE,
    nilai_setting TEXT,
    tipe ENUM('text', 'number', 'boolean', 'color') DEFAULT 'text',
    kategori VARCHAR(50) DEFAULT 'umum',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert pengaturan default
INSERT INTO pengaturan (nama_setting, nilai_setting, tipe, kategori) VALUES 
('nama_aplikasi', 'Catatan & Kegiatan', 'text', 'umum'),
('theme', 'light', 'text', 'tampilan'),
('notifikasi', '1', 'boolean', 'notifikasi'),
('warna_primary', '#4361ee', 'color', 'tampilan'),
('items_per_page', '10', 'number', 'umum'),
('bahasa', 'id', 'text', 'umum');

-- Tambah kolom prioritas di tabel catatan
ALTER TABLE catatan ADD COLUMN prioritas ENUM('rendah', 'sedang', 'tinggi') DEFAULT 'sedang' AFTER status;

-- Update data contoh dengan prioritas
UPDATE catatan SET prioritas = 'tinggi' WHERE id = 1;
UPDATE catatan SET prioritas = 'sedang' WHERE id = 2;
UPDATE catatan SET prioritas = 'rendah' WHERE id = 3;