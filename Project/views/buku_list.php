<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Buku</h2>
<a href="index.php?entity=buku&action=add" class="">Add Buku</a>

<table class="w-full border">
    <tr>
        <th>Judul Buku</th>
        <th>Genre</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($bukuList as $buku): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($buku['judul']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($buku['nama_genre']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($buku['penulis']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($buku['penerbit']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=buku&action=edit&id=<?php echo $buku['id_buku']; ?>">Edit</a>
                |
                <a href="index.php?entity=buku&action=delete&id=<?php echo $buku['id_buku']; ?>"
                    onclick="return confirm('Hapus buku ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
