<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>
<div align="center">

    <form action="/tambah-penjualan/barang/<?= $penjualan['id']; ?>/<?= $barang['id']; ?>" method="post">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Barang Penjualan</b>
            </div>
            <div class="card-body">
                <div align="left">
                    <a>Jumlah Barang</a>
                </div>
                <input class="form-control" type="number" name="jumlah" value="1" min="1" max="<?= $barang['stok']; ?>" aria-label="default input example" required>
                <br>
                <input class="btn btn-outline-primary" style="width: 10rem;" type="submit" value="Tambah">
            </div>
        </div>
</div>
</form>
<br>


</div>
<?= $this->endSection(); ?>