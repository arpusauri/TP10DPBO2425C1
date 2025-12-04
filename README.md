# TP10DPBO2425C1
Saya Arya Purnama Sauri dengan NIM 2408521 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Desain Program

## Database

### Nama
`mvvm_db`

## Relasi
<img width="870" height="329" alt="image" src="https://github.com/user-attachments/assets/70ee0b1c-4318-46f5-a1e1-4b4ca6ac5d27" />

### Struktur Tabel
Memiliki 4 entitas (tabel) yaitu.

#### 1. Tabel: `anggota`
Tabel ini menyimpan data anggota.

| Field           | Tipe Data    | Constraint   | Keterangan                                                   |
|-------          |-----------   |------------  |------------                                                  |
| `id_anggota`            | INT(11)      | PRIMARY KEY  | ID PRIMARY KEY unik anggota dengan AUTO_INCREMENT                    |
| `nama_anggota`          | VARCHAR(100) | NOT NULL     | Nama Anggota Perpustakaan                                                |
| `no_hp`           | VARCHAR(15) | NOT NULL         | No Telepon Anggota Perpustakaan                                            |

#### 2. Tabel: `genre`
Tabel ini menyimpan data genre buku.

| Field           | Tipe Data    | Constraint    | Keterangan                                             |
|-------          |-----------   |------------   |------------                                            |
| `id_genre`            | INT(11)      | PRIMARY KEY   | ID PRIMARY unik genre dengan AUTO_INCREMENT        |
| `nama_genre`       | VARCHAR(100) | NOT NULL      | Genre Buku                                        |

#### 3. Tabel: `genre`
Tabel ini menyimpan data genre buku.

| Field           | Tipe Data    | Constraint    | Keterangan                                             |
|-------          |-----------   |------------   |------------                                            |
| `id_buku`            | INT(11)      | PRIMARY KEY   | ID PRIMARY unik genre dengan AUTO_INCREMENT        |
| `id_genre`       | VARCHAR(100) | NOT NULL      | Genre Buku                                        |
| `judul`       | VARCHAR(150) | NOT NULL      | Judul Buku                                        |
| `penulis`       | VARCHAR(100) | NOT NULL      | Nama Penulis Buku                                        |
| `penerbit`       | VARCHAR(100) | NOT NULL      | Perusahaan Penerbit Buku                                        |

#### 4. Tabel: `peminjaman`
Tabel ini menyimpan data genre buku.

| Field           | Tipe Data    | Constraint    | Keterangan                                             |
|-------          |-----------   |------------   |------------                                            |
| `id_peminjaman`            | INT(11)      | PRIMARY KEY   | ID PRIMARY unik peminjaman dengan AUTO_INCREMENT        |
| `id_anggota`       | INT(11) | FOREIGN KEY      | ID FOREIGN yang Diambil Dari Tabel anggota                                        |
| `id_buku`       | INT(11) | FOREIGN KEY      | ID FOREIGN KEY yang Diambil Dari Tabel buku                                         |
| `tanggal_pinjam`       | DATE | NOT NULL      | Tanggal Pinjam Buku                                        |
| `tanggal_kembali`       | DATE | NULL      | Tanggal Kembali Buku                                        |

## MVVM (Model-View-ViewModel)   

### 1. `Anggota`

**Model:** Mengelola data anggota di database 

- **File** : models/Anggota.php
- **Extends** : config/Database.php

**Method:**
- `__construct()` : Constructor untuk koneksi db 
- `getAll()`: Mengambil semua data tabel anggota
- `getById($id)` : Mengambil data anggota spesifik berdasarkan ID
- `create($nama_anggota, $no_hp)` : Menambah data anggota baru
- `update($id_anggota, $nama_anggota, $no_hp)` : Mengubah data anggota berdasarkan ID
- `delete($id_anggota)` : Menghapus data anggota dari database berdasarkan ID

#### View
Menampilkan antarmuka pengelolaan data anggota.
- `anggota_list.php` : Halaman untuk menampilkan data anggota dan (Actions)
- `anggota_form.php` : Halaman untuk menambah/mengupdate data anggota

#### ViewModel
Menangani logika bisnis anggota.
- **File**: `viewmodels/AnggotaViewModel.php`
- **Implements**: `models/Anggota.php`

**Method:**
- `__construct()` : Inisialisasi dan membuat instance dari model Anggota
- `getAnggotaList()` : Mengambil semua data anggota dari model via $this->anggota->getAll()
- `getAnggotaById($id_anggota)` : Mengambil data anggota spesifik berdasarkan ID via $this->anggota->getById($id_anggota)
- `addAnggota($nama_anggota, $no_hp)` : Memanggil $this->anggota->create() untuk menyimpan data anggota baru
- `updateAnggota($id_anggota, $nama_anggota, $no_hp)` : Memanggil $this->anggota->update() untuk update data anggota
- `deleteAnggota($id_anggota)` : Memanggil $this->anggota->delete() untuk menghapus data anggota

## 2. `Buku`

Model ini bertugas mengelola data buku di database.

### Methods
- `__construct()`  
  Inisialisasi koneksi database.

- `getAll()`  
  Mengambil semua data buku dan melakukan join ke tabel genre.

- `getById($id_buku)`  
  Mengambil satu data buku berdasarkan ID.

- `create($id_genre, $judul, $penulis, $penerbit)`  
  Menambahkan data buku baru.

- `update($id_buku, $id_genre, $judul, $penulis, $penerbit)`  
  Mengubah data buku berdasarkan ID.

- `delete($id_buku)`  
  Menghapus data buku berdasarkan ID.

## 2. View (Halaman Tampilan)

