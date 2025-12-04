<?php
require_once 'viewmodels/AnggotaViewModel.php';
require_once 'viewmodels/GenreViewModel.php';
require_once 'viewmodels/BukuViewModel.php';
require_once 'viewmodels/PeminjamanViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'anggota';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity === 'anggota') {
    $vm = new AnggotaViewModel();

    switch ($action) {
        case 'list':
            $anggotaList = $vm->getAnggotaList();
            require 'views/anggota_list.php';
            break;

        case 'add':
            require 'views/anggota_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $anggota = $vm->getAnggotaById($id);
            require 'views/anggota_form.php';
            break;

        case 'save':
            $vm->addAnggota($_POST['nama'], $_POST['no_hp']);
            header('Location: index.php?entity=anggota&action=list');
            break;

        case 'update':
            $vm->updateAnggota($_GET['id'], $_POST['nama'], $_POST['no_hp']);
            header('Location: index.php?entity=anggota&action=list');
            break;

        case 'delete':
            $vm->deleteAnggota($_GET['id']);
            header('Location: index.php?entity=anggota&action=list');
            break;

        default:
            echo 'Invalid action.';
            break;
    }

} elseif ($entity === 'genre') {
    $vm = new GenreViewModel();

    switch ($action) {
        case 'list':
            $genreList = $vm->getGenreList();
            require 'views/genre_list.php';
            break;

        case 'add':
            require 'views/genre_form.php';
            break;

        case 'edit':
            $genre = $vm->getGenreById($_GET['id']);
            require 'views/genre_form.php';
            break;

        case 'save':
            $vm->addGenre($_POST['nama_genre']);
            header('Location: index.php?entity=genre&action=list');
            break;

        case 'update':
            $vm->updateGenre($_GET['id'], $_POST['nama_genre']);
            header('Location: index.php?entity=genre&action=list');
            break;

        case 'delete':
            $vm->deleteGenre($_GET['id']);
            header('Location: index.php?entity=genre&action=list');
            break;

        default:
            echo 'Invalid action.';
            break;
    }

} elseif ($entity === 'buku') {
    $vm = new BukuViewModel();
    $genreVM = new GenreViewModel();

    switch ($action) {
        case 'list':
            $bukuList = $vm->getBukuList();
            require 'views/buku_list.php';
            break;

        case 'add':
            $genreList = $genreVM->getGenreList();
            require 'views/buku_form.php';
            break;

        case 'edit':
            $buku = $vm->getBukuById($_GET['id']);
            $genreList = $genreVM->getGenreList();
            require 'views/buku_form.php';
            break;

        case 'save':
            $vm->addBuku($_POST['id_genre'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit']);
            header('Location: index.php?entity=buku&action=list');
            break;

        case 'update':
            $vm->updateBuku($_GET['id'], $_POST['id_genre'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit']);
            header('Location: index.php?entity=buku&action=list');
            break;

        case 'delete':
            $vm->deleteBuku($_GET['id']);
            header('Location: index.php?entity=buku&action=list');
            break;

        default:
            echo 'Invalid action.';
            break;
    }

} elseif ($entity === 'peminjaman') {
    $vm = new PeminjamanViewModel();
    $anggotaVM = new AnggotaViewModel();
    $bukuVM = new BukuViewModel();

    switch ($action) {
        case 'list':
            $peminjamanList = $vm->getPeminjamanList();
            require 'views/peminjaman_list.php';
            break;

        case 'add':
            $anggotaList = $anggotaVM->getAnggotaList();
            $bukuList = $bukuVM->getBukuList();
            require 'views/peminjaman_form.php';
            break;

        case 'edit':
            $peminjaman = $vm->getPeminjamanById($_GET['id']);
            $anggotaList = $anggotaVM->getAnggotaList();
            $bukuList = $bukuVM->getBukuList();
            require 'views/peminjaman_form.php';
            break;

        case 'save':
            $vm->addPeminjaman($_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali']);
            header('Location: index.php?entity=peminjaman&action=list');
            break;

        case 'update':
            $vm->updatePeminjaman($_GET['id'], $_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali']);
            header('Location: index.php?entity=peminjaman&action=list');
            break;

        case 'delete':
            $vm->deletePeminjaman($_GET['id']);
            header('Location: index.php?entity=peminjaman&action=list');
            break;

        default:
            echo 'Invalid action.';
            break;
    }
} else {
    echo 'Invalid entity.';
}
