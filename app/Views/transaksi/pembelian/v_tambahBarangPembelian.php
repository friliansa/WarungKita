<?= $this->extend('layouts/detail'); ?>
<?= $this->section('content'); ?>

<div align="center">
    <form action="/tambah-pembelian/barang/<?= $pembelian['id']; ?>" method="post">
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                <b>Barang Pembelian</b>
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
                <div align="left">
                    <a>Jumlah</a>
                </div>
                <input class="form-control" type="number" min="1" name="jumlah" placeholder="Jumlah Barang" required>
                <div align="left">
                    <a>Harga Beli</a>
                </div>
                <input class="form-control" type="number" min="1" name="beli" placeholder="Harga Beli" required>
                <div align="left">
                    <a>Barang tidak tersedia?,</a>
                    <a href="/tambah-barang/<?= $pembelian['id']; ?>"> Klik disini</a>
                </div>
                <br>
                <input class="btn btn-outline-primary" style="width: 10rem;" type="submit" value="Tambah">
            </div>
        </div>
    </form>
    <br>
    <a href="/pembelian-total/<?= $pembelian['id']; ?>">
        <button type="button" class="btn btn-outline-primary" style="width: 10rem;">
            Selesai
        </button>
    </a>
</div>
<?= $this->endSection(); ?>