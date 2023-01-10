<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SantriModel;
use App\Models\UserModel;

class OfficeUser extends BaseController
{
    protected $santriModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->userModel = new UserModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $unlist = $this->santriModel->join('user', 'santri.nip = user.uname', 'LEFT')
            ->select('santri.id')
            ->select('santri.nip')
            ->select('santri.nama')
            ->select('santri.laznah')->where('santri.status_santri <> ', 'Suspend', 'user.uname', NULL)->findAll();
        $distLaznah = $this->santriModel->distinct('laznah')->select('laznah')->orderby('laznah')->findAll();

        $data = [
            'tables' => $this->db->listTables(),
            'santri' => $unlist,
            'laznah' => $distLaznah,
            'user' => $this->userModel->findAll()
        ];
        return view('office/user', $data);
    }

    public function data($id)
    {
        $data = ['user' => $this->userModel->find($id)];
        echo json_encode($data);
    }

    public function insert()
    {
        $data = [
            'uname' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash('gemilang', PASSWORD_DEFAULT),
            'admin' => $this->request->getVar('admin'),
            'akses' => $this->request->getVar('akses'),
        ];
        $this->userModel->insert($data);
        flash('Berhasil', 'Menambah Data user..');
        return redirect()->to('/users');
    }

    public function update($id)
    {
        $data = [
            'uname' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'admin' => $this->request->getVar('admin'),
            'akses' => $this->request->getVar('akses'),
        ];
        $this->userModel->update($id, $data);
        flash('Berhasil', 'Mengubah Data user..');
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        flash('Berhasil', 'Menghapus Data user..');
        return redirect()->to('/users');
    }

    public function pass()
    {
        $uname = session()->get('uname');
        $lama = $this->request->getVar('lama');
        $baru = $this->request->getVar('baru');

        $cek = $this->userModel->where('uname', $uname)->first();
        if (!$cek) {
            flash('Gagal', 'Data tidak ditemukan..', 'warning');
        } else {
            if (password_verify($lama, $cek['password'])) {
                $baruHash = password_hash($baru, PASSWORD_DEFAULT);
                if ($lama == $baru) {
                    flash('Gagal', 'Masukan Password yang lain..', 'warning');
                } else {
                    flash('Berhasil', 'Password diubah..');
                    $this->userModel->update($cek['id'], ['password' => $baruHash]);
                }
            } else {
                flash('Gagal', 'Password salah.. Coba lagi ya..', 'warning');
            }
        }

        return redirect()->to('/users?pass');
    }

    public function collumns($tab)
    {
        $query = $this->db->query('SHOW COLUMNS FROM ' . $tab)->getResult();
        echo json_encode($query);
    }

    public function userSql()
    {
        $query = $this->request->getVar('query');
        $this->db->query($query);
        $effected = $this->db->affectedRows();
        if ($effected > 0) {
            flash('Berhasil', 'Query dijalankan dengan ' . $effected . ' data');
        } else {
            flash('Gagal', 'Query tidak bisa dijalankan..', 'warning');
        }
        return redirect()->to('/users');
    }
}
