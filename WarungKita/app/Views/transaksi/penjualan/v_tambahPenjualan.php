<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>
<?php if ($barang == null) : ?>
    <div align="center">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Maaf</b>
            </div>
            <div class="card-body">
                Tidak ada barang yang tersedia
                <br><br>
                <a href="/penjualan">
                    <button type="button" class="btn btn-outline-primary">Kembali</button>
                </a>
            </div>
        </div>
    </div>
<?php else : ?>

    <div align="center">
        <form action="/tambah-penjualan/barang" method="post">
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    <b>Penjualan</b>
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
<?php endif; ?>
<?= $this->endSection(); ?>