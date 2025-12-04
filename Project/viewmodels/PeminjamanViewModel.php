<?php
require_once 'models/Peminjaman.php';
require_once 'models/Anggota.php';
require_once 'models/Buku.php';

class PeminjamanViewModel
{
    private $peminjaman;
    private $anggota;
    private $buku;

    public function __construct()
    {
        $this->peminjaman = new Peminjaman();
        $this->anggota = new Anggota();
        $this->buku = new Buku();
    }

    public function getPeminjamanList()
    {
        return $this->peminjaman->getAll();
    }

    public function getPeminjamanById($id_peminjaman)
    {
        return $this->peminjaman->getById($id_peminjaman);
    }

    public function addPeminjaman($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)
    {
        return $this->peminjaman->create($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali);
    }

    public function updatePeminjaman($id_peminjaman, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)
    {
        return $this->peminjaman->update($id_peminjaman, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali);
    }

    public function deletePeminjaman($id_peminjaman)
    {
        return $this->peminjaman->delete($id_peminjaman);
    }

    // Helper untuk form
    public function getAnggotaList()
    {
        return $this->anggota->getAll();
    }

    public function getBukuList()
    {
        return $this->buku->getAll();
    }
}
