<?php
$this->extend('layout/template');
$this->section('content');
?>

<!-- DataTables -->
<link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Kompetensi</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <a href="" type="button" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3 inputKompetensi" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No. Surat</th>
                            <th>Nama</th>
                            <th class="d-none d-xl-table-cell">Kompetensi</th>
                            <th class="d-none d-xl-table-cell">Lokasi</th>
                            <th class="d-none d-xl-table-cell">Tahun</th>
                            <th class="d-none d-lg-table-cell text-center">Opsi</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kompetensi as $row) : ?>
                            <tr>
                                <td><?= $row['no'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['bentuk'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['lokasi'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= date_format(date_create($row['tahun']), 'Y') ?></td>
                                <td class="d-none d-lg-table-cell text-center">
                                    <button class="btn btn-success editKompetensi" data-id="<?= $row['id'] ?>" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-lead-pencil"></i></button>
                                    <form action="/kompetensi/<?= $row['id']; ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
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
                <h5 class="modal-title" id="formLabel">Tambah Kompetensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kompetensi/baru" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <div>
                            <input type="text" class="form-control" name="no" id="no">
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
                    <div class="form-group">
                        <label>Bentuk</label>
                        <div>
                            <select type="jenis" class="form-control" required="" name="jenis" id="jenis">
                                <option value="">.. pilih ..</option>
                                <option>Diklat Internal</option>
                                <option>Diklat Eksternal</option>
                                <option>Pelatihan</option>
                                <option>Tugas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kompetensi</label>
                        <div>
                            <input data-parsley-type="bentuk" type="text" class="form-control" required="" placeholder="Nama Kompetensi / Tugas & Jabatan" name="bentuk" id="bentuk">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <div>
                            <input type="text" class="form-control" required="" placeholder="Lokasi Pelatihan / Penyelenggara / Tugas" name="lokasi" id="lokasi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pelaksanaan</label>
                        <div>
                            <input type="text" class="form-control" required="" id="tahun" name="tahun" id="tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div>
                            <textarea class="form-control" rows="5" name="keterangan" id="keterangan"></textarea>
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

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Form Advance -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery('#tahun').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });
    $(".select2").select2({
        width: '100%'
    });
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function selectSantri(id) {
        $.ajax({
            url: '/kompetensi/santri/' + id,
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

    $('.inputKompetensi').on('click', function() {
        $('#formLabel').html('Input Data <b>Kompetensi</b>');
        $('.submitButton').html('Tambah');
        $('.modal-body form').attr('action', '/kompetensi/baru');
        $('#no').val('');
        $('#p-select').attr('class', 'd-block');
        $('#p-input').attr('class', 'd-none');
        $('#nip').val('');
        $('#nama').val('');
        $('#jenis').val('');
        $('#bentuk').val('');
        $('#lokasi').val('');
        $('#tahun').val('');
        $('#keterangan').val('');
    });

    $('.editKompetensi').on('click', function() {
        const id = $(this).data('id');
        $('#formLabel').html('Edit Data <b>Kompetensi</b>');
        $('.submitButton').html('Ubah');
        $('.modal-body form').attr('action', '/kompetensi/' + id);
        $.ajax({
            url: '/kompetensi/data/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#no').val(data.kompetensi.no);
                $('#p-select').attr('class', 'd-none');
                $('#p-input').attr('class', 'input-group');
                $('#nip').val(data.kompetensi.nip);
                $('#nama').val(data.kompetensi.nama);
                $('#jenis').val(data.kompetensi.jenis);
                $('#bentuk').val(data.kompetensi.bentuk);
                $('#lokasi').val(data.kompetensi.lokasi);
                $('#tahun').val(data.kompetensi.tahun);
                $('#keterangan').val(data.kompetensi.keterangan);
            }
        });
    });
</script>

<?php $this->endSection(); ?>