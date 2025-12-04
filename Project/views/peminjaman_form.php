<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">
    <?php echo isset($peminjaman) ? 'Edit Peminjaman' : 'Add Peminjaman'; ?>
</h2>

<form action="index.php?entity=peminjaman&action=<?php
echo isset($peminjaman) ? 'update&id=' . $peminjaman['id_peminjaman'] : 'save';
?>" 
    method="POST" class="space-y-4">

    <div>
        <label class="block">Anggota:</label>
        <select name="id_anggota" class="border p-2 w-full" required>
            <?php foreach ($anggotaList as $a): ?>
                <option value="<?php echo $a['id_anggota']; ?>"
                    <?php echo (isset($peminjaman) && $peminjaman['id_anggota'] == $a['id_anggota']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($a['nama_anggota']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Buku:</label>
        <select name="id_buku" class="border p-2 w-full" required>
            <?php foreach ($bukuList as $b): ?>
                <option value="<?php echo $b['id_buku']; ?>"
                    <?php echo (isset($peminjaman) && $peminjaman['id_buku'] == $b['id_buku']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($b['judul']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" value="<?php echo isset($peminjaman) ? $peminjaman['tanggal_pinjam'] : ''; ?>" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" value="<?php echo isset($peminjaman) ? $peminjaman['tanggal_kembali'] : ''; ?>" class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
