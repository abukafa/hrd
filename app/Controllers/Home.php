<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\SantriModel;
use App\Models\PotonganModel;
use App\Models\TunjanganModel;
use App\Models\KompetensiModel;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('uname')) {
            $santriModel = new SantriModel();
            $kompetensiModel = new KompetensiModel();
            $absensiModel = new AbsensiModel();
            $tunjanganModel = new TunjanganModel();
            $potonganModel = new PotonganModel();

            $data = [
                'santri' => $santriModel->where('status_santri <> ', 'Suspend')->findAll(),
                'absensi' => $absensiModel->where('bulan', date('M-Y', strtotime('-1 month')))->join('santri', 'santri.nip = absensi.nip', 'LEFT')->select('santri.laznah')->select('absensi.*')->findAll(),
                'kompetensi' => $kompetensiModel->findAll(),
                'kompetensiCount' => $kompetensiModel->select('DISTINCT LEFT(tahun,4) as tahun, COUNT(LEFT(tahun,4)) as count')->groupBy('LEFT(tahun,4)')->findAll(),
                'kompetensiJenis' => $kompetensiModel->distinct('jenis')->select('jenis, COUNT(jenis) as count')->groupBy('jenis')->findAll(),
                'jumlahSantri' => $santriModel->where('status_santri <> ', 'Suspend')->countAllResults(),
                'jumlahAbsensi' => $absensiModel->countAllResults(),
                'jumlahTunjangan' => $tunjanganModel->countAllResults(),
                'jumlahPotongan' => $potonganModel->countAllResults(),
                'accSantri' => $santriModel->where('status_santri <> ', 'Suspend', 'acc', true)->countAllResults(),
                'accAbsensi' => $absensiModel->where('acc', true)->countAllResults(),
                'accTunjangan' => $tunjanganModel->where('acc', true)->countAllResults(),
                'accPotongan' => $potonganModel->where('acc', true)->countAllResults(),
                'laznah' => $santriModel->join('absensi', 'santri.nip = absensi.nip', 'LEFT')->select('laznah, COUNT(laznah) as count, COALESCE(SUM(hadir),0) as hadir, COALESCE(SUM(sakit),0) as sakit, COALESCE(SUM(ijin),0) as ijin, COALESCE(SUM(alpa),0) as alpa')->where('status_santri <> ', 'Suspend')->groupBy('laznah')->findAll()
            ];
            // dd($data);
            return view('office/beranda', $data);
        } else {
            return view('office/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function login()
    {
        $userModel = new UserModel();
        $uname = $this->request->getPost('uname');
        $pass = $this->request->getPost('pass');
        $user = $userModel->where('uname', $uname)->first();
        if ($user) {
            if (password_verify($pass, $user['password'])) {
                session()->set('uname', $uname);
            } else {
                session()->setFlashdata('error', 'Password salah.. Coba lagi yah..');
            }
        } else {
            session()->setFlashdata('error', 'Anda belum Terdaftar..');
        }
        return redirect()->to('/');
    }
}
