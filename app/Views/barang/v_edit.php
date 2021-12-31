<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>
<div align="center">
    <form action="/barang/<?= $status; ?>/update/<?= $barang['id']; ?>" method="post">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Edit Barang</b>
            </div>
            <div class="card-body">
                <div align="left">
                    <a>Nama Barang:</a>
                </div>
                <input class="form-control" type="text" name="nama" value="<?= $barang['nama']; ?>" aria-label="default input example">
                <br>
                <div align="left">
                    <a>Stok Barang:</a>
                </div>
                <input class="form-control" type="number" min="0" max="<?= $barang['stok']; ?>" name="stok" value="<?= $barang['stok']; ?>" aria-label="default input example">
                <br>
                <div align="left">
                    <a>Harga Beli:</a>
                </div>
                <input class="form-control" type="number" min="1" name="beli" value="<?= $barang['beli']; ?>" aria-label="default input example">
                <br>
                <div align="left">
                    <a>Harga Jual:</a>
                </div>
                <input class="form-control" type="number" min="1" name="jual" value="<?= $barang['jual']; ?>" aria-label="default input example">
                <br>
                <input class="btn btn-outline-primary" type="submit" value="Simpan">
            </div>
        </div>
    </form>
</div>
<br><br>
<?= $this->endSection(); ?>