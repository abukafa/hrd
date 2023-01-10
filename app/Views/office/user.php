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
            <h4 class="page-title"><?= isset($_GET['pass']) ? 'Ubah Password' : 'Pengguna' ?></h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-3 <?= isset($_GET['pass']) ?: 'd-none' ?>">
        <div class="card m-b-30">
            <div class="card-body text-center mt-4 mb-0">
                <img src="<?= uploaded(session()->get('uname') . '.png', '/assets/images/pengurus') ?>" class="img-fluid rounded-circle mb-2" id="imgPreview" width="128" height="128" />
            </div>
            <div class="card-body">
                <form action="/users/pass" method="post">
                    <?= csrf_field(); ?>
                    <div class='mb-2'>
                        <label class='form-label' for='uname'>Username</label>
                        <input type='text' class='form-control' name='uname' id='uname' placeholder="<?= session()->get('uname') ?>" readonly>
                    </div>
                    <div class='mb-2'>
                        <label class='form-label' for='lama'>Password Lama</label>
                        <input type='password' class='form-control' name='lama' id='lama' placeholder="Old Password" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <div>
                            <input type="password" id="baru" name='baru' class="form-control" required="" placeholder="New Password">
                        </div>
                        <div class="m-t-10">
                            <input type="password" name='lagi' id='lagi' class="form-control" required="" data-parsley-equalto="#baru" placeholder="Re-Type Password">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submitButton">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-<?= isset($_GET['pass']) ? '9' : '12' ?>">
        <div class="card m-b-30">
            <div class="card-header <?= !isset($_GET['pass']) ?: 'd-none' ?>">
                <a href="" type="button" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3 inputUser" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell text-center">User ID</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Nama</th>
                            <th class="d-none d-xl-table-cell text-center">Admin</th>
                            <th class="d-none d-xl-table-cell text-center">Akses</th>
                            <th class=" <?= isset($_GET['pass']) ? 'd-none' : 'd-none d-lg-table-cell text-center' ?>">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($user as $row) :
                            $no = sprintf('U%04d', $row['id']);
                        ?>
                            <tr>
                                <td class="d-none d-xl-table-cell"><?= $no ?></td>
                                <td><?= $row['uname'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['admin'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['akses'] ?></td>
                                <td class="<?= isset($_GET['pass']) ? 'd-none' : 'd-none d-lg-table-cell text-center' ?>">
                                    <button class="btn btn-success editUser" data-id="<?= $row['id'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm" <?= $row['uname'] == 'abu.kafa' ? 'disabled' : '' ?>><i class="mdi mdi-lead-pencil"></i></button>
                                    <form action="/users/<?= $row['id']; ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="button" class="btn btn-danger delete-<?= $row['id'] ?>" <?= $row['uname'] == 'abu.kafa' ? 'disabled' : '' ?>><i class="mdi mdi-delete-sweep"></i></button>
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
        <div class="card m-b-30 <?= (session()->get('uname') == 'abu.kafa') ?: 'd-none' ?>">
            <div class="card-header">
                <strong>UserQSL</strong>
            </div>
            <div class="card-body">
                <form action="/users/sql" method="post">
                    <div class="row">
                        <div class="col-6 col-md-2 mb-2">
                            <label class="form-label">Aksi</label>
                            <select type="text" class="form-control" id="opsi" onchange="generateQuery()">
                                <option>Update</option>
                                <option>Delete</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2 mb-2">
                            <label class="form-label">Tabel</label>
                            <select name="tabel" id="tabel" class="form-control">
                                <option>.. pilih ..</option>
                                <?php
                                foreach ($tables as $table) {
                                    echo '<option>' . $table . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 col-md-2 mb-2">
                            <label class="form-label">Kolom</label>
                            <select id="kolom" class="form-control" onchange="generateQuery()">
                                <option>.. pilih ..</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2 mb-2">
                            <label class="form-label">Data Baru</label>
                            <input id="newValue" type="text" class="form-control" onkeyup="generateQuery()">
                        </div>
                        <div class="col-6 col-md-2 mb-2">
                            <label class="form-label">Konsidi</label>
                            <select id="kondisi" class="form-control" onchange="generateQuery()">
                                <option>.. pilih ..</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2 mb-2">
                            <label class="form-label">Data Lama</label>
                            <input id="oldValue" type="text" class="form-control" onkeyup="generateQuery()">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="input-group mt-2">
                                <input type="text" name="query" id="query" autocomplete="off" class="form-control" placeholder="My Query">
                                <span class="input-group-append">
                                    <button type="submit" class="btn  btn-primary" id="io_submit"><a class="mdi mdi-content-save"></a></button>
                                    <button type="reset" class="btn  btn-primary" id="refresh" data-bs-dismiss="modal"><a class="mdi mdi-refresh"></a></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<div class="modal fade myModalForm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Tambah user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
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
                    <div class="form-group">
                        <label>Default Password</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="pass" id="pass" placeholder="gemilang" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class='form-label' for='admin'>Admin</label>
                        <select type='text' class='form-control' name='admin' id='admin'>
                            <option value=''>.. pilih ..</option>
                            <?php foreach ($laznah as $l) : ?>
                                <option><?= $l['laznah'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class='form-label' for='akses'>Hak Akses</label>
                        <select type='text' class='form-control' name='akses' id='akses'>
                            <option value=''>.. pilih ..</option>
                            <option>User</option>
                            <option>Superuser</option>
                        </select>
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

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Form Advance -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/select2/select2.min.js" type="text/javascript"></script>

<!-- Parsley js -->
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/parsleyjs/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
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
                alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }

    $('.inputUser').on('click', function() {
        $('#formLabel').html('Input Data <b>user</b>');
        $('.submitButton').html('Tambah');
        $('.modal-body form').attr('action', '/users/baru');
        $('#p-select').attr('class', 'd-block');
        $('#p-input').attr('class', 'd-none');
        $('#admin').val('');
        $('#akses').val('');
    });

    $('.editUser').on('click', function() {
        const id = $(this).data('id');
        $('#formLabel').html('Edit Data <b>user</b>');
        $('.submitButton').html('Ubah');
        $('.modal-body form').attr('action', '/users/' + id);
        $.ajax({
            url: '/users/data/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#p-select').attr('class', 'd-none');
                $('#p-input').attr('class', 'input-group');
                $('#nip').val(data.user.uname);
                $('#nama').val(data.user.nama);
                $('#admin').val(data.user.admin);
                $('#akses').val(data.user.akses);
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
            url: '/user/ceklis/' + id,
            dataType: "json",
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }

    // AJAX KOLOM USER-SQL EDIT
    $('#tabel').change(function() {
        var tab = $(this).val();
        $('#kolom').empty();
        $('#kondisi').empty();
        $.ajax({
            url: '/users/sql/' + tab,
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $.each(data, function(index, item) {
                    $('#kolom').append('<option>' + item.Field + '</option>');
                    $('#kondisi').append('<option>' + item.Field + '</option>');
                });
            }
        });
    });
    $('#refresh').click(function() {
        // console.log('ok');
        $('#kolom').removeAttr('disabled');
        $('#newValue').removeAttr('disabled');
    });

    function generateQuery() {
        var opsi = $('#opsi').val();
        if (opsi == "Update") {
            $('#query').val("UPDATE " + $('#tabel').val() + " SET " + $('#kolom').val() + "='" + $('#newValue').val() + "' WHERE " + $('#kondisi').val() + "='" + $('#oldValue').val() + "'");
            $('#kolom').removeAttr('disabled');
            $('#newValue').removeAttr('disabled');
        } else if (opsi == "Delete") {
            $('#query').val("DELETE FROM " + $('#tabel').val() + " WHERE " + $('#kondisi').val() + "='" + $('#oldValue').val() + "'");
            $('#kolom').attr('disabled', '');
            $('#newValue').attr('disabled', '');
        }
    }
</script>

<?php $this->endSection(); ?>