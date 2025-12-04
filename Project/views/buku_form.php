<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">
    <?php echo isset($buku) ? 'Edit Buku' : 'Add Buku'; ?>
</h2>

<form action="index.php?entity=buku&action=<?php
echo isset($buku) ? 'update&id=' . $buku['id_buku'] : 'save';
?>" 
    method="POST" class="space-y-4">

    <!-- JUDUL -->
    <div>
        <label class="block">Judul Buku:</label>
        <input type="text" name="judul"
               value="<?php echo isset($buku) ? $buku['judul'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <!-- GENRE -->
    <div>
        <label class="block">Genre:</label>
        <select name="id_genre" class="border p-2 w-full" required>
            <?php foreach ($genreList as $genre): ?>
                <option value="<?php echo $genre['id_genre']; ?>"
                    <?php echo (isset($buku) && $buku['id_genre'] == $genre['id_genre']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($genre['nama_genre']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Penulis:</label>
        <input type="text" name="penulis"
               value="<?php echo isset($buku) ? $buku['penulis'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Penerbit:</label>
        <input type="text" name="penerbit"
               value="<?php echo isset($buku) ? $buku['penerbit'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
