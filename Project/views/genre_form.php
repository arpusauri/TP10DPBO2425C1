<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">
    <?php echo isset($genre) ? 'Edit Genre' : 'Add Genre'; ?>
</h2>

<form action="index.php?entity=genre&action=<?php 
        echo isset($genre) ? 'update&id=' . $genre['id_genre'] : 'save'; 
    ?>" 
    method="POST" class="space-y-4">

    <div>
        <label class="block">Nama Genre:</label>
        <input type="text" name="nama_genre"
               value="<?php echo isset($genre) ? $genre['nama_genre'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
