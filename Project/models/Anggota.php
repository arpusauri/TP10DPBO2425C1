<?php
require_once 'config/Database.php';

class Anggota
{
    // model anggota
    private $conn;
    private $table = 'anggota';

    // konstruktor untuk koneksi db
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // method CRUD
    public function getAll()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_anggota ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_anggota = :id_anggota';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_anggota', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_anggota, $no_hp)
    {
        $query = 'INSERT INTO ' . $this->table . ' (nama_anggota, no_hp) VALUES (:nama_anggota, :no_hp)';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_anggota', $nama_anggota);
        $stmt->bindParam(':no_hp', $no_hp);

        return $stmt->execute();
    }

    public function update($id_anggota, $nama_anggota, $no_hp)
    {
        $query = 'UPDATE ' . $this->table . ' SET nama_anggota = :nama_anggota, no_hp = :no_hp WHERE id_anggota = :id_anggota';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_anggota', $id_anggota);
        $stmt->bindParam(':nama_anggota', $nama_anggota);
        $stmt->bindParam(':no_hp', $no_hp);

        return $stmt->execute();
    }

    public function delete($id_anggota)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_anggota = :id_anggota';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_anggota', $id_anggota);

        return $stmt->execute();
    }
}
