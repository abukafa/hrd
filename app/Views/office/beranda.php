<?php
$this->extend('layout/template');
$this->section('content');
?>

<!-- DataTables -->
<link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Beranda</h4>
        </div>
    </div>
</div>

<?php
$perSan = (!$accSantri) ? 0 : $accSantri / $jumlahSantri * 100;
$perAbs = (!$accAbsensi) ? 0 : $accAbsensi / $jumlahAbsensi * 100;
$perTun = (!$accTunjangan) ? 0 : $accTunjangan / $jumlahTunjangan * 100;
$perPot = (!$accPotongan) ? 0 : $accPotongan / $jumlahPotongan * 100;
?>

<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-account-check"></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10">
                            <h5 class="mt-0 d-xl-none round-inner"><?= $jumlahSantri ?></h5>
                            <p class="mb-0 d-xl-none text-muted">Data Pengurus</p>
                        </div>
                    </div>
                    <div class="col-3 align-self-end align-self-center">
                        <h6 class="m-0 float-right text-center text-<?= $perSan == 100 ? 'success' : 'danger' ?>">
                            <i class="mdi mdi-arrow-<?= $perSan == 100 ? 'up' : 'down' ?>"></i><br>
                            <span><?= number_format($perSan, 0, '.', ',') ?>%</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-fingerprint"></i>
                        </div>
                    </div>
                    <div class="col-6 text-center align-self-center">
                        <div class="m-l-10 ">
                            <h5 class="mt-0 d-xl-none round-inner"><?= $jumlahAbsensi ?></h5>
                            <p class="mb-0 d-xl-none text-muted">Data Absensi</p>
                        </div>
                    </div>
                    <div class="col-3 align-self-end align-self-center">
                        <h6 class="m-0 float-right text-center text-<?= $perAbs == 100 ? 'success' : 'danger' ?>">
                            <i class="mdi mdi-arrow-<?= $perAbs == 100 ? 'up' : 'down' ?>"></i><br>
                            <span><?= number_format($perAbs, 0, '.', ',') ?>%</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round ">
                            <i class="mdi mdi-basket"></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10 ">
                            <h5 class="mt-0 d-xl-none round-inner"><?= $jumlahTunjangan ?></h5>
                            <p class="mb-0 d-xl-none text-muted">Data Tunjangan</p>
                        </div>
                    </div>
                    <div class="col-3 align-self-end align-self-center">
                        <h6 class="m-0 float-right text-center text-<?= $perTun == 100 ? 'success' : 'danger' ?>">
                            <i class="mdi mdi-arrow-<?= $perTun == 100 ? 'up' : 'down' ?>"></i><br>
                            <span><?= number_format($perTun, 0, '.', ',') ?>%</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-coin"></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10">
                            <h5 class="mt-0 d-xl-none round-inner"><?= $jumlahPotongan ?></h5>
                            <p class="mb-0 d-xl-none text-muted">Data Potongan</p>
                        </div>
                    </div>
                    <div class="col-3 align-self-end align-self-center">
                        <h6 class="m-0 float-right text-center text-<?= $perPot == 100 ? 'success' : 'danger' ?>">
                            <i class="mdi mdi-arrow-<?= $perPot == 100 ? 'up' : 'down' ?>"></i><br>
                            <span><?= number_format($perPot, 0, '.', ',') ?>%</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-8">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3 mt-0">Remunerasi</h5>
                <div id="single-bar-chart" style="height:400px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">
                <!-- <a href="" class="btn btn-primary btn-sm float-right">More Info</a> -->
                <h5 class="header-title mt-0 pb-5">Laznah</h5>

                <div id="morris-donut-chart" style="height:368px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card bg-white m-b-30">
            <div class="card-body new-user">

                <div class="row text-center">
                    <div class="col-12">
                        <h5><i class="mdi mdi-database mr-2 text-primary font-20"></i> 85%</h5>
                        <h6 class="text-lightdark">Capaian Budaya Kerja</h6>
                        <span class="text-muted"> <small>June 2018</small></span>
                    </div>
                </div>
                <div id="morris-area-chart" style="height: 310px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card bg-white m-b-30">
            <div class="card-body new-user">

                <div class="row text-center">
                    <div class="<?= ($kompetensiJenis[0]) ? 'col-6' : 'd-none' ?>">
                        <h5><i class="mdi mdi-upload mr-2 text-primary font-20"></i><?= $kompetensiJenis[0]['count'] ?></h5>
                        <h6 class="text-lightdark"><?= $kompetensiJenis[0]['jenis'] ?></h6>
                        <span class="text-muted"> <small><?= date('Y') ?></small></span>
                    </div>
                    <div class="<?= ($kompetensiJenis[1]) ? 'col-6' : 'd-none' ?>">
                        <h5><i class="mdi mdi-download mr-2 text-success font-20"></i><?= $kompetensiJenis[1]['count'] ?></h5>
                        <h6 class="text-lightdark"><?= $kompetensiJenis[1]['jenis'] ?></h6>
                        <span class="text-muted"> <small><?= date('Y') ?></small></span>
                    </div>
                </div>
                <div id="morris-diklat-chart" style="height: 310px"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3 mt-0">Kehadiran</h5>
                <div id="multi-bar-chart" style="height:400px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 align-self-center">
        <div class="card bg-white m-b-30">
            <div class="card-body new-user">
                <h5 class="header-title mb-4 mt-0">Santri Pengurus</h5>
                <div class="table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th class="border-top-0" style="width:60px;"></th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0 d-none d-xl-table-cell">Jabatan</th>
                                <th class="border-top-0 d-none d-xl-table-cell">Laznah</th>
                                <th class="border-top-0">Kompetensi</th>
                                <th class="border-top-0">Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($santri as $row) : ?>
                                <tr>
                                    <td>
                                        <img src="<?= uploaded($row['nip'] . '.png', '/assets/images/pengurus') ?>" class="img-fluid rounded-circle mb-2" id="imgPreview" width="128" height="128" />
                                    </td>
                                    <td><?= $row['nama'] ?></td>
                                    <td class=" d-none d-xl-table-cell"><?= $row['jabatan'] ?></td>
                                    <td class=" d-none d-xl-table-cell"><?= $row['laznah'] ?></td>
                                    <td>
                                        <?php foreach ($kompetensi as $kom) :
                                            if ($kom['nip'] == $row['nip']) { ?>
                                                <i class="mdi mdi-star text-warning"></i>
                                        <?php }
                                        endforeach ?>
                                    </td>
                                    </td>
                                    <td>
                                        <?php foreach ($absensi as $abs) :
                                            if ($abs['nip'] == $row['nip']) { ?>
                                                <div class="progress" style="height:8px;">
                                                    <div class="progress-bar bg-<?= $abs['total'] <= 0.5 ? 'danger' : 'primary' ?>" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?= $abs['total'] * 100 ?>%;"></div>
                                                </div>
                                        <?php }
                                        endforeach ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    ! function($) {
        "use strict";

        var Dashboard = function() {};

        //creates Bar chart
        Dashboard.prototype.createBarChart = function(element, data, xkey, ykeys, labels, barColors) {
                Morris.Bar({
                    element: element,
                    data: data,
                    xkey: xkey,
                    ykeys: ykeys,
                    labels: labels,
                    hideHover: 'auto',
                    gridBarColor: '#eef0f2',
                    resize: true, //defaulted to true
                    barColors: barColors
                });
            },

            //creates area chart
            Dashboard.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
                Morris.Area({
                    element: element,
                    pointSize: 3,
                    lineWidth: 2,
                    data: data,
                    xkey: xkey,
                    ykeys: ykeys,
                    labels: labels,
                    resize: true,
                    hideHover: 'auto',
                    gridLineColor: '#eef0f2',
                    lineColors: lineColors,
                    lineWidth: 0,
                    fillOpacity: 0.1,
                    xLabelMargin: 10,
                    yLabelMargin: 10,
                    grid: false,
                    axes: false,
                    pointSize: 0
                });
            },

            //creates Donut chart
            Dashboard.prototype.createDonutChart = function(element, data, colors) {
                Morris.Donut({
                    element: element,
                    data: data,
                    resize: true,
                    colors: colors
                });
            },

            Dashboard.prototype.init = function() {

                //create Bar chart
                var $data = [{
                        y: 'Direktorat',
                        a: 2000
                    },
                    {
                        y: 'Corporate',
                        a: 15000
                    },
                    {
                        y: 'Al-Iffah',
                        a: 2000
                    },
                    {
                        y: 'AHE',
                        a: 15000
                    },
                    {
                        y: 'Triger R',
                        a: 2000
                    },
                    {
                        y: 'MPZ',
                        a: 5000
                    },
                    {
                        y: 'Pimpinan',
                        a: 1500
                    }
                ];
                this.createBarChart('single-bar-chart', $data, 'y', ['a'], ['Rp'], ['#007BFF', '#00bcd2', '#e785da']);

                //creating area chart
                var $areaData = [{
                        y: '2013',
                        a: 10,
                        b: 25
                    },
                    {
                        y: '2014',
                        a: 55,
                        b: 45
                    },
                    {
                        y: '2015',
                        a: 30,
                        b: 20
                    },
                    {
                        y: '2016',
                        a: 40,
                        b: 35
                    },
                    {
                        y: '2017',
                        a: 10,
                        b: 25
                    },
                    {
                        y: '2018',
                        a: 25,
                        b: 30
                    }
                ];
                this.createAreaChart('morris-area-chart', 0, 0, $areaData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#00c292', '#03a9f3']);

                //creating area chart
                var $areaData = [
                    <?php foreach ($kompetensiCount as $koC) :
                        echo '{
                        y: "' .  $koC['tahun'] . '",
                        a: ' . $koC['count'] . '
                    },';
                    endforeach ?>
                ];
                this.createAreaChart('morris-diklat-chart', 0, 0, $areaData, 'y', ['a'], ['Kompetensi'], ['#03a9f3']);

                //creating donut chart
                var $donutData = [
                    <?php foreach ($laznah as $laz) :
                        echo '{
                            label: "' . $laz['laznah'] . '",
                            value: ' . $laz['count'] . '
                        },';
                    endforeach ?>
                ];
                this.createDonutChart('morris-donut-chart', $donutData, ['#40a4f1', '#5b6be8', '#c1c5e2']);

                //create Bar chart
                var $data = [
                    <?php foreach ($laznah as $l) :
                        echo '{
                            y: "' . $l['laznah'] . '",
                            a: ' . $l['sakit'] . ',
                            b: ' . $l['ijin'] . ',
                            c: ' . $l['alpa'] . '
                        },';
                    endforeach ?>
                ];
                this.createBarChart('multi-bar-chart', $data, 'y', ['a', 'b', 'c'], ['Sakit', 'Izin', 'Alpa'], ['#007BFF', '#00bcd2', '#e785da']);

            },
            //init
            $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
    }(window.jQuery),

    //initializing 
    function($) {
        "use strict";
        $.Dashboard.init();
    }(window.jQuery);
</script>

<?php $this->endSection(); ?>