- `buku_list.php`  
  Menampilkan daftar buku lengkap beserta tombol aksi (Edit & Delete).

- `buku_form.php`  
  Halaman form untuk menambah atau mengedit data buku.

## 3. ViewModel

Menghubungkan view dengan model serta mengatur logika bisnis buku.

### Methods
- `__construct()`  
  Membuat instance model Buku.

- `getBukuList()`  
  Mengambil semua data buku melalui model.

- `getBukuById($id_buku)`  
  Mengambil buku tertentu berdasarkan ID.

- `addBuku($id_genre, $judul, $penulis, $penerbit)`  
  Menambahkan buku baru melalui model.

- `updateBuku($id_buku, $id_genre, $judul, $penulis, $penerbit)`  
  Memperbarui data buku melalui model.

- `deleteBuku($id_buku)`  
  Menghapus buku berdasarkan ID.

## 3. `Genre`

Model ini bertugas mengelola data genre.

### Methods
- `__construct()`  
  Menginisialisasi koneksi database.

- `getAll()`  
  Mengambil semua data genre.

- `getById($id_genre)`  
  Mengambil satu data genre berdasarkan ID.

- `create($nama_genre)`  
  Menambahkan genre baru.

- `update($id_genre, $nama_genre)`  
  Mengubah genre berdasarkan ID.

- `delete($id_genre)`  
  Menghapus genre berdasarkan ID.

## 2. View

- `genre_list.php`  
  Menampilkan daftar genre beserta aksi edit/hapus.

- `genre_form.php`  
  Form untuk menambah atau mengubah data genre.

## 3. ViewModel — `viewmodels/GenreViewModel.php`

Mengatur logika bisnis untuk genre.

### Methods
- `__construct()`  
  Membuat instance dari model Genre.

- `getGenreList()`  
  Mengambil semua data genre.

- `getGenreById($id_genre)`  
  Mengambil genre tertentu berdasarkan ID.

- `addGenre($nama_genre)`  
  Menambahkan data genre baru.

- `updateGenre($id_genre, $nama_genre)`  
  Mengupdate data genre berdasarkan ID.

- `deleteGenre($id_genre)`  
  Menghapus genre berdasarkan ID.

### 4. `Peminjaman`

**Model:** Mengelola data peminjaman di database 

- **File** : models/Peminjaman.php
- **Extends** : config/Database.php

**Method:**
- `__construct()` : Constructor untuk koneksi db
- `getAll()`: Mengambil semua data tabel peminjaman
- `getById($id_peminjaman)` : Mengambil data peminjaman spesifik berdasarkan ID
- `create($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)` : Menambah data peminjaman baru
- `update($id_peminjaman, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)` : Mengubah data peminjaman berdasarkan ID
- `delete($id_peminjaman)` : Menghapus data peminjaman dari database berdasarkan ID

#### View
Menampilkan antarmuka pengelolaan data peminjaman.
- `peminjaman_list.php` : Halaman untuk menampilkan data peminjaman dan (Actions)
- `peminjaman_form.php` : Halaman untuk menambah/mengupdate data peminjaman

#### ViewModel
Menangani logika bisnis peminjaman.
- **File**: `viewmodels/PeminjamanViewModel.php`
- **Implements**: `models/Peminjaman.php`

**Method:**
- `__construct()` : Inisialisasi dan membuat instance dari model peminjaman
- `getPeminjamanList()` : Mengambil semua data peminjaman dari model via $this->peminjaman->getAll()
- `getPeminjamanById($id_peminjaman)` : Mengambil data peminjaman spesifik berdasarkan ID via $this->peminjaman->getById($id_peminjaman)
- `addPeminjaman($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)` : Memanggil $this->peminjaman->create() untuk menyimpan data peminjaman baru
- `updatePeminjaman($id_peminjaman, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)` : Memanggil $this->peminjaman->update() untuk update data peminjaman
- `deletePeminjaman($id_peminjaman)` : Memanggil $this->peminjaman->delete() untuk menghapus data peminjaman

# Penjelasan Alur Program

## 1. Jalankan Program

## 2. Menampilkan tampilan awal 
Terdapat navbar yang mengandung 4 link yang bisa ditekan oleh user:
- **Anggota** : Akses halaman tabel anggota
- **Genre** : Akses halaman tabel genre
- **Buku** : Akses halaman tabel buku
- **Peminjaman** : Akses halaman tabel peminjaman

## 3. Menekan Navigasi (Salah Satu)

### READ
1. Menampilkan tabel sesuai navigasi dan tombol Actions (Edit & Delete)

### CREATE
1. Klik tombol **Add (tabel)**" di bagian atas ujung kiri tabel
2. Redirect halaman dari `list` menjadi `form`
3. Masukan data yang dibutuhkan
4. Tekan tombol **Save**
5. Data berhasil ditambahkan ke database
6. Redirect ke halaman selanjutnya

### UPDATE
1. Klik tombol "**Edit**" pada baris data yang ingin diubah
2. Redirect ke halaman form dengan value sesuai data baris
6. Ubah data sesuai kebutuhan
7. Tekan tombol **Save**
8. Data berhasil diubah pada database
9. Redirect ke halaman sebelumnya

### DELETE
1. Klik tombol **Delete**
2. Menampilkan konfirmasi JavaScript "Hapus data ini?" dan juga tombol "OK" atau "Cancel"
3. Tekan Cancel, untuk membatalkan aksi penghapusan
4. Tekan OK, untuk menghapus data
5. Data berhasil dihapus di database

# Dokumentasi
https://github.com/user-attachments/assets/2b510c64-d0a3-412d-a7ee-b5c64542a960
