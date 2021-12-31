<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<a href="/tambah-barang">
    <button type=" button" class="btn btn-outline-primary">Tambah Barang</button>
</a>
<div align="center">
    <a class="navbar-brand brand-logo fs-3" style="color: #27367F;">
        <h3><b>Daftar Barang Kosong</b></h3>
    </a>
</div>
<?php if ($barang == null) : ?>
    <div align="center">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                Tidak ada barang yang kosong
            </div>
        </div>
    </div>
<?php else : ?>
    <div align="right">
        <h6>*Harga terupdate</h6>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Penjualan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            <?php $beli = 0; ?>
            <?php $jual = 0; ?>
            <?php foreach ($barang as $b) : ?>
                <tr>
                    <td><?php echo $i;
                        $i++; ?></td>
                    <td><?= $b['id']; ?></td>
                    <td><?= $b['nama']; ?></td>
                    <td>
                        <?php
                        if ($b['stok'] == 0) {
                            echo "Kosong";
                        } else {
                            echo $b['stok'];
                        }
                        ?>
                    </td>
                    <td>Rp
                        <?php
                        if ($b['beli'] == 0) {
                            echo "-";
                        } else {
                            echo $b['beli'];;
                        }
                        $beli += $b['stok'] * $b['beli'];
                        ?>
                    </td>

                    <td>Rp
                        <?php
                        if ($b['jual'] == 0) {
                            echo "-";
                        } else {
                            echo $b['jual'];;
                        }

                        $jual += $b['stok'] * $b['jual'];
                        ?>
                    </td>
                    <td><?= $b['terjual']; ?> Buah</td>
                    <td>
                        <a href="/barang/<?= $status; ?>/edit/<?= $b['id']; ?>">
                            <button type="button" href="/barang/edit/<?= $b['id']; ?>" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </button>
                        </a>
                        <a href="/barang/delete/<?= $b['id']; ?>">
                            <button type="button" href="/barang/edit/<?= $b['id']; ?>" class="btn btn-outline-danger">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
        </div>

    </table>
<?php endif; ?>
<?= $this->endSection(); ?>