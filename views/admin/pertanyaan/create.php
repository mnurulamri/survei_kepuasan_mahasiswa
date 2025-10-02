<?php
?>
<div class="container">
    <h1 class="mt-5">Tambah Pertanyaan</h1>
    <form method="post" action="<?php echo base_url('pertanyaan/store'); ?>">
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori_id" required>
                <?php foreach ($kategori as $k): ?>
                <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Pertanyaan</label>
            <textarea class="form-control" name="pertanyaan" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
