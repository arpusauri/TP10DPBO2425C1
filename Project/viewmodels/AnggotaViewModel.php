<?php
require_once 'models/Anggota.php';

class AnggotaViewModel
{
    private $anggota;

    public function __construct()
    {
        $this->anggota = new Anggota();
    }

    public function getAnggotaList()
    {
        return $this->anggota->getAll();
    }

    public function getAnggotaById($id_anggota)
    {
        return $this->anggota->getById($id_anggota);
    }

    public function addAnggota($nama_anggota, $no_hp)
    {
        return $this->anggota->create($nama_anggota, $no_hp);
    }

    public function updateAnggota($id_anggota, $nama_anggota, $no_hp)
    {
        return $this->anggota->update($id_anggota, $nama_anggota, $no_hp);
    }

    public function deleteAnggota($id_anggota)
    {
        return $this->anggota->delete($id_anggota);
    }
}
