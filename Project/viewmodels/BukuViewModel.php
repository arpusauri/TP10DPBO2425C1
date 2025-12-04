<?php
require_once 'models/Buku.php';

class BukuViewModel
{
    private $buku;

    public function __construct()
    {
        $this->buku = new Buku();
    }

    public function getBukuList()
    {
        return $this->buku->getAll();
    }

    public function getBukuById($id_buku)
    {
        return $this->buku->getById($id_buku);
    }

    public function addBuku($id_genre, $judul, $penulis, $penerbit)
    {
        return $this->buku->create($id_genre, $judul, $penulis, $penerbit);
    }

    public function updateBuku($id_buku, $id_genre, $judul, $penulis, $penerbit)
    {
        return $this->buku->update($id_buku, $id_genre, $judul, $penulis, $penerbit);
    }

    public function deleteBuku($id_buku)
    {
        return $this->buku->delete($id_buku);
    }
}
