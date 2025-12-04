<?php
require_once 'models/Genre.php';

class GenreViewModel
{
    private $genre;

    public function __construct()
    {
        $this->genre = new Genre();
    }

    public function getGenreList()
    {
        return $this->genre->getAll();
    }

    public function getGenreById($id_genre)
    {
        return $this->genre->getById($id_genre);
    }

    public function addGenre($nama_genre)
    {
        return $this->genre->create($nama_genre);
    }

    public function updateGenre($id_genre, $nama_genre)
    {
        return $this->genre->update($id_genre, $nama_genre);
    }

    public function deleteGenre($id_genre)
    {
        return $this->genre->delete($id_genre);
    }
}
