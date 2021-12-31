<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>
<div align="center">
    <form action="/tambah-barang/save" method="post">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Tambah Barang</b>
            </div>
            <div class="card-body">
                <div align="left">
                    <a>Nama Barang:</a>
                </div>
                <input class="form-control" type="text" name="nama" aria-label="default input example" required>
                <br>
                <div align="left">
                    <a>Harga Beli:</a>
                </div>
                <input class="form-control" type="number" name="beli" min="1" aria-label="default input example" required>
                <br>
                <div align="left">
                    <a>Harga Jual:</a>
                </div>
                <input class="form-control" type="number" name="jual" min="1" aria-label="default input example" required>
                <br>
                <input class="btn btn-outline-primary" type="submit" value="Simpan">
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>