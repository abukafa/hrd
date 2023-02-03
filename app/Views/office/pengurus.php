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
            <h4 class="page-title">Pengurus</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <a type="button" href="/pengurus/baru" type="button" class="btn btn-primary waves-effect waves-light float-right mr-3"><i class="mdi mdi-account-plus"></i> Tambah Baru</a>
                <div class="btn-group float-right mr-2">
                    <button type="button" class="btn btn-primary"><i class="mdi mdi-file-excel-box"></i> Excel</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/pengurus/export">Export to xls</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="" data-toggle="modal" data-animation="bounce" data-target=".myModalImport">Import from xls</a>
                        <a class="dropdown-item" href="<?= base_url('/assets/images/default/sample-pengurus.xlsx') ?>">Download Sample</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th class="d-none d-xl-table-cell">Gabung</th>
                            <th class="d-none d-xl-table-cell">Grade</th>
                            <th class="d-none d-xl-table-cell">Jabatan</th>
                            <th class="d-none d-xl-table-cell">Laznah</th>
                            <th class="d-none d-xl-table-cell">Status</th>
                            <th>ACC</th>
                            <th class="d-none d-lg-table-cell text-center">Opsi</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($santri as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nip'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['thn_gabung'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['grade'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['jabatan'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['laznah'] ?></td>
                                <td class="d-none d-xl-table-cell"><?= $row['status_santri'] ?></td>
                                <td class="text-center">
                                    <input type="checkbox" style="width: 24px; height: 24px; font-size: 15px;" <?= ($row['acc']) ? 'checked' : '' ?> onclick="acc(<?= $row['id'] ?>)">
                                <td class="d-none d-lg-table-cell text-center">
                                    <a href="/pengurus/<?= $row['id'] ?>" class="btn btn-success"><i class="mdi mdi-lead-pencil"></i></a>
                                    <form action="/pengurus/<?= $row['id']; ?>" method="post" class="d-inline" id="delete-<?= $row['id'] ?>">
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
                <form action="/pengurus/import" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file" accept=".xlsx">
                            <label class="custom-file-label" for="file">Pilih File Excel</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submitButton">
                                Submit
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
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

    function acc(id) {
        $.ajax({
            url: '/pengurus/ceklis/' + id,
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