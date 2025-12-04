<?php
require_once "config/Database.php";

class Buku
{
    private $conn;
    private $table = "buku";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
            SELECT b.*, g.nama_genre
            FROM " . $this->table . " b
            LEFT JOIN genre g ON b.id_genre = g.id_genre
            ORDER BY b.id_buku ASC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_buku)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_buku = :id_buku";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_genre, $judul, $penulis, $penerbit)
    {
        $query = "INSERT INTO " . $this->table . " (id_genre, judul, penulis, penerbit) VALUES (:id_genre, :judul, :penulis, :penerbit)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_genre', $id_genre);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':penerbit', $penerbit);

        return $stmt->execute();
    }

    public function update($id_buku, $id_genre, $judul, $penulis, $penerbit)
{
    $query = "UPDATE " . $this->table . " SET id_genre = :id_genre, judul = :judul, penulis = :penulis, penerbit = :penerbit WHERE id_buku = :id_buku";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id_buku', $id_buku);
    $stmt->bindParam(':id_genre', $id_genre);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':penerbit', $penerbit);

    return $stmt->execute();
}


    public function delete($id_buku)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_buku = :id_buku";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_buku', $id_buku);
        return $stmt->execute();
    }
}
