<?= $this->extend('layouts/detail'); ?>

<?= $this->section('content'); ?>

<div align="center">
    <div class="card" style="width: 25rem;">
        <div class="card-header">
            <b>Total Pembelian</b>
        </div>
        <div class="card-body">
            <h1>Rp <?= $pembelian['total']; ?></h1>
            <a href="/pembelian">
                <button type="button" class="btn btn-outline-primary" style="width: 10rem;">
                    Selesai
                </button>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>