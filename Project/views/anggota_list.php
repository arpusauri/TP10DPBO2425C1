<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Anggota</h2>
<a href="index.php?entity=anggota&action=add" class="">Add Anggota</a>

<table class="w-full border">
    <tr>
        <th>Nama</th>
        <th>No HP</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($anggotaList as $anggota): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($anggota['nama_anggota']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($anggota['no_hp']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=anggota&action=edit&id=<?php echo $anggota['id_anggota']; ?>">Edit</a>
                |
                <a href="index.php?entity=anggota&action=delete&id=<?php echo $anggota['id_anggota']; ?>"
                    onclick="return confirm('Hapus anggota ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
