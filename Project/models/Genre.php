<?php
require_once "config/Database.php";

class Genre
{
    private $conn;
    private $table = "genre";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_genre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_genre)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_genre = :id_genre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_genre', $id_genre);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_genre)
    {
        $query = "INSERT INTO " . $this->table . " (nama_genre) VALUES (:nama_genre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_genre', $nama_genre);
        return $stmt->execute();
    }

    public function update($id_genre, $nama_genre)
    {
        $query = "UPDATE " . $this->table . " SET nama_genre = :nama_genre WHERE id_genre = :id_genre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_genre', $id_genre);
        $stmt->bindParam(':nama_genre', $nama_genre);
        return $stmt->execute();
    }

    public function delete($id_genre)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_genre = :id_genre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_genre', $id_genre);
        return $stmt->execute();
    }
}
