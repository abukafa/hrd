<?php

// FUNGSI UPLOAD FOTO =======================================================================================================================================
function uploaded($fileName = '', $dir = '', $default = '')
{
    if ($fileName <> '' && $fileName <> NULL && file_exists(FCPATH . $dir . '/' . $fileName)) {
        return base_url($dir . '/' . $fileName);
    } else {
        if ($default == '') {
            return base_url('assets/images/default/pic.png');
        } else {
            return base_url($dir . '/' . $default);
        }
    }
}

// FUNGSI GENERATE NIP =======================================================================================================================================
function generate_nip()
{
    $db = \Config\Database::connect();
    $thn = date('Y');

    $num = $db->query("SELECT MAX(SUBSTR(nip,1,3)) as max from santri where SUBSTR(nip,8,4)='$thn'");
    foreach ($num->getResultArray() as $row) {
        if ($row['max'] > 0) {
            $no = $row['max'];
        } else {
            $no = 0;
        }
        $no = sprintf('%03d', $no + 1);
        $auto = $no . "." . date('m') . "." . $thn;
    }
    return $auto;
}

// FUNGSI PESAN FLASH =======================================================================================================================================
function flash($pesan, $ket, $tipe = 'success')
{
    session()->setFlashdata('pesan', $pesan);
    session()->setFlashdata('ket', $ket);
    session()->setFlashdata('tipe', $tipe);
}

function sa_success()
{
    if (session()->getFlashdata('pesan')) {
        echo
        "<script>
            swal({
                    title: '" . session()->getFlashdata('pesan') . "',
                    text: '" . session()->getFlashdata('ket') . "',
                    type: '" . session()->getFlashdata('tipe')  . "'
                });
        </script>";
    }
}
