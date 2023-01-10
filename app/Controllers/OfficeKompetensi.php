<?php

namespace App\Controllers;

use App\Models\SantriModel;
use App\Models\KompetensiModel;

class OfficeKompetensi extends BaseController
{
    protected $santriModel;
    protected $kompetensiModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->kompetensiModel = new KompetensiModel();
    }

    public function index()
    {
        $data = [
            'santri' => $this->santriModel->where('status_santri <> ', 'Suspend')->findAll(),
            'laznah' => $this->santriModel->query('SELECT DISTINCT laznah FROM santri ORDER BY laznah')->getResultArray(),
            'kompetensi' => $this->kompetensiModel->findAll()
        ];
        // dd($data);
        return view('office/kompetensi', $data);
    }

    public function santri($id)
    {
        $data = ['santri' => $this->santriModel->find($id)];
        echo json_encode($data);
    }

    public function data($id)
    {
        $data = ['kompetensi' => $this->kompetensiModel->find($id)];
        echo json_encode($data);
    }

    public function insert()
    {
        $data = [
            'no' => $this->request->getVar('no'),
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'bentuk' => $this->request->getVar('bentuk'),
            'keterangan' => $this->request->getVar('keterangan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'tahun' => $this->request->getVar('tahun')
        ];
        $this->kompetensiModel->insert($data);
        flash('Berhasil', 'Menambah Data Kompetensi..');
        return redirect()->to('/kompetensi');
    }

    public function update($id)
    {
        $data = [
            'no' => $this->request->getVar('no'),
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'bentuk' => $this->request->getVar('bentuk'),
            'keterangan' => $this->request->getVar('keterangan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'tahun' => $this->request->getVar('tahun')
        ];
        $this->kompetensiModel->update($id, $data);
        flash('Berhasil', 'Mengubah Data Kompetensi..');
        return redirect()->to('/kompetensi');
    }

    public function delete($id)
    {
        $this->kompetensiModel->delete($id);
        flash('Berhasil', 'Menghapus Data Kompetensi..');
        return redirect()->to('/kompetensi');
    }
}
