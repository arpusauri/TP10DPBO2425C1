# TP10DPBO2425C1
Saya Arya Purnama Sauri dengan NIM 2408521 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Desain Program

## Database

### Nama
`mvvm_db`

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

### 2. `Genre`

#### Model
Mengelola data Grand Prix di database.
- **File**: `models/TabelGrandprix.php`
- **Implements**: `KontrakModelGP.php`
- **Extends**: `DB.php`

**Method:**
- `__construct($host, $db, $user, $pass)` : Inisialisasi koneksi database
- `getAllGP()` : Mengambil semua data Grand Prix, diurutkan berdasarkan tanggal terbaru
- `getGPById($id)` : Mengambil data Grand Prix spesifik berdasarkan ID
- `addGP($nama, $tahun, $tanggal, $ket)` : Menambah data Grand Prix baru ke database
- `updateGP($id, $nama, $tahun, $tanggal, $ket)` : Mengupdate data Grand Prix berdasarkan ID
- `deleteGP($id)` : Menghapus data Grand Prix dari database berdasarkan ID

#### View
Menampilkan antarmuka pengelolaan Grand Prix.
- **File**: `views/ViewGrandprix.php`
- **Implements**: `KontrakViewGP.php`
- **Template**: `template/gp_list.html` (list), `template/gp_form.html` (form)

**Method:**
- `tampilListGP($data)` : Menampilkan tabel list Grand Prix dengan kolom: Nama GrandPrix, Tahun, Tanggal, Keterangan, dan tombol Edit & Hapus
- `tampilFormGP($data = null)` : Menampilkan form input untuk tambah/edit Grand Prix dengan field: nama_gp, tahun, tanggal, keterangan

#### Presenter
Mengatur alur CRUD Grand Prix (Business Logic).
- **File**: `presenters/PresenterGP.php`
- **Implements**: `KontrakPresenterGP.php`

**Method:**
- `__construct($model, $view)` : Inisialisasi dengan dependency injection Model dan View
- `loadData()` : Mengambil data dari model, konversi ke objek GrandPrix, kirim ke view
- `showFormAdd()` : Menampilkan form kosong untuk tambah data
- `showFormEdit($id)` : Mengambil data spesifik dan tampilkan ke form edit
- `add($nama, $tahun, $tanggal, $ket)` : Meminta model untuk menyimpan data baru
- `edit($id, $nama, $tahun, $tanggal, $ket)` : Meminta model untuk update data
- `delete($id)` : Meminta model untuk menghapus data

# Penjelasan Alur Program

## 1. Jalankan Program

## 2. Menampilkan tampilan awal 
Terdapat navbar yang mengandung 5 link yang bisa ditekan oleh user:
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
3. Masukan data 
4. 

### UPDATE
1. Klik tombol "**Edit**" pada baris data yang ingin diubah
2. Redirect ke halaman form dengan value sesuai data baris
6. Ubah data sesuai kebutuhan
7. Klik "**Save**" 
8. Form submit via POST dengan `action=edit`, `nav=pembalap`, dan `id`
9. Presenter memanggil `$model->ubahPembalap(...)`
10. Data terupdate di database
11. Redirect ke `index.php?nav=pembalap`

### DELETE
1. Klik tombol **Delete**
2. Menampilkan konfirmasi JavaScript "OK" atau "Cancel"
3. Jika OK, data akan dihapus dari database
4. Jika Cancel, akan membatalkan aksi penghapusan

# Dokumentasi