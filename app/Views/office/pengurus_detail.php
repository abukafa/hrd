<?php
$this->extend('layout/template');
$this->section('content');
?>

<link href="<?= base_url() ?>/assets/plugins/croppie/croppie.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="/pengurus"><i class="mdi mdi-arrow-left"></i> Kembali</a></li>
                </ol>
            </div>
            <h4 class="page-title"><strong>Detail</strong> Pengurus</h4>
        </div>
    </div>
</div>

<?php sa_success(); ?>

<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Profil</h5>
            </div>
            <div class="card-body text-center">
                <div id="uploaded_image">
                    <img src="<?= uploaded((isset($santri)) ? $santri['nip'] . '.png' : '', '/assets/images/pengurus') ?>" class="img-fluid rounded-circle mb-2" id="imgPreview" width="128" height="128" />
                </div>
                <h5 class="card-title mb-0"><?= (isset($santri)) ? $santri['nama'] : '' ?></h5>
                <div class="text-muted mb-2"><?= (isset($santri)) ? $santri['laznah'] : '' ?></div>

                <div>
                    <a class="btn btn-primary btn-sm" href="mailto:<?= (isset($santri)) ? $santri['email'] : '' ?>"><i class="mdi mdi-email-variant"></i> Email</a>
                    <a class="btn btn-primary btn-sm" href="https://wa.me/<?= (isset($santri)) ? $santri['handphone'] : '' ?>"><i class="mdi mdi-whatsapp"></i> Chat</a>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <h5 class="h6 card-title">Kompetensi</h5>
                <?php
                if (isset($kompetensi)) {
                    foreach ($kompetensi as $kom) : ?>
                        <a href="#" class="badge badge-primary"><?= $kom['bentuk']; ?></a>
                <?php
                    endforeach;
                } ?>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <h5 class="h6 card-title">Tentang <?= (isset($santri)) ? $santri['panggilan'] : '' ?></h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><i class="mdi mdi-home"></i><a href="#"> <?= (isset($santri)) ? $santri['alamat'] : '' ?></a></li>

                    <li class="mb-1"><i class="mdi mdi-heart"></i> <?= (isset($santri)) ? $santri['status'] . (($santri['jml_anak'] > 0) ? ' - ' . $santri['jml_anak'] . ' anak' : '') : '' ?></li>
                    <li class="mb-1"><i class="mdi mdi-map-marker"></i> <?= (isset($santri)) ? $santri['kec'] : '' ?></li>
                </ul>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <h5 class="h6 card-title">HR. Data</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><a href="#"><?= (isset($santri)) ? 'G' . $santri['grade'] . ' - ' . $santri['golongan'] : '' ?></a></li>
                    <li class="mb-1"><a href="#"><?= (isset($santri)) ? $santri['sub_golongan'] : '' ?></a></li>
                    <li class="mb-1"><a href="#"><?= (isset($santri)) ? $santri['jabatan'] . ' ' . $santri['laznah'] : ''  ?></a></li>
                    <li class="mb-1"><a href="#"><?= (isset($santri)) ? $santri['status_rda'] . ' ' . $santri['thn_gabung'] : ''  ?></a></li>
                </ul>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Tunjangan</h5>
            </div>
            <div class="card-body">
                <div class="col">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_jab" id="t_jab" <?= (!isset($santri)) ? 'disabled' : (($santri['t_jab']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_jab">Jabatan : <a id="ajaxt_jab"><?= (!isset($tunj)) ? '' : number_format($tunj['t_jab'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_stt" id="t_stt" <?= (!isset($santri)) ? 'disabled' : (($santri['t_stt']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_stt">Status : <a id="ajaxt_stt"><?= (!isset($tunj)) ? '' : number_format($tunj['t_stt'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_ank" id="t_ank" <?= (!isset($santri)) ? 'disabled' : (($santri['t_ank']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_ank">Anak : <a id="ajaxt_ank"><?= (!isset($tunj)) ? '' : number_format($tunj['t_ank'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_prg" id="t_prg" <?= (!isset($santri)) ? 'disabled' : (($santri['t_prg']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_prg">Program : <a id="ajaxt_prg"><?= (!isset($tunj)) ? '' : number_format($tunj['t_prg'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_srg" id="t_srg" <?= (!isset($santri)) ? 'disabled' : (($santri['t_srg']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_srg">Seragam : <a id="ajaxt_srg"><?= (!isset($tunj)) ? '' : number_format($tunj['t_srg'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_atr" id="t_atr" <?= (!isset($santri)) ? 'disabled' : (($santri['t_atr']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_atr">Atribut : <a id="ajaxt_atr"><?= (!isset($tunj)) ? '' : number_format($tunj['t_atr'], 0, '.', '.') ?></a></label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_kes" id="t_kes" <?= (!isset($santri)) ? 'disabled' : (($santri['t_kes']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_kes">Kesehatan : <a id="ajaxt_kes"><?= (!isset($tunj)) ? '' : number_format($tunj['t_kes'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_rmh" id="t_rmh" <?= (!isset($santri)) ? 'disabled' : (($santri['t_rmh']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_rmh">Rumah : <a id="ajaxt_rmh"><?= (!isset($tunj)) ? '' : number_format($tunj['t_rmh'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_hra" id="t_hra" <?= (!isset($santri)) ? 'disabled' : (($santri['t_hra']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_hra">Hari Raya : <a id="ajaxt_hra"><?= (!isset($tunj)) ? '' : number_format($tunj['t_hra'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_haj" id="t_haj" <?= (!isset($santri)) ? 'disabled' : (($santri['t_haj']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_haj">Haji : <a id="ajaxt_haj"><?= (!isset($tunj)) ? '' : number_format($tunj['t_haj'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_dka" id="t_dka" <?= (!isset($santri)) ? 'disabled' : (($santri['t_dka']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_dka">Duka : <a id="ajaxt_dka"><?= (!isset($tunj)) ? '' : number_format($tunj['t_dka'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_bns" id="t_bns" <?= (!isset($santri)) ? 'disabled' : (($santri['t_bns']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_bns">Bonus : <a id="ajaxt_bns"><?= (!isset($tunj)) ? '' : number_format($tunj['t_bns'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_spc" id="t_spc" <?= (!isset($santri)) ? 'disabled' : (($santri['t_spc']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_spc">Spesial : <a id="ajaxt_spc"><?= (!isset($tunj)) ? '' : number_format($tunj['t_spc'], 0, '.', '.') ?></a></label>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="t_eks" id="t_eks" <?= (!isset($santri)) ? 'disabled' : (($santri['t_eks']) ? 'checked' : '') .  ' onclick="cek(' . $santri['id'] . ' , id)"' ?>>
                        <label class="form-check-label" for="t_eks">Eksekutif : <a id="ajaxt_eks"><?= (!isset($tunj)) ? '' : number_format($tunj['t_eks'], 0, '.', '.') ?></a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title mb-1">Edit Data</h5>
            </div>
            <div class="card-body">

                <form class="row" action="/pengurus/<?= (isset($santri)) ? $santri['id'] : 'baru' ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="col-12 mb-2 d-none">
                        <input type='file' class='form-control p-1' name='upload_image' id='upload_image' accept='.jpg'>
                    </div>
                    <div class=" col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='nip'>No Induk</label>
                            <input type='text' class='form-control' name='nip' id='nip' value="<?= (isset($santri)) ? $santri['nip'] : generate_nip() ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='no_absen'>No Absen</label>
                            <input type='text' data-parsley-type="number" class='form-control' name='no_absen' id='no_absen' value="<?= (isset($santri)) ? $santri['no_absen'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='ktp'>No KTP</label>
                            <input type='text' data-parsley-type="number" class='form-control' name='ktp' id='ktp' value="<?= (isset($santri)) ? $santri['ktp'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='nama'>Nama Lengkap</label>
                            <input type='text' class='form-control' name='nama' id='nama' value="<?= (isset($santri)) ? $santri['nama'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='panggilan'>Panggilan</label>
                            <input type='text' class='form-control' name='panggilan' id='panggilan' value="<?= (isset($santri)) ? $santri['panggilan'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='gender'>Gender</label>
                            <select type='text' class='form-control' name='gender' id='gender' required>
                                <option value="<?= (isset($santri)) ? $santri['gender'] : '' ?>"><?= (isset($santri)) ? $santri['gender'] : '.. pilih ..' ?></option>
                                <option>Ikhwan</option>
                                <option>Akhwat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='tmp_lahir'>Tempat Lahir</label>
                            <input type='text' class='form-control' name='tmp_lahir' id='tmp_lahir' value="<?= (isset($santri)) ? $santri['tmp_lahir'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='tgl_lahir'>Tanggal Lahir</label>
                            <input type='text' class='form-control' name='tgl_lahir' id="tgl_lahir" value="<?= (isset($santri)) ? $santri['tgl_lahir'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='gol_darah'>Gol Darah</label>
                            <select type='text' class='form-control' name='gol_darah' id='gol_darah'>
                                <option value="<?= (isset($santri)) ? $santri['gol_darah'] : '' ?>"><?= (isset($santri)) ? $santri['gol_darah'] : '.. pilih ..' ?></option>
                                <option>A</option>
                                <option>B</option>
                                <option>O</option>
                                <option>AB</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='status'>Status</label>
                            <select type='text' class='form-control' name='status' required>
                                <option value="<?= (isset($santri)) ? $santri['status'] : '' ?>"><?= (isset($santri)) ? $santri['status'] : '.. pilih ..' ?></option>
                                <option>Single</option>
                                <option>Menikah</option>
                                <option>Duda</option>
                                <option>Janda</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='pendidikan'>Pendidikan</label>
                            <select type='text' class='form-control' name='pendidikan' id='pendidikan' required>
                                <option value="<?= (isset($santri)) ? $santri['pendidikan'] : '' ?>"><?= (isset($santri)) ? $santri['pendidikan'] : '.. pilih ..' ?></option>
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>Pesantren</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='pasangan'>Pasangan</label>
                            <input type='text' class='form-control' name='pasangan' id='pasangan' value="<?= (isset($santri)) ? $santri['pasangan'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='jml_istri'>Jumlah Istri</label>
                            <select type='text' class='form-control' name='jml_istri' id='jml_istri'>
                                <option value="<?= (isset($santri)) ? $santri['jml_istri'] : '' ?>"><?= (isset($santri)) ? $santri['jml_istri'] : '.. pilih ..' ?></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='jml_anak'>Jumlah Anak</label>
                            <input type='text' class='form-control' name='jml_anak' id='jml_anak' value="<?= (isset($santri)) ? $santri['jml_anak'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 mt-5">
                        <div class="mb-2">
                            <div class='mb-2'>
                                <label class='form-label' for='alamat'>Alamat Tinggal</label>
                                <input type='text' class='form-control' name='alamat' id='alamat' value="<?= (isset($santri)) ? $santri['alamat'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-xl-5">
                        <div class='mb-2'>
                            <label class='form-label' for='kec'>Kecamatan</label>
                            <input type='text' class='form-control' name='kec' id='kec' value="<?= (isset($santri)) ? $santri['kec'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='kab'>Kabupaten</label>
                            <input type='text' class='form-control' name='kab' id='kab' value="<?= (isset($santri)) ? $santri['kab'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='kodepos'>Kode Pos</label>
                            <input type='text' class='form-control' name='kodepos' id='kodepos' value="<?= (isset($santri)) ? $santri['kodepos'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='handphone'>No. Handphone</label>
                            <input type='text' class='form-control' name='handphone' id='handphone' value="<?= (isset($santri)) ? $santri['handphone'] : '+62' ?>" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='email'>Email</label>
                            <input type='email' parsley-type="email" class='form-control' name='email' id='email' value="<?= (isset($santri)) ? $santri['email'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <div class='mb-2'>
                                <label class='form-label' for='asal'>Alamat Asal</label>
                                <input type='text' class='form-control' name='asal' id='asal' value="<?= (isset($santri)) ? $santri['asal'] : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mt-5">
                        <div class='mb-2'>
                            <label class='form-label' for='laznah'>Laznah</label>
                            <select type='text' class='form-control' name='laznah' id='laznah'>
                                <option value="<?= (isset($santri)) ? $santri['laznah'] : '' ?>"><?= (isset($santri)) ? $santri['laznah'] : '.. pilih ..' ?></option>
                                <option>Pimpinan</option>
                                <option>Direktorat</option>
                                <option>Departemen</option>
                                <option>AL-Iffah</option>
                                <option>Bimbel</option>
                                <option>Kuttab</option>
                                <option>Madrasah</option>
                                <option>Mahad Aly</option>
                                <option>MPZ</option>
                                <option>Triger P</option>
                                <option>Triger Q</option>
                                <option>Triger R</option>
                                <option>Takmir Masjid</option>
                                <option>Tijaroh</option>
                                <option>Tour Religi</option>
                                <option>Jasa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-xl-5">
                        <div class='mb-2'>
                            <label class='form-label' for='status_rda'>Status RDA</label>
                            <select type='text' class='form-control' name='status_rda' id='status_rda'>
                                <option value="<?= (isset($santri)) ? $santri['status_rda'] : '' ?>"><?= (isset($santri)) ? $santri['status_rda'] : '.. pilih ..' ?></option>
                                <option>Khidmat</option>
                                <option>Karya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='grade'>Grade</label>
                            <select type='text' class='form-control' name='grade' id='grade'>
                                <option value="<?= (isset($santri)) ? $santri['grade'] : '' ?>"><?= (isset($santri)) ? $santri['grade'] : '.. pilih ..' ?></option>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='golongan'>Golongan</label>
                            <input type='text' class='form-control' name='golongan' id='golongan' value="<?= (isset($santri)) ? $santri['golongan'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='sub_golongan'>Sub Golongan</label>
                            <input type='text' class='form-control' name='sub_golongan' id='sub_golongan' value="<?= (isset($santri)) ? $santri['sub_golongan'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='jabatan'>Jabatan</label>
                            <select type='text' class='form-control' name='jabatan' id='jabatan'>
                                <option value="<?= (isset($santri)) ? $santri['jabatan'] : '' ?>"><?= (isset($santri)) ? $santri['jabatan'] : '.. pilih ..' ?></option>
                                <option>Ketua</option>
                                <option>Koordinator</option>
                                <option>Sekbid</option>
                                <option>Staf</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='status_santri'>Status Santri</label>
                            <select type='text' class='form-control' name='status_santri' id='status_santri'>
                                <option value="<?= (isset($santri)) ? $santri['status_santri'] : '' ?>"><?= (isset($santri)) ? $santri['status_santri'] : '.. pilih ..' ?></option>
                                <option>Aktif</option>
                                <option>Pasif</option>
                                <option>Suspend</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class='mb-2'>
                            <label class='form-label' for='thn_gabung'>Tahun Gabung</label>
                            <div class="input-group">
                                <input type='text' data-parsley-type="number" class='form-control' name='thn_gabung' id='thn_gabung' value="<?= (isset($santri)) ? $santri['thn_gabung'] : '' ?>" onkeyup="gabung()" required>
                                <input type='text' class='form-control' name='lama_gabung' id='lama_gabung' value="<?= (isset($santri)) ? date('Y') - $santri['thn_gabung'] : '' ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white col-12 mt-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop & Upload Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/plugins/croppie/croppie.js"></script>
<script src="<?= base_url() ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
<script src="<?= base_url() ?>/assets/js/detect.js"></script>
<script src="<?= base_url() ?>/assets/js/fastclick.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.blockUI.js"></script>
<script src="<?= base_url() ?>/assets/js/waves.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>

<!-- Parsley js -->
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/parsleyjs/parsley.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').parsley();
    });

    jQuery('#tgl_lahir').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy'
    });

    function gabung() {
        var gab = document.getElementById('thn_gabung').value;
        var lam = new Date().getFullYear() - gab + 1;
        document.getElementById('lama_gabung').value = lam;
    };

    $('#uploaded_image').css('cursor', 'pointer');
    $('#uploaded_image').click(function() {
        $('#upload_image').trigger('click')
    });

    $(document).ready(function() {

        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square' //circle
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#upload_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event) {
            var nip = $('#nip').val();
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $.ajax({
                    url: "/assets/plugins/croppie/upload.php?nip=" + nip,
                    // url: "/pengurus/upload/" + nip,
                    type: "POST",
                    data: {
                        "image": response
                    },
                    success: function(data) {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                        console.log(data);
                    }
                });
            })
        });
    });

    function cek(id, tunj) {
        $.ajax({
            url: '/pengurus/pos/' + id + '/' + tunj,
            // dataType: "json",
            success: function(data) {
                console.log(data);
                $('#ajax' + tunj).html(data);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "/n" + xhr.responseText + "/n" + thrownError)
            }
        });
    }

    $('#grade').on('change', function() {
        var mygrade = this.value;
        if (mygrade == 0) {
            $('#golongan').val("Trainee");
            $('#sub_golongan').val("Trainee");
        } else if (mygrade == 1) {
            $('#golongan').val("Staf");
            $('#sub_golongan').val("Staf Percobaan");
        } else if (mygrade == 2) {
            $('#golongan').val("Staf");
            $('#sub_golongan').val("Staf Junior");
        } else if (mygrade == 3) {
            $('#golongan').val("Staf");
            $('#sub_golongan').val("Staf Senior");
        } else if (mygrade == 4) {
            $('#golongan').val("Kepala Bagian");
            $('#sub_golongan').val("Asisten Manager Junior");
        } else if (mygrade == 5) {
            $('#golongan').val("Kepala Bagian");
            $('#sub_golongan').val("Asisten Manager Senior");
        } else if (mygrade == 6) {
            $('#golongan').val("Kepala Divisi");
            $('#sub_golongan').val("Manager Junior");
        } else if (mygrade == 7) {
            $('#golongan').val("Kepala Divisi");
            $('#sub_golongan').val("Manager Senior");
        } else if (mygrade == 8) {
            $('#golongan').val("Kepala Departemen");
            $('#sub_golongan').val("General Manager Muda");
        } else if (mygrade == 9) {
            $('#golongan').val("Kepala Departemen");
            $('#sub_golongan').val("General Manager Madya");
        } else if (mygrade == 10) {
            $('#golongan').val("Kepala Departemen");
            $('#sub_golongan').val("General Manager Utama");
        } else if (mygrade == 11) {
            $('#golongan').val("Pimpinan");
            $('#sub_golongan').val("Pimpinan Muda");
        } else if (mygrade == 12) {
            $('#golongan').val("Pimpinan");
            $('#sub_golongan').val("Pimpinan Madya");
        } else if (mygrade == 13) {
            $('#golongan').val("Pimpinan");
            $('#sub_golongan').val("Pimpinan Utama");
        }
    });
</script>

<?php
$this->endSection();
?>