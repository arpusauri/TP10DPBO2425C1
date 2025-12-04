<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">
    <?php echo isset($anggota) ? 'Edit Anggota' : 'Add Anggota'; ?>
</h2>

<form action="index.php?entity=anggota&action=<?php 
        echo isset($anggota) ? 'update&id=' . $anggota['id_anggota'] : 'save'; 
    ?>" 
    method="POST" class="space-y-4">

    <div>
        <label class="block">Nama:</label>
        <input type="text" name="nama" 
               value="<?php echo isset($anggota) ? $anggota['nama_anggota'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">No HP:</label>
        <input type="text" name="no_hp" 
               value="<?php echo isset($anggota) ? $anggota['no_hp'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
