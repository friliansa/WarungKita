<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>


<div align="center">
    <a class="navbar-brand brand-logo fs-3" style="color: #27367F;">
        Warung<b>Kita</b>
    </a>
    <br>
    <a>
        Jl. Imam Bonjol No.10, Rajabasa<br>Bandar Lampung
    </a>
    <br>
    <a>
        <b>
            Kode Transaksi:
        </b><?= $detail[0]['kode_transaksi']; ?></b>
    </a>
</div>
<table class="table table-hover">
    <thead>

        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $total = 0; ?>
        <?php foreach ($detail as $detail) : ?>
            <tr>
                <td><?php echo $i;
                    $i++; ?>
                </td>
                <td><?= $detail['kode_barang']; ?></td>
                <td><?= $detail['nama']; ?></td>
                <td><?= $detail['jumlah']; ?></td>
                <td>
                    Rp <?= $detail['harga']; ?>
                </td>
                <td>
                    Rp <?= $detail['harga'] * $detail['jumlah'];
                        $total = $total + $detail['harga'] * $detail['jumlah'] ?>
                </td>

            </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="5">Total Pembelian</td>
            <td>Rp <?= $total; ?></td>
        </tr>
    </tbody>
</table>
<div align="center">
    <a href="/pembelian">
        <button type="button" class="btn btn-outline-primary">
            Kembali
        </button>
    </a>
</div>

<?= $this->endSection(); ?>