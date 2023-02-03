<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Remunerasi</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/default/logo.png">
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style type="text/css" media="print">
        @page {
            size: portrait;
        }
    </style>
</head>

<body>
    <?php foreach ($remun as $rem) : ?>
        <div class="container-fluid">
            <img src="<?= base_url() ?>/assets/images/default/kop.jpg" width="30%" alt="kop">
            <div class="text-center mt-0">
                <h3 style="margin-top:-25px">Slip Remunerasi</h3>
                <hr>
                <div class="row text-left">
                    <div class="col-1">
                        <div>Bulan</div>
                        <div>Jabatan</div>
                    </div>
                    <div class="col-2">
                        <div>: <?= $rem['bulan'] ?></div>
                        <div>: <?= $rem['jabatan'] ?></div>
                    </div>
                    <div class="col-1">
                        <div>Nama</div>
                        <div>Laznah</div>
                    </div>
                    <div class="col-8">
                        <div>: <?= $rem['nama'] ?></div>
                        <div class="row">
                            <div class="col-3">
                                <div>: <?= $rem['laznah'] ?></div>
                            </div>
                            <div class="col-1">
                                <div>Grade</div>
                            </div>
                            <div class="col-2">
                                <div>: <?= $rem['grade'] ?></div>
                            </div>
                            <div class="col-1">
                                <div>Khidmat</div>
                            </div>
                            <div class="col-2">
                                <div>: <?= $rem['status_rda'] ?></div>
                            </div>
                            <div class="col-1">
                                <div>Absensi</div>
                            </div>
                            <div class="col-2">
                                <div>: <?= $rem['total'] * 100 . '%' ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <table class="table table-sm table-borderless">
                    <tr class="text-center">
                        <td class="font-weight-bold border" colspan="6">PENDAPATAN</td>
                        <td class="font-weight-bold border" colspan="3">POTONGAN</td>
                        <td class="border-top border-right"><?= date('d M Y') ?></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">Honor Pokok</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['honor'], 0, ',', '.') ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="border-left pl-2">Seragam</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_srg'], 0, ',', '.') ?></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">Uang Makan</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['makan'], 0, ',', '.') ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="border-left pl-2">Atribut</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_atr'], 0, ',', '.') ?></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">Transport</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['transport'], 0, ',', '.') ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="border-left pl-2">Kesehatan</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_kes'], 0, ',', '.') ?></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">Tunjangan</td>
                        <td></td>
                        <td class="border-right pr-2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="border-left pl-2">Rumah</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_rmh'], 0, ',', '.') ?></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Jabatan</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_jab'], 0, ',', '.') ?></td>
                        <td>- Atribut</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_atr'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2">Kasbon</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_bon'], 0, ',', '.') ?></td>
                        <td class="border-right text-center font-weight-bold">Anggraeni Devi Lestari</td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Status</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_stt'], 0, ',', '.') ?></td>
                        <td>- Hari Raya</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_hra'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2">Hutang</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_htg'], 0, ',', '.') ?></td>
                        <td class="border-right border-bottom text-center">HRD - Remunerasi</td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Anak</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_ank'], 0, ',', '.') ?></td>
                        <td>- Haji Umroh</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_haj'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2">Zakat</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_zkt'], 0, ',', '.') ?></td>
                        <td class="border-right text-center">Mengetahui</td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Rumah</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_rmh'], 0, ',', '.') ?></td>
                        <td>- Duka</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_dka'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2">Infaq</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_inf'], 0, ',', '.') ?></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Program</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_prg'], 0, ',', '.') ?></td>
                        <td>- Bonus</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_bns'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2">Lainnya</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['p_lin'], 0, ',', '.') ?></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Kesehatan</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_jab'], 0, ',', '.') ?></td>
                        <td>- Spesial</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_atr'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2"></td>
                        <td></td>
                        <td class="border-right pr-2"></td>
                        <td class="border-right pr-2"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="border-left pl-2">- Seragam</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_srg'], 0, ',', '.') ?></td>
                        <td>- Eksekutif</td>
                        <td>:</td>
                        <td class="text-right border-right pr-2"><?= number_format($rem['t_eks'], 0, ',', '.') ?></td>
                        <td class="border-left pl-2"></td>
                        <td></td>
                        <td class="border-right pr-2"></td>
                        <td class="border-right text-center font-weight-bold">Fine Afriani</td>
                    </tr>
                    <tr class="text-center">
                        <?php
                        $tambah = $rem['honor'] + $rem['makan'] + $rem['transport'] + $rem['t_jab'] + $rem['t_stt'] + $rem['t_ank'] + $rem['t_prg'] + $rem['t_rmh'] + $rem['t_srg'] + $rem['t_atr'] + $rem['t_kes'] + $rem['t_hra'] + $rem['t_haj'] + $rem['t_dka'] + $rem['t_bns'] + $rem['t_spc'] + $rem['t_eks'];
                        $potong = $rem['p_srg'] + $rem['p_atr'] + $rem['p_kes'] + $rem['p_bon'] + $rem['p_htg'] + $rem['p_zkt'] + $rem['p_inf'] + $rem['p_lin'] + $rem['p_rmh'];
                        $total = $tambah - $potong;
                        ?>
                        <td class="font-weight-bold border-left border-top border-bottom" colspan="6"><?= number_format($tambah, 0, ',', '.') ?></td>
                        <td class="font-weight-bold border-left border-top border-bottom" colspan="3"><?= number_format($potong, 0, ',', '.') ?></td>
                        <td class="border-left border-bottom border-right text-center">Bendahara Umum</td>
                    </tr>
                </table>
                <hr class="mb-2">
                <div class="floar-right font-weight-bold">
                    <p class="mb-0"><?= number_format($total, 0, ',', '.') ?></p>
                </div>
                <hr class="mt-2">
                <br>

            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>