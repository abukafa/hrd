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
            <h4 class="page-title">Proses Remunerasi</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <?php if ($ext['not'] <> 0) { ?>
                    <a href="/" class="ml-3 text-danger"><?= $ext['not'] ?> data Belum ACC</a>
                <?php } ?>
                <?php
                $selisih = 0;
                $absen = 0;
                $exist = 0;
                foreach ($remun as $val) :
                    if ($val['selisih'] <> 0) {
                        $selisih += 1;
                    }
                    if ($val['absensi'] == '') {
                        $absen += 1;
                    }
                    $exist += $val['exist'];
                    $selisih = $selisih + $exist;
                endforeach;
                if (($absen > 0) || ($selisih > 0)) { ?>
                    <a href="/" class="ml-3 text-warning"><?= ($selisih <> 0 ? $selisih . ' data Remun, ' : '') . ($absen <> 0 ? ($absen) . ' data Absensi, ' : '') ?>Belum disimpan</a>
                <?php } else if ($ext['not'] <> 0) { ?>
                    <div class="btn-group float-right mr-3">
                        <a href="javascript: w=window.open('/proses/draft/<?= $ext['bulan'] ?>'); w.print();" type="button" class="btn btn-primary waves-effect waves-light">PDF Draft</a>
                        <a href="/proses/excel/<?= $ext['bulan'] ?>" type="button" class="btn btn-primary waves-effect waves-light">Excel Draft</a>
                    </div>
                <?php } else { ?>
                    <div class="btn-group float-right mr-3">
                        <a href="javascript: w=window.open('rekap/<?= $ext['bulan'] ?>'); w.print();" type="button" class="btn btn-primary waves-effect waves-light">Rekap</a>
                        <a href="javascript: w=window.open('slip/<?= $ext['bulan'] ?>'); w.print();" type="button" class="btn btn-primary waves-effect waves-light">Slip</a>
                        <button class="btn btn-primary">
                            <i class="mdi mdi-printer"></i>
                        </button>
                    </div>
                <?php } ?>
            </div>
            <div class="card-body">

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="d-none d-xxl-table-cell text-center">Laznah</th>
                            <th class="d-none d-xxl-table-cell text-center">Lama</th>
                            <th class="d-none d-xxl-table-cell text-center">Grade</th>
                            <th class="d-none d-xl-table-cell text-center">Absensi</th>
                            <th class="d-none d-xl-table-cell text-center">Honor</th>
                            <th class="d-none d-xl-table-cell text-center">Makan</th>
                            <th class="d-none d-xl-table-cell text-center">Transport</th>
                            <th class="d-none d-xl-table-cell text-center">Tunjangan</th>
                            <th class="d-none d-xl-table-cell text-center">Potongan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($remun as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="d-none d-xxl-table-cell text-right"><?= $row['laznah'] ?></td>
                                <td class="d-none d-xxl-table-cell text-right"><?= $row['lama'] ?></td>
                                <td class="d-none d-xxl-table-cell text-right"><?= $row['grade'] ?></td>
                                <td class="d-none d-xl-table-cell text-center"><?= $row['absensi'] ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['honor'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['makan'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['transport'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['tunjangan'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['potongan'], 0, '.', ',') ?></td>
                                <td class="text-right"><strong><?= number_format($row['total'], 0, '.', ',') ?></strong></td>
                                <td class="text-center" id="myBtn<?= preg_replace('/[^0-9]/', '', $row['nip']) ?>">
                                    <?php
                                    if ($row['absensi'] <> '') {
                                        if (!$row['exist'] && $row['selisih'] == 0) { ?>
                                            <button class="btn btn-success viewData" data-bln="<?= $ext['bulan'] ?>" data-nip="<?= $row['nip'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-eye"></i></button>
                                        <?php } else { ?>
                                            <button class="btn btn-warning saveData" data-bln="<?= $ext['bulan'] ?>" data-nip="<?= $row['nip'] ?>"><i class="mdi mdi-content-save"></i></button>
                                    <?php }
                                    } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="modal fade myModalForm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Rincian Remunerasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row">
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='nip'>NIP</label>
                        <input type='text' class='form-control' id='nip' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='bulan'>Bulan</label>
                        <input type='text' class='form-control' id='bulan' readonly>
                    </div>
                    <div class='col-12 mb-2'>
                        <label class='form-label' for='nama'>Nama</label>
                        <input type='text' class='form-control' id='nama' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='honor'>honor</label>
                        <input type='number' class='form-control' id='honor' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='makan'>makan</label>
                        <input type='number' class='form-control' id='makan' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='transport'>transport</label>
                        <input type='number' class='form-control' id='transport' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_jab'>Tnj. Jabatan</label>
                        <input type='number' class='form-control' id='t_jab' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_stt'>Tnj. Status</label>
                        <input type='number' class='form-control' id='t_stt' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_ank'>Tnj. Anak</label>
                        <input type='number' class='form-control' id='t_ank' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_rmh'>Tnj. Rumah</label>
                        <input type='number' class='form-control' id='t_rmh' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_prg'>Tnj. Program</label>
                        <input type='number' class='form-control' id='t_prg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_srg'>Tnj. Seragam</label>
                        <input type='number' class='form-control' id='t_srg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_atr'>Tnj. Atribut</label>
                        <input type='number' class='form-control' id='t_atr' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_kes'>Tnj. Kesehatan</label>
                        <input type='number' class='form-control' id='t_kes' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_hra'>Tnj. Hari Raya</label>
                        <input type='number' class='form-control' id='t_hra' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_haj'>Tnj. Haji</label>
                        <input type='number' class='form-control' id='t_haj' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_dka'>Tnj. Duka</label>
                        <input type='number' class='form-control' id='t_dka' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_bns'>Tnj. Bonus</label>
                        <input type='number' class='form-control' id='t_bns' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_spc'>Tnj. Spesial</label>
                        <input type='number' class='form-control' id='t_spc' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_eks'>Tnj. Eksekutif</label>
                        <input type='number' class='form-control' id='t_eks' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_srg'>Pot. Seragam</label>
                        <input type='number' class='form-control' id='p_srg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_atr'>Pot. Atribut</label>
                        <input type='number' class='form-control' id='p_atr' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_kes'>Pot. Kesehatan</label>
                        <input type='number' class='form-control' id='p_kes' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_rmh'>Pot. Rumah</label>
                        <input type='number' class='form-control' id='p_rmh' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_bon'>Pot. Kasbon</label>
                        <input type='number' class='form-control' id='p_bon' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_htg'>Pot. Hutang</label>
                        <input type='number' class='form-control' id='p_htg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_zkt'>Pot. Zakat</label>
                        <input type='number' class='form-control' id='p_zkt' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_inf'>Pot. Infaq</label>
                        <input type='number' class='form-control' id='p_inf' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_lin'>Pot. Lain</label>
                        <input type='number' class='form-control' id='p_lin' readonly>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#datatable').DataTable();
    // });
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

    $('.saveData').on('click', function() {
        const bln = $(this).data('bln');
        const nip = $(this).data('nip');
        const regNip = nip.replace(/[^0-9]/g, '');
        $.ajax({
            url: '/proses/simpan/' + nip + '/' + bln,
            data: {
                bln: bln,
                nip: nip
            },
            method: 'post',
            success: function(data) {
                $('#myBtn' + regNip).html(data);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert("Data gagal disimpan! Periksa kembali data : " + nip)
                // alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    });

    $('.viewData').on('click', function() {
        const bln = $(this).data('bln');
        const nip = $(this).data('nip');
        $.ajax({
            url: '/proses/data/' + nip + '/' + bln,
            data: {
                bln: bln,
                nip: nip
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#nip').val(data.nip);
                $('#nama').val(data.nama);
                $('#bulan').val(data.bulan);
                $('#honor').val(data.honor);
                $('#makan').val(data.makan);
                $('#transport').val(data.transport);
                $('#t_jab').val(data.t_jab);
                $('#t_stt').val(data.t_stt);
                $('#t_ank').val(data.t_ank);
                $('#t_prg').val(data.t_prg);
                $('#t_kes').val(data.t_kes);
                $('#t_rmh').val(data.t_rmh);
                $('#t_srg').val(data.t_srg);
                $('#t_atr').val(data.t_atr);
                $('#t_hra').val(data.t_hra);
                $('#t_haj').val(data.t_haj);
                $('#t_dka').val(data.t_dka);
                $('#t_bns').val(data.t_bns);
                $('#t_spc').val(data.t_spc);
                $('#t_eks').val(data.t_eks);
                $('#p_srg').val(data.p_srg);
                $('#p_atr').val(data.p_atr);
                $('#p_kes').val(data.p_kes);
                $('#p_rmh').val(data.p_rmh);
                $('#p_bon').val(data.p_bon);
                $('#p_htg').val(data.p_htg);
                $('#p_zkt').val(data.p_zkt);
                $('#p_inf').val(data.p_inf);
                $('#p_lin').val(data.p_lin);
            }
        });
    });
</script>

<?php $this->endSection(); ?>