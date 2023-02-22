<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Remunerasi</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/default/logo.png">
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <img src="<?= base_url() ?>/assets/images/default/kop.jpg" width="30%" alt="kop">
        <div class="text-center mt-0">
            <h3>Rekap Remunerasi</h3>
            <h5><?= $remun[0]['bulan'] ?></h5>
        </div>
        <table class="table table-sm table-bordered mt-4">
            <tr class="text-center">
                <th>Nama</th>
                <th>G</th>
                <th>Stt</th>
                <th>RDA</th>
                <th>Jab</th>
                <th>Laznah</th>
                <th>Abs</th>
                <th>Honor</th>
                <th>Makan</th>
                <th>Trans</th>
                <th>Jab</th>
                <th>Stt</th>
                <th>Ank</th>
                <th>Prg</th>
                <th>Lain</th>
                <th>Rmh</th>
                <th>Lain</th>
                <th>Total</th>
            </tr>
            <?php
            $grand = 0;
            foreach ($remun as $rem) :
                $t_lain = ($rem['t_rmh'] + $rem['t_srg'] + $rem['t_atr'] + $rem['t_kes'] + $rem['t_hra'] + $rem['t_haj'] + $rem['t_dka'] + $rem['t_bns'] + $rem['t_spc'] + $rem['t_eks']);
                $p_lain = ($rem['p_srg'] + $rem['p_atr'] + $rem['p_kes'] + $rem['p_bon'] + $rem['p_htg'] + $rem['p_zkt'] + $rem['p_inf'] + $rem['p_lin']);
                $total = ($rem['honor'] + $rem['makan'] + $rem['transport'] + $rem['t_jab'] + $rem['t_stt'] + $rem['t_ank'] + $rem['t_prg'] + $t_lain) - ($rem['p_rmh'] + $p_lain);
            ?>
                <tr class="text-right">
                    <td class="text-left"><?= $rem['nama'] ?></td>
                    <td class="text-center"><?= $rem['grade'] ?></td>
                    <td class="text-center"><?= $rem['status_santri'] ?></td>
                    <td class="text-center"><?= $rem['status_rda'] ?></td>
                    <td class="text-center"><?= $rem['jabatan'] ?></td>
                    <td class="text-center"><?= $rem['laznah'] ?></td>
                    <td class="text-center"><?= ($rem['total'] * 100) . '%' ?></td>
                    <td><?= number_format($rem['honor'], 0, ',', '.') ?></td>
                    <td><?= number_format($rem['makan'], 0, ',', '.') ?></td>
                    <td><?= number_format($rem['transport'], 0, ',', '.') ?></td>
                    <td><?= number_format($rem['t_jab'], 0, ',', '.') ?></td>
                    <td><?= number_format($rem['t_stt'], 0, ',', '.') ?></td>
                    <td><?= number_format($rem['t_ank'], 0, ',', '.') ?></td>
                    <td><?= number_format($rem['t_prg'], 0, ',', '.') ?></td>
                    <td><?= number_format($t_lain, 0, ',', '.') ?></td>
                    <td><?= number_format($rem['p_rmh'], 0, ',', '.') ?></td>
                    <td><?= number_format($p_lain, 0, ',', '.') ?></td>
                    <td><?= number_format($total, 0, ',', '.') ?></td>
                    <?php $grand += $total; ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th class="text-center" colspan="17">TOTAL</th>
                <th class="text-right"><?= number_format($grand, 0, ',', '.') ?></th>
            </tr>
        </table>
        <br>
        <div class="row mt-4">
            <div class="col-8"></div>
            <div class="col-4 text-center">
                <strong>Tasikmalaya, <?= date('j M Y') ?></strong>
            </div>
            <div class="col-4 text-center">
                <strong>Ketua Yayasan</strong>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <strong>HRD Remunerasi</strong>
            </div>
            <br>
            <div class="col-4 mt-5 text-center">
                <strong>Abu Fauzana</strong>
            </div>
            <div class="col-4 mt-5"></div>
            <div class="col-4 mt-5 text-center">
                <strong>Anggraeni Devi Lestari</strong>
            </div>
        </div>
    </div>
</body>

</html>