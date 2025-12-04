<?php
require_once "config/Database.php";

class Peminjaman
{
    private $conn;
    private $table = "peminjaman";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
            SELECT p.*, a.nama_anggota, b.judul 
            FROM " . $this->table . " p
            INNER JOIN anggota a ON p.id_anggota = a.id_anggota
            INNER JOIN buku b ON p.id_buku = b.id_buku
            ORDER BY p.id_peminjaman ASC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_peminjaman)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_peminjaman = :id_peminjaman";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_peminjaman', $id_peminjaman);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)
    {
        $query = "INSERT INTO " . $this->table . "
                  (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali)
                  VALUES (:id_anggota, :id_buku, :tanggal_pinjam, :tanggal_kembali)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_anggota', $id_anggota);
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);
        $stmt->bindParam(':tanggal_kembali', $tanggal_kembali);

        return $stmt->execute();
    }

    public function update($id_peminjaman, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali)
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_anggota = :id_anggota,
                      id_buku = :id_buku,
                      tanggal_pinjam = :tanggal_pinjam,
                      tanggal_kembali = :tanggal_kembali
                  WHERE id_peminjaman = :id_peminjaman";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_peminjaman', $id_peminjaman);
        $stmt->bindParam(':id_anggota', $id_anggota);
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);
        $stmt->bindParam(':tanggal_kembali', $tanggal_kembali);

        return $stmt->execute();
    }

    public function delete($id_peminjaman)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_peminjaman = :id_peminjaman";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_peminjaman', $id_peminjaman);
        return $stmt->execute();
    }
}
