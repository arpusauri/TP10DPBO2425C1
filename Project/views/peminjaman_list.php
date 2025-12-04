<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Peminjaman</h2>
<a href="index.php?entity=peminjaman&action=add" class="">Add Peminjaman</a>

<table class="w-full border">
    <tr>
        <th>Nama Anggota</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($peminjamanList as $pinjam): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($pinjam['nama_anggota']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($pinjam['judul']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($pinjam['tanggal_pinjam']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($pinjam['tanggal_kembali']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=peminjaman&action=edit&id=<?php echo $pinjam['id_peminjaman']; ?>">Edit</a>
                |
                <a href="index.php?entity=peminjaman&action=delete&id=<?php echo $pinjam['id_peminjaman']; ?>"
                    onclick="return confirm('Hapus data peminjaman ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
