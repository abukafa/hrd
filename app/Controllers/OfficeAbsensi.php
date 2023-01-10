<?php

namespace App\Controllers;

use App\Models\SantriModel;
use App\Models\AbsensiModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OfficeAbsensi extends BaseController
{
    protected $santriModel;
    protected $absensiModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->absensiModel = new AbsensiModel();
    }

    public function index($bln = NULL)
    {
        // $unlist = $this->santriModel->join('absensi', 'santri.nip=absensi.nip', 'LEFT')
        //     ->select('santri.id')->select('santri.nip')->select('santri.nama')->select('santri.laznah')
        //     ->where('santri.status_santri <> ', 'Suspend')->where('absensi.nip', NULL)->findAll();

        $db = \Config\Database::connect();
        $unlist = $db->query("SELECT santri.id, santri.nip, santri.nama, santri.laznah FROM santri LEFT JOIN absensi ON santri.nip=absensi.nip AND absensi.bulan='$bln' WHERE santri.status_santri<>'Suspend' AND absensi.nip is null")->getResultArray();

        $distLaznah = $this->santriModel->distinct('laznah')->select('laznah')->orderby('laznah')->findAll();
        $absensi = ($bln == NULL) ? $this->absensiModel->findAll() : $this->absensiModel->where('absensi.bulan', $bln)->findAll();

        $data = [
            'santri' => $unlist,
            'laznah' => $distLaznah,
            'absensi' => $absensi,
            'bulan' => $bln
        ];
        // dd($data);
        return view('office/absensi', $data);
    }

    public function ceklis($id)
    {
        if ($this->request->isAJAX()) {
            $absensi =  $this->absensiModel->find($id);

            if ($absensi['acc']) {
                $this->absensiModel->set('acc', false);
                $acc = false;
            } else {
                $this->absensiModel->set('acc', true);
                $acc = true;
            }

            $this->absensiModel->where('id', $id);
            $this->absensiModel->update();

            echo json_encode($acc);
        } else {
            exit('Maaf Tidak dapat diproses');
        }
    }

    public function santri($id)
    {
        $data = ['santri' => $this->santriModel->find($id)];
        echo json_encode($data);
    }

    public function data($id)
    {
        $data = ['absensi' => $this->absensiModel->find($id)];
        echo json_encode($data);
    }

    public function insert()
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'bulan' => $this->request->getVar('bulan'),
            'hari' => $this->request->getVar('hari'),
            'sakit' => $this->request->getVar('sakit'),
            'ijin' => $this->request->getVar('ijin'),
            'alpa' => $this->request->getVar('alpa'),
            'hadir' => $this->request->getVar('hadir'),
            'p_hadir' => $this->request->getVar('p_hadir'),
            'lambat' => $this->request->getVar('lambat'),
            'p_lambat' => $this->request->getVar('p_lambat'),
            'lembur' => $this->request->getVar('lembur'),
            'p_lembur' => $this->request->getVar('p_lembur'),
            'total' => $this->request->getVar('total')
        ];
        $this->absensiModel->insert($data);
        flash('Berhasil', 'Menambah Data Absensi..');
        return redirect()->to('/absensi/' . $this->request->getVar('bulan'));
    }

    public function update($id)
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'bulan' => $this->request->getVar('bulan'),
            'hari' => $this->request->getVar('hari'),
            'sakit' => $this->request->getVar('sakit'),
            'ijin' => $this->request->getVar('ijin'),
            'alpa' => $this->request->getVar('alpa'),
            'hadir' => $this->request->getVar('hadir'),
            'p_hadir' => $this->request->getVar('p_hadir'),
            'lambat' => $this->request->getVar('lambat'),
            'p_lambat' => $this->request->getVar('p_lambat'),
            'lembur' => $this->request->getVar('lembur'),
            'p_lembur' => $this->request->getVar('p_lembur'),
            'total' => $this->request->getVar('total'),
            'acc' => false
        ];
        $this->absensiModel->update($id, $data);
        flash('Berhasil', 'Mengubah Data Absensi..');
        return redirect()->to('/absensi/' . $this->request->getVar('bulan'));
    }

    public function delete($id, $bln)
    {
        $this->absensiModel->delete($id);
        flash('Berhasil', 'Menghapus Data Absensi..');
        return redirect()->to('/absensi/' . $bln);
    }

    public function export()
    {
        $absensi = $this->absensiModel->where('bulan', date('M-Y'))->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIP');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Bulan');
        $sheet->setCellValue('E1', 'Hari');
        $sheet->setCellValue('F1', 'Sakit');
        $sheet->setCellValue('G1', 'Izin');
        $sheet->setCellValue('H1', 'Alpa');
        $sheet->setCellValue('I1', 'Hadir');
        $sheet->setCellValue('J1', 'P.Hadir');
        $sheet->setCellValue('K1', 'Terlambat');
        $sheet->setCellValue('L1', 'P.Terlambat');
        $sheet->setCellValue('M1', 'Lembur');
        $sheet->setCellValue('N1', 'P.Lembur');
        $sheet->setCellValue('O1', 'Total');
        $col = 2;
        foreach ($absensi as $abs) {
            $sheet->setCellValue('A' . $col, ($col - 1));
            $sheet->setCellValue('B' . $col, $abs['nip']);
            $sheet->setCellValue('C' . $col, $abs['nama']);
            $sheet->setCellValue('D' . $col, $abs['bulan']);
            $sheet->setCellValue('E' . $col, $abs['hari']);
            $sheet->setCellValue('F' . $col, $abs['sakit']);
            $sheet->setCellValue('G' . $col, $abs['ijin']);
            $sheet->setCellValue('H' . $col, $abs['alpa']);
            $sheet->setCellValue('I' . $col, $abs['hadir']);
            $sheet->setCellValue('J' . $col, $abs['p_hadir']);
            $sheet->setCellValue('K' . $col, $abs['lambat']);
            $sheet->setCellValue('L' . $col, $abs['p_lambat']);
            $sheet->setCellValue('M' . $col, $abs['lembur']);
            $sheet->setCellValue('N' . $col, $abs['p_lembur']);
            $sheet->setCellValue('O' . $col, $abs['total']);
            $col++;
        }

        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
        $sheet->getStyle('A1:O1')->getFill()
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
        $sheet->getStyle('A1:O' . ($col - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=absensi.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function import()
    {
        $file = $this->request->getFile('file');
        $ext = $file->getClientExtension();
        if ($ext == 'xls' || $ext == 'xlsx') {
            if ($ext == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $absensi = $spreadsheet->getActiveSheet()->toArray();
            foreach ($absensi as $key => $abs) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'nip' => $abs[1],
                    'nama' => $abs[2],
                    'bulan' => $abs[3],
                    'hari' => $abs[4],
                    'sakit' => $abs[5],
                    'ijin' => $abs[6],
                    'alpa' => $abs[7],
                    'hadir' => $abs[8],
                    'p_hadir' => $abs[9],
                    'lambat' => $abs[10],
                    'p_lambat' => $abs[11],
                    'lembur' => $abs[12],
                    'p_lembur' => $abs[13],
                    'total' => $abs[14],
                ];
                $this->absensiModel->insert($data);
            }
            // dd($absensi[1][3]);
            flash('Berhasil', 'Import Data Absensi..', 'success');
            return redirect()->to('/absensi/' . $absensi[1][3]);
        } else {
            flash('Gagal', 'File tidak diketahui..', 'warning');
            return redirect()->to('/absensi/' . date('M-Y', strtotime('-1 month')));
        }
    }
}
