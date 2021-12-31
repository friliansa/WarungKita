<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="col-lg-12 d-flex flex-column">
    <div class="row flex-grow">
        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Peforma Penjualan</h4>
                            <h5 class="card-subtitle card-subtitle-dash">Jumlah nilai penjualan tiap harinya</h5>
                        </div>
                        <div id="performance-line-legend"></div>
                    </div>
                    <div class="chartjs-wrapper mt-5">
                        <canvas id="performaneLine"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 d-flex flex-column">
    <div class="row flex-grow">
        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Peforma Penjualan</h4>
                            <h5 class="card-subtitle card-subtitle-dash">Laba penjualan tiap harinya</h5>
                        </div>
                        <div id="laba-legend"></div>
                    </div>
                    <div class="chartjs-wrapper mt-5">
                        <canvas id="laba"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 d-flex flex-column ">
        <div class="row flex-grow">
            <div class="col-12 col-lg-4 col-lg-12 grid-margin  stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Banyak pembeli</h4>
                                <h5 class="card-subtitle card-subtitle-dash">Jumlah pembeli yang melakukan pembelian</h5>
                            </div>
                            <div id="marketing-overview-legend"></div>
                        </div>
                        <div>
                            <canvas class="my-auto mt-5" height="300" id="pembeli"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex flex-column">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title card-title-dash">Penjualan terbanyak</h4>
                                        <h5 class="card-subtitle card-subtitle-dash">Menampilkan maximal 5 barang dengan penjualan terbesar</h5>
                                    </div>
                                </div>
                                <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?= $this->endSection(); ?>