## Cara Menjalankan Proyek

### 1. Atur Database
- Pastikan MySQL berjalan.
- Jalankan file `database.sql` untuk membuat database dan tabel:
  ```
  CREATE DATABASE IF NOT EXISTS tabungan_db;
  USE tabungan_db;

  CREATE TABLE IF NOT EXISTS users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL,
      role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

  CREATE TABLE IF NOT EXISTS savings (
      id INT AUTO_INCREMENT PRIMARY KEY,
      user_id INT NOT NULL,
      amount DECIMAL(10,2) NOT NULL CHECK (amount > 0),
      message TEXT,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
  );
  ```

### 2. Konfigurasi
- Pastikan file proyek berada di folder root server lokal (contoh: `htdocs` untuk XAMPP).
- Sesuaikan koneksi database di `config/database.php`:
  ```php
  private $host = 'localhost';
  private $db_name = 'tabungan_db';
  private $username = 'root'; // Ubah jika berbeda
  private $password = ''; // Ubah jika berbeda
  ```

### 3. Jalankan Proyek
- Start server lokal (Apache dan MySQL).
- Akses proyek di browser:
  ```
  http://localhost/nama-folder-proyek/index.php
  ```

## Fitur Utama
- **Login dan Logout**: Autentikasi pengguna.
- **Registrasi**: Registrasi pengguna baru, pengguna pertama menjadi admin.
- **Home**: Ringkasan dan riwayat tabungan.
- **Tambah Tabungan**: Input tabungan baru.
- **Dashboard Admin**: Kelola data pengguna dan tabungan.