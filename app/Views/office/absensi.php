<?php
$this->extend('layout/template');
$this->section('content');
?>

<!-- DataTables -->
<link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Absensi <?= $bulan ?></h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="btn-group ml-3" role="group" aria-label="Basic example">
                    <a href="/absensi/<?= date('M-Y', strtotime($bulan . '-1 month')) ?>" type="button" class="btn btn-primary"><i class="mdi mdi-skip-previous"></i> Prev</a>
                    <a href="/absensi" type="button" class="btn btn-primary"><i class="mdi mdi-calendar"></i></a>
                    <a href="/absensi/<?= date('M-Y', strtotime($bulan . '+1 month')) ?>" type="button" class="btn btn-primary">Next <i class="mdi mdi-skip-next"></i></a>
                </div>
                <a href="" type="button" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3 inputAbsensi" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
                <div class="btn-group float-right mr-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-animation="bounce" data-target=".myModalImport"><i class="mdi mdi-file-excel-box"></i> Excel</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/absensi/export">Export to xls</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="" data-toggle="modal" data-animation="bounce" data-target=".myModalImport">Import from xls</a>
                        <a class="dropdown-item" href="<?= base_url('/assets/images/default/sample-absensi.xlsx') ?>">Download Sample</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">No</th>
                            <th>Nama</th>
                            <th>Bulan</th>
                            <th class="d-none d-xl-table-cell text-center">Sakit</th>
                            <th class="d-none d-xl-table-cell text-center">Izin</th>
                            <th class="d-none d-xl-table-cell text-center">Alpa</th>
                            <th class="d-none d-xl-table-cell text-center">Hadir</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">ACC</th>
                            <th class="d-none d-lg-table-cell text-center">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($absensi as $row) : ?>
                            <tr>
                                <td class="d-none d-xl-table-cell"><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="text-center"><?= $row['bulan'] ?></td>
                                <td class="text-center"><?= $row['sakit'] ?></td>
                                <td class="text-center"><?= $row['ijin'] ?></td>
                                <td class="text-center"><?= $row['alpa'] ?></td>
                                <td class="d-none d-xl-table-cell text-center"><?= number_format($row['hadir'], 0, '.', ',') ?></td>
                                <td class="text-center"><strong><?= number_format($row['total'], 2, '.', ',') * 100 ?> %</strong></td>
                                <td class="text-center">
                                    <input type="checkbox" style="width: 24px; height: 24px; font-size: 15px;" <?= ($row['acc']) ? 'checked' : '' ?> onclick="acc(<?= $row['id'] ?>)">
                                </td>
                                <td class="d-none d-lg-table-cell text-center">
                                    <button class="btn btn-success editAbsensi" data-id="<?= $row['id'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-lead-pencil"></i></button>
                                    <form action="/absensi/<?= $row['id'] . '/' . $row['bulan'] ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="button" class="btn btn-danger delete-<?= $row['id'] ?>"><i class="mdi mdi-delete-sweep"></i></button>
                                    </form>
                                    <script>
                                        $('.delete-<?= $row['id'] ?>').click(function() {
                                            swal({
                                                title: 'Anda yakin?',
                                                text: "Data tidak bisa dikembalikan!",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonClass: 'btn btn-success',
                                                cancelButtonClass: 'btn btn-danger m-l-10',
                                                confirmButtonText: 'Hapus!'
                                            }).then(function() {
                                                $('#delete-<?= $row['id'] ?>').submit();
                                            })
                                        });
                                    </script>
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
                <h5 class="modal-title" id="formLabel">Tambah absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Bulan</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="bulan" id="bulan">
                                <option><?= date('M-Y') ?></option>
                                <option><?= date('M-Y', strtotime('-1 month')) ?></option>
                                <option><?= date('M-Y', strtotime('-2 month')) ?></option>
                            </select>
                            <input type="text" class="form-control" placeholder="Jumlah hari efektif" name="hari" id="hari" onkeyup="hitungHadir()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pengurus</label>
                        <div id="p-select">
                            <select class="form-control select2" style="width: 100%; height:100%;" onchange="selectSantri(this.value)" id="santri">
                                <option>Select</option>
                                <?php foreach ($laznah as $l) : ?>
                                    <optgroup label="<?= $l['laznah'] ?>">
                                        <?php foreach ($santri as $san) : ?>
                                            <?php if ($san['laznah'] == $l['laznah']) { ?>
                                                <option value="<?= $san['id'] ?>"><?= $san['nip'] . ' - ' . $san['nama'] ?></option>
                                            <?php } ?>
                                        <?php endforeach ?>
                                    </optgroup>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="input-group" id="p-input">
                            <input type="text" class="form-control" placeholder="NIP Pengurus" name="nip" id="nip" readonly>
                            <input type="text" class="form-control" placeholder="Nama Pengurus" name="nama" id="nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Sakit</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" name="sakit" id="sakit" onkeyup="hitungHadir()">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Izin</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" name="ijin" id="ijin" onkeyup="hitungHadir()">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Alpa</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" name="alpa" id="alpa" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kehadiran</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="hadir" id="hadir" onkeyup="hitungHadir()">
                            <input type="text" class="form-control text-right" name="p_hadir" id="p_hadir" style="max-width:40%;" readonly>
                            <input type="text" class="form-control text-center" style="max-width:10%;" value="%" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Terlambat</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="lambat" id="lambat" onkeyup="hitungHadir()">
                            <input type="text" class="form-control text-right" name="p_lambat" id="p_lambat" style="max-width:40%;" readonly>
                            <input type="text" class="form-control text-center" style="max-width:10%;" value="%" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lembur</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="lembur" id="lembur" onkeyup="hitungHadir()">
                            <input type="text" class="form-control text-right" name="p_lembur" id="p_lembur" style="max-width:40%;" readonly>
                            <input type="text" class="form-control text-center" style="max-width:10%;" value="%" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="total" id="total" readonly>
                            <input type="text" class="form-control text-right" name="p_total" id="p_total" style="max-width:40%;" readonly>
                            <input type="text" class="form-control text-center" style="max-width:10%;" value="%" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submitButton">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade myModalImport" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Import Data From Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/absensi/import" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class='mb-3'>
                        <label class='form-label' for='file'>Pilih File Excel</label>
                        <input type='file' class='form-control p-1' name='file' id='file' accept='.xlsx'>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary waves-effect waves-light submitButton">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Form Advance -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(".select2").select2({
        width: '100%'
    });
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function selectSantri(id) {
        $.ajax({
            url: '/absensi/santri/' + id,
            dataType: "json",
            success: function(data) {
                $('#nip').val(data.santri.nip);
                $('#nama').val(data.santri.nama);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert("Tidak dapat melakukan Proses!")
                // alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }

    $('.inputAbsensi').on('click', function() {
        $('#formLabel').html('Input Data <b>Absensi</b>');
        $('.submitButton').html('Tambah');
        $('.modal-body form').attr('action', '/absensi/baru');
        $('#bulan').val('');
        $('#hari').val('');
        $('#p-select').attr('class', 'd-block');
        $('#p-input').attr('class', 'd-none');
        $('#sakit').val('');
        $('#ijin').val('');
        $('#alpa').val('');
        $('#hadir').val('');
        $('#p_hadir').val('');
        $('#lambat').val('');
        $('#p_lambat').val('');
        $('#lembur').val('');
        $('#p_lembur').val('');
        $('#total').val('');
        $('#p_total').val('');
    });

    $('.editAbsensi').on('click', function() {
        const id = $(this).data('id');
        $('#formLabel').html('Edit Data <b>Absensi</b>');
        $('.submitButton').html('Ubah');
        $('.modal-body form').attr('action', '/absensi/' + id);
        $.ajax({
            url: '/absensi/data/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#bulan').val(data.absensi.bulan);
                $('#hari').val(data.absensi.hari);
                $('#p-select').attr('class', 'd-none');
                $('#p-input').attr('class', 'input-group');
                $('#nip').val(data.absensi.nip);
                $('#nama').val(data.absensi.nama);
                $('#sakit').val(data.absensi.sakit);
                $('#ijin').val(data.absensi.ijin);
                $('#alpa').val(data.absensi.alpa);
                $('#hadir').val(data.absensi.hadir);
                $('#p_hadir').val(data.absensi.p_hadir);
                $('#lambat').val(data.absensi.lambat);
                $('#p_lambat').val(data.absensi.p_lambat);
                $('#lembur').val(data.absensi.lembur);
                $('#p_lembur').val(data.absensi.p_lembur);
                $('#total').val(data.absensi.total);
                $('#p_total').val(data.absensi.p_total);
            }
        });
    });

    function hitungHadir() {
        var hr = $('#hari').val();
        var dr = $('#hadir').val();
        var bt = $('#lambat').val();
        var br = $('#lembur').val();
        var hdr = dr / hr * 100;
        var lbt = bt / hr * 10;
        var lbr = br / hr * 100;
        var tot = dr / hr - (bt / 100) + (br / hr) * 0.2;
        var ttl = tot * 100;
        $('#p_hadir').val(hdr.toFixed(2));
        $('#p_lambat').val(lbt.toFixed(2));
        $('#p_lembur').val(lbr.toFixed(2));
        $('#total').val(tot.toFixed(2));
        $('#p_total').val(ttl.toFixed(2));
        var sakit = $('#sakit').val();
        var ijin = $('#ijin').val();
        var alpa = hr - dr - sakit - ijin;
        $('#alpa').val(alpa.toFixed());
    };

    function acc(id) {
        $.ajax({
            url: '/absensi/ceklis/' + id,
            dataType: "json",
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert("Tidak dapat melakukan Proses!")
                // alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }
</script>

<?php $this->endSection(); ?>