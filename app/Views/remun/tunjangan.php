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
            <h4 class="page-title">Data Tunjangan</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <a href="" type="button" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3 inputTunjangan" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="d-none d-xl-table-cell text-center">T.JAB</th>
                            <th class="d-none d-xl-table-cell text-center">T.STT</th>
                            <th class="d-none d-xl-table-cell text-center">T.ANK</th>
                            <th class="d-none d-xl-table-cell text-center">T.PRG</th>
                            <th class="d-none d-xl-table-cell text-center">Lainnya</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">ACC</th>
                            <th class="d-none d-lg-table-cell text-center">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tunjangan as $row) :
                            $lain = $row['t_srg'] + $row['t_atr'] + $row['t_kes'] + $row['t_hra'] + $row['t_haj'] + $row['t_dka'] + $row['t_bns'] + $row['t_spc'] + $row['t_eks'];
                            $jum = $lain + $row['t_jab'] + $row['t_stt'] + $row['t_ank'] + $row['t_rmh'] + $row['t_prg'];
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['t_jab'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['t_stt'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['t_ank'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['t_prg'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($lain, 0, '.', ',') ?></td>
                                <td class="text-right"><strong><?= number_format($jum, 0, '.', ',') ?></strong></td>
                                <td class="text-center">
                                    <input type="checkbox" style="width: 24px; height: 24px; font-size: 15px;" <?= ($row['acc']) ? 'checked' : '' ?> onclick="acc(<?= $row['id'] ?>)">
                                </td>
                                <td class="d-none d-lg-table-cell text-center">
                                    <button class="btn btn-success editTunjangan" data-id="<?= $row['id'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-lead-pencil"></i></button>
                                    <form action="/tunjangan/<?= $row['id']; ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
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
                <h5 class="modal-title" id="formLabel">Tambah tunjangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row" action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="col-12 mb-2">
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
                            <input type="hidden" class="form-control" placeholder="ID Pengurus" name="id" id="id" readonly>
                            <input type="text" class="form-control" placeholder="NIP Pengurus" name="nip" id="nip" readonly>
                            <input type="text" class="form-control" placeholder="Nama Pengurus" name="nama" id="nama" readonly>
                        </div>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_jab'>Tunjangan Jabatan</label>
                        <input type='number' class='form-control' name='t_jab' id='t_jab' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_stt'>Tunjangan Status</label>
                        <input type='number' class='form-control' name='t_stt' id='t_stt' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_ank'>Tunjangan Anak</label>
                        <input type='number' class='form-control' name='t_ank' id='t_ank' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_prg'>Tunjangan Program</label>
                        <input type='number' class='form-control' name='t_prg' id='t_prg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_kes'>Tunjangan Kesehatan</label>
                        <input type='number' class='form-control' name='t_kes' id='t_kes' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_rmh'>Tunjangan Rumah</label>
                        <input type='number' class='form-control' name='t_rmh' id='t_rmh' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_srg'>Tunjangan Seragam</label>
                        <input type='number' class='form-control' name='t_srg' id='t_srg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_atr'>Tunjangan Atribut</label>
                        <input type='number' class='form-control' name='t_atr' id='t_atr' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_hra'>Tunjangan Hari Raya</label>
                        <input type='number' class='form-control' name='t_hra' id='t_hra' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_haj'>Tunjangan Haji & Umroh</label>
                        <input type='number' class='form-control' name='t_haj' id='t_haj' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_dka'>Tunjangan Duka</label>
                        <input type='number' class='form-control' name='t_dka' id='t_dka' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_bns'>Tunjangan Bonus</label>
                        <input type='number' class='form-control' name='t_bns' id='t_bns' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_spc'>Tunjangan Spesial</label>
                        <input type='number' class='form-control' name='t_spc' id='t_spc' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_eks'>Tunjangan Eksekutif</label>
                        <input type='number' class='form-control' name='t_eks' id='t_eks' readonly>
                    </div>
                    <div class="col form-group mt-3">
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
            url: '/tunjangan/santri/' + id,
            dataType: "json",
            success: function(data) {
                $('#id').val(data.santri.id);
                $('#nip').val(data.santri.nip);
                $('#nama').val(data.santri.nama);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert("Tidak dapat melakukan Proses!")
                // alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }

    $('.inputTunjangan').on('click', function() {
        $('#formLabel').html('Input Data <b>Tunjangan</b>');
        $('.submitButton').html('Tambah');
        $('.modal-body form').attr('action', '/tunjangan/baru');
        $('#p-select').attr('class', 'd-block');
        $('#p-input').attr('class', 'd-none');
        $('#t_jab').val('0');
        $('#t_stt').val('0');
        $('#t_ank').val('0');
        $('#t_prg').val('0');
        $('#t_kes').val('0');
        $('#t_kes').attr('readonly', 'true');
        $('#t_rmh').val('0');
        $('#t_rmh').attr('readonly', 'true');
        $('#t_srg').val('0');
        $('#t_srg').attr('readonly', 'true');
        $('#t_atr').val('0');
        $('#t_atr').attr('readonly', 'true');
        $('#t_hra').val('0');
        $('#t_hra').attr('readonly', 'true');
        $('#t_haj').val('0');
        $('#t_haj').attr('readonly', 'true');
        $('#t_dka').val('0');
        $('#t_dka').attr('readonly', 'true');
        $('#t_bns').val('0');
        $('#t_bns').attr('readonly', 'true');
        $('#t_spc').val('0');
        $('#t_spc').attr('readonly', 'true');
        $('#t_eks').val('0');
        $('#t_eks').attr('readonly', 'true');
    });

    $('.editTunjangan').on('click', function() {
        const id = $(this).data('id');
        $('#formLabel').html('Edit Data <b>Tunjangan</b>');
        $('.submitButton').html('Ubah');
        $('.modal-body form').attr('action', '/tunjangan/' + id);
        $.ajax({
            url: '/tunjangan/data/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#p-select').attr('class', 'd-none');
                $('#p-input').attr('class', 'input-group');
                $('#nip').val(data.tunjangan.nip);
                $('#nama').val(data.tunjangan.nama);
                $('#t_jab').val(data.tunjangan.t_jab);
                $('#t_stt').val(data.tunjangan.t_stt);
                $('#t_ank').val(data.tunjangan.t_ank);
                $('#t_prg').val(data.tunjangan.t_prg);
                $('#t_kes').val(data.tunjangan.t_kes);
                if (data.santri.laznah == 'Departemen') {
                    $('#t_jab').removeAttr('readonly');
                } else {
                    $('#t_jab').attr('readonly', 'true');
                }
                if (data.santri.t_kes == true) {
                    $('#t_kes').removeAttr('readonly');
                } else {
                    $('#t_kes').attr('readonly', 'true');
                }
                $('#t_rmh').val(data.tunjangan.t_rmh);
                if (data.santri.t_rmh == true) {
                    $('#t_rmh').removeAttr('readonly');
                } else {
                    $('#t_rmh').attr('readonly', 'true');
                }
                $('#t_srg').val(data.tunjangan.t_srg);
                if (data.santri.t_srg == true) {
                    $('#t_srg').removeAttr('readonly');
                } else {
                    $('#t_srg').attr('readonly', 'true');
                }
                $('#t_atr').val(data.tunjangan.t_atr);
                if (data.santri.t_atr == true) {
                    $('#t_atr').removeAttr('readonly');
                } else {
                    $('#t_atr').attr('readonly', 'true');
                }
                $('#t_hra').val(data.tunjangan.t_hra);
                if (data.santri.t_hra == true) {
                    $('#t_hra').removeAttr('readonly');
                } else {
                    $('#t_hra').attr('readonly', 'true');
                }
                $('#t_haj').val(data.tunjangan.t_haj);
                if (data.santri.t_haj == true) {
                    $('#t_haj').removeAttr('readonly');
                } else {
                    $('#t_haj').attr('readonly', 'true');
                }
                $('#t_dka').val(data.tunjangan.t_dka);
                if (data.santri.t_dka == true) {
                    $('#t_dka').removeAttr('readonly');
                } else {
                    $('#t_dka').attr('readonly', 'true');
                }
                $('#t_bns').val(data.tunjangan.t_bns);
                if (data.santri.t_bns == true) {
                    $('#t_bns').removeAttr('readonly');
                } else {
                    $('#t_bns').attr('readonly', 'true');
                }
                $('#t_spc').val(data.tunjangan.t_spc);
                if (data.santri.t_spc == true) {
                    $('#t_spc').removeAttr('readonly');
                } else {
                    $('#t_spc').attr('readonly', 'true');
                }
                $('#t_eks').val(data.tunjangan.t_eks);
                if (data.santri.t_eks == true) {
                    $('#t_eks').removeAttr('readonly');
                } else {
                    $('#t_eks').attr('readonly', 'true');
                }
            }
        });
    });

    function acc(id) {
        $.ajax({
            url: '/tunjangan/ceklis/' + id,
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