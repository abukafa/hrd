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
            <h4 class="page-title">Data Potongan</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <a href="" type="button" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3 inputPotongan" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="d-none d-xl-table-cell text-center">P.SRG</th>
                            <th class="d-none d-xl-table-cell text-center">P.ATR</th>
                            <th class="d-none d-xl-table-cell text-center">P.KES</th>
                            <th class="d-none d-xl-table-cell text-center">P.RMH</th>
                            <th class="d-none d-xxl-table-cell text-center">P.BON</th>
                            <th class="d-none d-xxl-table-cell text-center">P.HTG</th>
                            <th class="d-none d-xl-table-cell text-center">Lainnya</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">ACC</th>
                            <th class="d-none d-lg-table-cell text-center">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($potongan as $row) :
                            $lain = $row['p_zkt'] + $row['p_inf'] + $row['p_lin'];
                            $jum = $lain + $row['p_srg'] + $row['p_atr'] + $row['p_kes'] + $row['p_rmh'] + $row['p_bon'] + $row['p_htg'];
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['p_srg'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['p_atr'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['p_kes'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($row['p_rmh'], 0, '.', ',') ?></td>
                                <td class="d-none d-xxl-table-cell text-right"><?= number_format($row['p_bon'], 0, '.', ',') ?></td>
                                <td class="d-none d-xxl-table-cell text-right"><?= number_format($row['p_htg'], 0, '.', ',') ?></td>
                                <td class="d-none d-xl-table-cell text-right"><?= number_format($lain, 0, '.', ',') ?></td>
                                <td class="text-right"><strong><?= number_format($jum, 0, '.', ',') ?></strong></td>
                                <td class="text-center">
                                    <input type="checkbox" style="width: 24px; height: 24px; font-size: 15px;" <?= ($row['acc']) ? 'checked' : '' ?> onclick="acc(<?= $row['id'] ?>)">
                                </td>
                                <td class="d-none d-lg-table-cell text-center">
                                    <button class="btn btn-success editPotongan" data-id="<?= $row['id'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-lead-pencil"></i></button>
                                    <form action="/potongan/<?= $row['id']; ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
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
                <h5 class="modal-title" id="formLabel">Tambah potongan</h5>
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
                        <label class='form-label' for='p_srg'>Potongan Seragam</label>
                        <input type='number' class='form-control' name='p_srg' id='p_srg' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_atr'>Potongan Atribut</label>
                        <input type='number' class='form-control' name='p_atr' id='p_atr' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_kes'>Potongan Kesehatan</label>
                        <input type='number' class='form-control' name='p_kes' id='p_kes' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_rmh'>Potongan Rumah</label>
                        <input type='number' class='form-control' name='p_rmh' id='p_rmh' readonly>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_bon'>Potongan Kasbon</label>
                        <input type='number' class='form-control' name='p_bon' id='p_bon'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_htg'>Potongan Hutang</label>
                        <input type='number' class='form-control' name='p_htg' id='p_htg'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_zkt'>Potongan Zakat</label>
                        <input type='number' class='form-control' name='p_zkt' id='p_zkt'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_inf'>Potongan Infaq</label>
                        <input type='number' class='form-control' name='p_inf' id='p_inf'>
                    </div>
                    <div class='col-6 mb-2'>
                        <label class='form-label' for='p_lin'>Potongan Lainnya</label>
                        <input type='number' class='form-control' name='p_lin' id='p_lin'>
                    </div>
                    <div class="col-6 mb-2"></div>
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
            url: '/potongan/santri/' + id,
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

    $('.inputPotongan').on('click', function() {
        $('#formLabel').html('Input Data <b>potongan</b>');
        $('.submitButton').html('Tambah');
        $('.modal-body form').attr('action', '/potongan/baru');
        $('#p-select').attr('class', 'd-block');
        $('#p-input').attr('class', 'd-none');
        $('#p_srg').val('0');
        $('#p_atr').val('0');
        $('#p_kes').val('0');
        $('#p_rmh').val('0');
        $('#p_bon').val('0');
        $('#p_htg').val('0');
        $('#p_zkt').val('0');
        $('#p_inf').val('0');
        $('#p_lin').val('0');
    });

    $('.editPotongan').on('click', function() {
        const id = $(this).data('id');
        $('#formLabel').html('Edit Data <b>potongan</b>');
        $('.submitButton').html('Ubah');
        $('.modal-body form').attr('action', '/potongan/' + id);
        $.ajax({
            url: '/potongan/data/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#p-select').attr('class', 'd-none');
                $('#p-input').attr('class', 'input-group');
                $('#nip').val(data.potongan.nip);
                $('#nama').val(data.potongan.nama);
                $('#p_srg').val(data.potongan.p_srg);
                $('#p_atr').val(data.potongan.p_atr);
                $('#p_kes').val(data.potongan.p_kes);
                $('#p_rmh').val(data.potongan.p_rmh);
                $('#p_bon').val(data.potongan.p_bon);
                $('#p_htg').val(data.potongan.p_htg);
                $('#p_zkt').val(data.potongan.p_zkt);
                $('#p_inf').val(data.potongan.p_inf);
                $('#p_lin').val(data.potongan.p_lin);
            }
        });
    });

    function acc(id) {
        $.ajax({
            url: '/potongan/ceklis/' + id,
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