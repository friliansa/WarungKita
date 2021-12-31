<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>
<div align="center">
    <div class="card" style="width: 25rem;">
        <div class="card-header">
            <b>Informasi Barang Baru</b>
        </div>
        <div class="card-body">
            <div align="left">
                <b>Kode Barang:</b>
                <br>
                <div class="card">
                    <div class="card-body">
                        <?= $newBarang['id']; ?>
                    </div>
                </div>
                <b>Nama Barang:</b>
                <br>
                <div class="card">
                    <div class="card-body">
                        <?= $newBarang['nama']; ?>
                    </div>
                </div>
                <b>Harga beli:</b>
                <br>
                <div class="card">
                    <div class="card-body">
                        <?= $newBarang['beli']; ?>
                    </div>
                </div>
                <b>Harga Jual:</b>
                <br>
                <div class="card">
                    <div class="card-body">
                        <?= $newBarang['jual']; ?>
                    </div>
                </div>
                <br>
                <div align="center">

                    <a href="/tambah-pembelian/barang/<?= $id; ?>">
                        <button type="button" class="btn btn-outline-primary">OK</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>