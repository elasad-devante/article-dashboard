# Dashboard Konten Artikel

Proyek ini adalah dashboard admin sederhana untuk mengelola konten artikel dan mengumpulkan feedback. Aplikasi ini dibangun dengan CodeIgniter 4 dan menyediakan antarmuka yang sederhana untuk membuat, mengedit, menghapus, mencari, serta melihat artikel.

## Fitur

- Manajemen artikel
  - menambah artikel baru
  - mengedit artikel yang sudah ada berdasarkan ID atau slug
  - menghapus artikel
  - mencari artikel berdasarkan judul atau slug
  - membuat paginasi untuk daftar artikel yang panjang
- Manajemen feedback
  - mengirim feedback melalui form
  - menampilkan feedback terbaru di halaman feedback
- Ringkasan dashboard
  - jumlah total artikel
  - jumlah artikel draft
  - jumlah artikel published
  - jumlah total feedback
  - artikel dan feedback terbaru

## Halaman Utama

- Dashboard: ringkasan data artikel dan feedback
- Artikel: daftar, pencarian, edit, dan hapus artikel
- Tambah/Edit Artikel: form untuk membuat atau memperbarui artikel
- Feedback: form untuk mengirim feedback dan melihat data feedback yang tersimpan

## Persyaratan

- PHP 8.1 atau lebih tinggi
- Composer
- MySQL atau database lain yang didukung
- Server lokal seperti XAMPP atau Apache

## Cara Menjalankan

1. Instal dependensi:
   ```bash
   composer install
   ```
2. Konfigurasi pengaturan database pada file environment.
3. Jalankan aplikasi:
   ```bash
   php spark serve
   ```
4. Buka proyek di browser pada:
   ```text
   http://localhost:8080
   ```

## Catatan

- Dashboard ini bergantung pada tabel database untuk artikel dan feedback.
- Pastikan tabel yang diperlukan sudah ada sebelum menggunakan form.
