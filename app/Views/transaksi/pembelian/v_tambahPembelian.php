<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>

<div align="center">
    <form action="/tambah-pembelian/barang" method="post">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Pembelian</b>
            </div>
            <div class="card-body">
                <div align="left">
                    <a>Atas Nama:</a>
                </div>
                <input class="form-control" type="text" name="nama" placeholder="Nama" aria-label="default input example" required>
                <br>
                <input class="btn btn-outline-primary" type="submit" value="Selanjutnya">
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>