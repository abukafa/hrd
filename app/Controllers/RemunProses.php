<?php

namespace App\Controllers;

use App\Models\SkimModel;
use App\Models\PotonganModel;
use App\Models\TunjanganModel;
use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\RemunModel;
use App\Models\SantriModel;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RemunProses extends BaseController
{
    protected $santriModel;
    protected $absensiModel;
    protected $skimModel;
    protected $tunjanganModel;
    protected $potonganModel;
    protected $remunModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->absensiModel = new AbsensiModel();
        $this->skimModel = new SkimModel();
        $this->tunjanganModel = new TunjanganModel();
        $this->potonganModel = new PotonganModel();
        $this->remunModel = new RemunModel();
    }

    public function loyal($lama)
    {
        switch ($lama) {
            case 1:
                $loy = 0.5;
                break;
            case 2:
                $loy = 0.6;
                break;
            case 3:
                $loy = 0.8;
                break;
            case 4:
                $loy = 1.0;
                break;
            case 5:
                $loy = 1.1;
                break;
            case 6:
                $loy = 1.3;
                break;
            case 7:
                $loy = 1.5;
                break;
            case 8:
                $loy = 1.7;
                break;
            case 9:
                $loy = 1.9;
                break;
            case 10:
                $loy = 2.0;
                break;
            default:
                $loy = 2.1;
                break;
        }
        return $loy;
    }

    public function index($bln)
    {
        $santri = $this->santriModel->where('status_santri <> ', 'Suspend')->asArray()->findAll();
        foreach ($santri as $s) {
            $nip = $s['nip'];
            $grade = $s['grade'];
            $lama = date('Y') - $s['thn_gabung'];
            $loy = $this->loyal($lama);
            $skim = $this->skimModel->find($grade);
            $absensi = $this->absensiModel->where('nip', $nip, 'bulan', $bln)->first();
            if ($absensi) {
                $honor = ($s['status_santri'] == 'Aktif' && $s['status_rda'] == 'Khidmat' && $loy >= 1) ? $skim['honor'] : 0;
                $makan = ($s['status_santri'] == 'Aktif' && $lama >= 1) ? $skim['makan'] : $skim['makan'] * $absensi['total'];
                $transport = ($s['status_santri'] == 'Aktif' && $lama >= 1) ? $skim['transport'] : $skim['transport'] * $absensi['total'];
            } else {
                $honor = 0;
                $makan = 0;
                $transport = 0;
            }
            $tunj = $this->tunjanganModel->where('nip', $nip)->first();
            $pot = $this->potonganModel->where('nip', $nip)->first();
            $tunjangan = (!$tunj) ? 0 : $tunj['t_jab'] + $tunj['t_stt'] + $tunj['t_ank'] + $tunj['t_rmh'] + $tunj['t_prg'] + $tunj['t_srg'] + $tunj['t_atr'] + $tunj['t_kes'] + $tunj['t_hra'] + $tunj['t_haj'] + $tunj['t_dka'] + $tunj['t_bns'] + $tunj['t_spc'] + $tunj['t_eks'];
            $potongan = (!$pot) ? 0 : $pot['p_srg'] + $pot['p_atr'] + $pot['p_kes'] + $pot['p_rmh'] + $pot['p_bon'] + $pot['p_htg'] + $pot['p_inf'] + $pot['p_lin'];
            $total = $honor + $makan + $transport + $tunjangan - $potongan;
            $zakat = (!$pot) ? 0 : (($pot['p_zkt'] == 0) ? $total * 0.025 : $pot['p_zkt']);
            $remun = $this->remunModel->where('nip', $nip, 'bulan', $bln)->first();
            $dataTotal = (!$remun) ? 0 : $remun['honor'] + $remun['makan'] + $remun['transport'] + ($remun['t_jab'] + $remun['t_stt'] + $remun['t_ank'] + $remun['t_rmh'] + $remun['t_prg'] + $remun['t_srg'] + $remun['t_atr'] + $remun['t_kes'] + $remun['t_hra'] + $remun['t_haj'] + $remun['t_dka'] + $remun['t_bns'] + $remun['t_spc'] + $remun['t_eks']) - ($remun['p_srg'] + $remun['p_atr'] + $remun['p_kes'] + $remun['p_rmh'] + $remun['p_bon'] + $remun['p_htg'] + $remun['p_zkt'] + $remun['p_inf'] + $remun['p_lin']);
            $selisih = (!$remun) ? 0 : ($total - $zakat) - $dataTotal;
            $data['remun'][] =
                [
                    'nip' => $nip,
                    'nama' => $s['nama'],
                    'laznah' => $s['laznah'],
                    'status' => $s['status_santri'],
                    'rda' => $s['status_rda'],
                    'lama' => $lama,
                    'grade' => $grade,
                    'absensi' => $absensi ? $absensi['total'] : '',
                    'honor' => $honor,
                    'makan' => $makan,
                    'transport' => $transport,
                    'tunjangan' => $tunjangan,
                    'potongan' => $potongan,
                    'total' => $total,
                    'zakat' => round($zakat, 0, 0),
                    'exist' => ($remun) ? true : false,
                    'selisih' => $selisih,
                    'bulan' => $bln
                ];
            $data['ext'] =
                [
                    'data' => $this->santriModel->where('status_santri <> ', 'Suspend')->countAllResults() + $this->absensiModel->countAllResults() + $this->tunjanganModel->countAllResults() + $this->potonganModel->countAllResults(),
                    'acc' => $this->santriModel->where('status_santri <> ', 'Suspend', 'acc', true)->countAllResults() + $this->absensiModel->where('acc', true)->countAllResults() + $this->tunjanganModel->where('acc', true)->countAllResults() + $this->potonganModel->where('acc', true)->countAllResults(),
                ];
        }
        // dd($data);
        return view('remun/proses', $data);
    }

    public function simpan($nip, $bln)
    {
        $s = $this->santriModel->where('nip', $nip)->first();
        $nip = $s['nip'];
        $grade = $s['grade'];
        $lama = date('Y') - $s['thn_gabung'];
        $loy = $this->loyal($lama);
        $skim = $this->skimModel->find($grade);
        $absensi = $this->absensiModel->where('nip', $nip, 'bulan', $bln)->first();
        $remun = $this->remunModel->where('nip', $nip, 'bulan', $bln)->first();
        $honor = ($s['status_santri'] == 'Aktif' && $s['status_rda'] == 'Khidmat' && $loy >= 1) ? $skim['honor'] : 0;
        $makan = ($s['status_santri'] == 'Aktif' && $lama >= 1) ? $skim['makan'] : $skim['makan'] * $absensi['total'];
        $transport = ($s['status_santri'] == 'Aktif' && $lama >= 1) ? $skim['transport'] : $skim['transport'] * $absensi['total'];
        $tunj = $this->tunjanganModel->where('nip', $nip)->first();
        $pot = $this->potonganModel->where('nip', $nip)->first();
        $tunjangan = (!$tunj) ? 0 : $tunj['t_jab'] + $tunj['t_stt'] + $tunj['t_ank'] + $tunj['t_rmh'] + $tunj['t_prg'] + $tunj['t_srg'] + $tunj['t_atr'] + $tunj['t_kes'] + $tunj['t_hra'] + $tunj['t_haj'] + $tunj['t_dka'] + $tunj['t_bns'] + $tunj['t_spc'] + $tunj['t_eks'];
        $potongan = (!$pot) ? 0 : $pot['p_srg'] + $pot['p_atr'] + $pot['p_kes'] + $pot['p_rmh'] + $pot['p_bon'] + $pot['p_htg'] + $pot['p_zkt'] + $pot['p_inf'] + $pot['p_lin'];
        $total = $honor + $makan + $transport + $tunjangan - $potongan;
        $zakat = $total * 0.025;
        $data = [
            'nip' => $nip,
            'nama' => $s['nama'],
            'bulan' => $bln,
            'honor' => $honor,
            'makan' => $makan,
            'transport' => $transport,
            't_jab' => $tunj['t_jab'],
            't_stt' => $tunj['t_stt'],
            't_ank' => $tunj['t_ank'],
            't_rmh' => $tunj['t_rmh'],
            't_prg' => $tunj['t_prg'],
            't_srg' => $tunj['t_srg'],
            't_atr' => $tunj['t_atr'],
            't_kes' => $tunj['t_kes'],
            't_hra' => $tunj['t_hra'],
            't_haj' => $tunj['t_haj'],
            't_dka' => $tunj['t_dka'],
            't_bns' => $tunj['t_bns'],
            't_spc' => $tunj['t_spc'],
            't_eks' => $tunj['t_eks'],
            'p_srg' => $pot['p_srg'],
            'p_atr' => $pot['p_atr'],
            'p_kes' => $pot['p_kes'],
            'p_rmh' => $pot['p_rmh'],
            'p_bon' => $pot['p_bon'],
            'p_htg' => $pot['p_htg'],
            'p_zkt' => $zakat,
            'p_inf' => $pot['p_inf'],
            'p_lin' => $pot['p_lin'],
        ];

        if (!$remun) {
            $this->remunModel->insert($data);
        } else {
            $this->remunModel->update($remun['id'], $data);
        }
        echo '<button class="btn btn-success viewData" data-bln="' . $bln . '" data-nip="' . $nip . '" data-toggle="modal" data-animation="bounce" data-target=".myModalForm"><i class="mdi mdi-eye"></i></button>';
    }

    public function data($nip, $bln)
    {
        $data = $this->remunModel->where('nip', $nip, 'bulan', $bln)->first();
        echo json_encode($data);
    }

    public function reset()
    {
        $data = [];
        return view('remun/reset', $data);
    }

    public function export()
    {
        $remun = $this->remunModel->where('bulan', date('M-Y'))->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'DRAFT REMUNERASI');
        $sheet->setCellValue('A2', date('M-Y'));

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'NIP');
        $sheet->setCellValue('C4', 'Nama');
        $sheet->setCellValue('D4', 'Bulan');
        $sheet->setCellValue('E4', 'Honor');
        $sheet->setCellValue('F4', 'Makan');
        $sheet->setCellValue('G4', 'Transport');
        $sheet->setCellValue('H4', 'T.jab');
        $sheet->setCellValue('I4', 'T.stt');
        $sheet->setCellValue('J4', 'T.ank');
        $sheet->setCellValue('K4', 'T.rmh');
        $sheet->setCellValue('L4', 'T.prg');
        $sheet->setCellValue('M4', 'T.srg');
        $sheet->setCellValue('N4', 'T.atr');
        $sheet->setCellValue('O4', 'T.kes');
        $sheet->setCellValue('P4', 'T.hra');
        $sheet->setCellValue('Q4', 'T.haj');
        $sheet->setCellValue('R4', 'T.dka');
        $sheet->setCellValue('S4', 'T.bns');
        $sheet->setCellValue('T4', 'T.spc');
        $sheet->setCellValue('U4', 'T.eks');
        $sheet->setCellValue('V4', 'P.srg');
        $sheet->setCellValue('W4', 'P.atr');
        $sheet->setCellValue('X4', 'P.kes');
        $sheet->setCellValue('Y4', 'P.rmh');
        $sheet->setCellValue('Z4', 'P.bon');
        $sheet->setCellValue('AA4', 'P.htg');
        $sheet->setCellValue('AB4', 'P.zkt');
        $sheet->setCellValue('AC4', 'P.inf');
        $sheet->setCellValue('AD4', 'P.lin');
        $col = 5;
        foreach ($remun as $rem) {
            $sheet->setCellValue('A' . $col, ($col - 4));
            $sheet->setCellValue('B' . $col, $rem['nip']);
            $sheet->setCellValue('C' . $col, $rem['nama']);
            $sheet->setCellValue('D' . $col, $rem['bulan']);
            $sheet->setCellValue('E' . $col, $rem['honor']);
            $sheet->setCellValue('F' . $col, $rem['makan']);
            $sheet->setCellValue('G' . $col, $rem['transport']);
            $sheet->setCellValue('H' . $col, $rem['t_jab']);
            $sheet->setCellValue('I' . $col, $rem['t_stt']);
            $sheet->setCellValue('J' . $col, $rem['t_ank']);
            $sheet->setCellValue('K' . $col, $rem['t_rmh']);
            $sheet->setCellValue('L' . $col, $rem['t_prg']);
            $sheet->setCellValue('M' . $col, $rem['t_srg']);
            $sheet->setCellValue('N' . $col, $rem['t_atr']);
            $sheet->setCellValue('O' . $col, $rem['t_kes']);
            $sheet->setCellValue('P' . $col, $rem['t_hra']);
            $sheet->setCellValue('Q' . $col, $rem['t_haj']);
            $sheet->setCellValue('R' . $col, $rem['t_dka']);
            $sheet->setCellValue('S' . $col, $rem['t_bns']);
            $sheet->setCellValue('T' . $col, $rem['t_spc']);
            $sheet->setCellValue('U' . $col, $rem['t_eks']);
            $sheet->setCellValue('V' . $col, $rem['p_srg']);
            $sheet->setCellValue('W' . $col, $rem['p_atr']);
            $sheet->setCellValue('X' . $col, $rem['p_kes']);
            $sheet->setCellValue('Y' . $col, $rem['p_rmh']);
            $sheet->setCellValue('Z' . $col, $rem['p_bon']);
            $sheet->setCellValue('AA' . $col, $rem['p_htg']);
            $sheet->setCellValue('AB' . $col, $rem['p_zkt']);
            $sheet->setCellValue('AC' . $col, $rem['p_inf']);
            $sheet->setCellValue('AD' . $col, $rem['p_lin']);
            $col++;
        }

        $sheet->getStyle('A1:AD4')->getFont()->setBold(true);
        $sheet->getStyle('A4:AD4')->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb', 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A4:AD' . ($col - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Draft-Remunerasi.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function draft()
    {
        return view('report/remun_draft');
    }
}
