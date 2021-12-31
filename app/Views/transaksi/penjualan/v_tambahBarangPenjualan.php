<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>

<?php if ($barang == null) : ?>
    <div align="center">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Maaf</b>
            </div>
            <div class="card-body">
                Maaf seluruh barang HABIS
                <br><br>
                <a href="/penjualan/total/<?= $penjualan['total']; ?>">
                    <button type="button" class="btn btn-outline-primary" style="width: 10rem;">
                        Selesai
                    </button>
                </a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div align="center">
        <form action="/tambah-penjualan/barang/<?= $penjualan['id']; ?>" method="post">
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    <b>Barang Penjualan</b>
                </div>
                <div class="card-body">
                    <div align="left">
                        <a>Barang</a>
                    </div>
                    <select class="form-control" name="kode" required>
                        <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b['id']; ?>"><?= $b['id']; ?> - <?= $b['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <input class="btn btn-outline-primary" style="width: 10rem;" type="submit" value="Selanjutnya">
                </div>
            </div>
        </form>
        <br>
        <a href="/penjualan/total/<?= $penjualan['total']; ?>">
            <button type="button" class="btn btn-outline-primary" style="width: 10rem;">
                <?php
                if ($penjualan['total'] == 0) {
                    echo "Batal";
                } else {
                    echo "Selesai";
                }
                ?>

            </button>
        </a>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>