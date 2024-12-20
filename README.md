# PMB_App : Aplikasi Penerimaan Siswa Baru Universitas Documentation

## :raising_hand:About App
Aplikasi PMB_App diciptakan untuk melakukan penerimaan mahasiswa baru dari sebuah universitas menggunakan bahasa pemrograman PHP dan *framework* Laravel. Selain itu, berbagai jenis Library juga digunakan untuk memastikan pengalaman menggunakan aplikasi yang lebih baik.

## :stars:Fitur Utama Aplikasi
- **Otentikasi Pengguna**
- **Otorisasi Pengguna**
- **Verifikasi Akun**
- **Penerimaan Mahasiswa & Validasi Data**
- **Sistem Pengumuman**

## :book:Teknologi yang digunakan 
- **Backend** : [**Laravel Framework 11.35.0**](https://laravel.com/docs/11.x)
- **Frontend:**
  - [**Bootstrap 5.3.3**](https://blog.getbootstrap.com/2024/02/20/bootstrap-5-3-3/)
  - [**DataTables 1.11.5**](https://cdn.datatables.net/1.11.5/)
  - [**JQuery 3.7.1**](https://jquery.com/download/)

## :computer:Requirement untuk Menjalankan Aplikasi Ini
- **Persyaratan Sistem**
  - PHP >= 8.0
  - Composer
  - MySQL
  - Server Web (Apache)
  - Aplikasi Visual Studio Code
  - Node Package Manager

## :walking:Langkah Instalasi
- **Clone Repositori**
  ```
  - git clone https://github.com/Sertifikasi-Web-Developer-LSPP1-UMDP/assessment-batch-3-BillyFranko
  - cd project assessment-batch-3-BillyFranko
  - npm install
  - npm run build
  ```
- **Install Composer**
  ```
  composer install
  ```
- **Konfigurasi File .env**
  - Copy file .env.example kemudian
  ```
  php artisan key:generate
  ```
- **Jalankan Migrasi Database**
  ```
  php artisan migrate
  ```
- **Lakukan Koneksi dengan Storage**
  ```
  php artisan storage:link
  ```
- **Jalankan Aplikasi**
  ```
  php artisan serve
  ```

[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/UwpJJG2e)
