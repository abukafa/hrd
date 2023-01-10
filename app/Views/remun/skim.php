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
            <h4 class="page-title">Skim Remunerasi</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <a href="" type="button" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3 inputSkim" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Grade</th>
                            <th>Golongan</th>
                            <th class="d-none d-xl-table-cell">Sub Golongan</th>
                            <th class="d-none d-xl-table-cell text-center">Honor</th>
                            <th class="d-none d-xl-table-cell text-center">Makan</th>
                            <th class="d-none d-xl-table-cell text-center">Transport</th>
                            <th class="d-none d-xl-table-cell text-center">Tunjangan</th>
                            <th class="text-center">ACC</th>
                            <th class="d-none d-lg-table-cell text-center">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($skim as $row) :
                            $tunj = $row['t_jab'] + $row['t_stt'] + $row['t_ank'] + $row['t_prg'] + $row['t_kes'];
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['golongan'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['sub_golongan'] ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['honor'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['makan'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['transport'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($tunj, 0, '.', ',') ?></td>
                                <td class="text-center">
                                    <input type="checkbox" style="width: 24px; height: 24px; font-size: 15px;" <?= ($row['acc']) ? 'checked' : '' ?> onclick="acc(<?= $row['id'] ?>)">
                                </td>
                                <td class="d-none d-lg-table-cell text-center">
                                    <button class="btn btn-success editSkim" data-id="<?= $row['id'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-lead-pencil"></i></button>
                                    <form action="/skim/<?= $row['id']; ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
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
                <h5 class="modal-title" id="formLabel">Tambah Skim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row" action="" method="POST">
                    <div class='col-12 mb-2'>
                        <label class='form-label' for='id'>Grade</label>
                        <select type='text' class='form-control' name='id' id='id'>
                            <option value=''>.. pilih ..</option>
                            <?php for ($i = 0; $i <= 14; $i++) { ?>
                                <option><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class='col-12 mb-2'>
                        <label class='form-label' for='golongan'>Golongan</label>
                        <input type='text' class='form-control' name='golongan' id='golongan'>
                    </div>
                    <div class='col-12 mb-2'>
                        <label class='form-label' for='sub_golongan'>Sub Golongan</label>
                        <input type='text' class='form-control' name='sub_golongan' id='sub_golongan'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='honor'>Honor</label>
                        <input type='number' class='form-control' name='honor' id='honor'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='makan'>Makan</label>
                        <input type='number' class='form-control' name='makan' id='makan'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='transport'>Transport</label>
                        <input type='number' class='form-control' name='transport' id='transport'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_jab'>Tunjangan Jabatan</label>
                        <input type='number' class='form-control' name='t_jab' id='t_jab'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_stt'>Tunjangan Status</label>
                        <input type='number' class='form-control' name='t_stt' id='t_stt'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_ank'>Tunjangan Anak</label>
                        <input type='number' class='form-control' name='t_ank' id='t_ank'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_prg'>Tunjangan Program</label>
                        <input type='number' class='form-control' name='t_prg' id='t_prg'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='t_kes'>Tunjangan Kesehatan</label>
                        <input type='number' class='form-control' name='t_kes' id='t_kes'>
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
            url: '/skim/santri/' + id,
            dataType: "json",
            success: function(data) {
                $('#nip').val(data.santri.nip);
                $('#nama').val(data.santri.nama);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }

    $('.inputSkim').on('click', function() {
        $('#formLabel').html('Input Data <b>Skim</b>');
        $('.submitButton').html('Tambah');
        $('.modal-body form').attr('action', '/skim/baru');
        $('#id').val('');
        $('#golongan').val('');
        $('#sub_golongan').val('');
        $('#honor').val('0');
        $('#makan').val('0');
        $('#transport').val('0');
        $('#t_jab').val('0');
        $('#t_stt').val('0');
        $('#t_ank').val('0');
        $('#t_prg').val('0');
        $('#t_kes').val('0');
    });

    $('.editSkim').on('click', function() {
        const id = $(this).data('id');
        $('#formLabel').html('Edit Data <b>Skim</b>');
        $('.submitButton').html('Ubah');
        $('.modal-body form').attr('action', '/skim/' + id);
        $.ajax({
            url: '/skim/data/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.skim.id);
                $('#golongan').val(data.skim.golongan);
                $('#nip').val(data.skim.nip);
                $('#nama').val(data.skim.nama);
                $('#sub_golongan').val(data.skim.sub_golongan);
                $('#honor').val(data.skim.honor);
                $('#makan').val(data.skim.makan);
                $('#transport').val(data.skim.transport);
                $('#t_jab').val(data.skim.t_jab);
                $('#t_stt').val(data.skim.t_stt);
                $('#t_ank').val(data.skim.t_ank);
                $('#t_prg').val(data.skim.t_prg);
                $('#t_kes').val(data.skim.t_kes);
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
    };

    function acc(id) {
        $.ajax({
            url: '/skim/ceklis/' + id,
            dataType: "json",
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }
</script>

<?php $this->endSection(); ?>