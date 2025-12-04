<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Genre</h2>
<a href="index.php?entity=genre&action=add" class="">Add Genre</a>

<table class="w-full border">
    <tr>
        <th>Nama Genre</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($genreList as $genre): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($genre['nama_genre']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=genre&action=edit&id=<?php echo $genre['id_genre']; ?>">Edit</a>
                |
                <a href="index.php?entity=genre&action=delete&id=<?php echo $genre['id_genre']; ?>"
                    onclick="return confirm('Hapus genre ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
