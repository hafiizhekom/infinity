# Infinity Web Application

Infinity adalah aplikasi web berbasis PHP menggunakan framework CodeIgniter.

## Fitur

- Manajemen cache (mendukung APC, file, memcached, redis, dll)
- Backup database (MySQL/Interbase/Firebird)
- Pengiriman email (PHPMailer)
- Ekspor/import Excel (PHPExcel)
- Konfigurasi MIME types
- Logging dan error handling

## Instalasi

1. Clone repository ini
2. Salin file `.env.example` ke `.env` (jika ada)
3. Atur konfigurasi database di `application/config/database.php`
4. Pastikan folder `application/cache/` dan `application/logs/` writable
5. Jalankan aplikasi melalui web server yang mendukung PHP

---
**Catatan:**  
Database dummy tersedia pada file `infinity.sql`.  
Seluruh data di dalamnya bersifat dummy dan tidak menggunakan username maupun password asli.