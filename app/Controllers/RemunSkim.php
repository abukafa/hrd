<?php

namespace App\Controllers;

use App\Models\SkimModel;
use App\Controllers\BaseController;
use App\Models\UserModel;

class RemunSkim extends BaseController
{
    protected $skimModel;
    protected $userModel;

    public function __construct()
    {
        $this->skimModel = new SkimModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'skim' => $this->skimModel->findAll(),
            'user' => $this->userModel->where('uname', session()->get('uname'))->first()
        ];
        return view('remun/skim', $data);
    }

    public function ceklis($id)
    {
        if ($this->request->isAJAX()) {
            $skim =  $this->skimModel->find($id);

            if ($skim['acc']) {
                $this->skimModel->set('acc', false);
                $acc = false;
            } else {
                $this->skimModel->set('acc', true);
                $acc = true;
            }

            $this->skimModel->where('id', $id);
            $this->skimModel->update();

            echo json_encode($acc);
        } else {
            exit('Maaf Tidak dapat diproses');
        }
    }

    public function data($id)
    {
        $data = ['skim' => $this->skimModel->find($id)];
        echo json_encode($data);
    }

    public function insert()
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'golongan' => $this->request->getVar('golongan'),
            'sub_golongan' => $this->request->getVar('sub_golongan'),
            'honor' => $this->request->getVar('honor'),
            'makan' => $this->request->getVar('makan'),
            'transport' => $this->request->getVar('transport'),
            't_jab' => $this->request->getVar('t_jab'),
            't_stt' => $this->request->getVar('t_stt'),
            't_ank' => $this->request->getVar('t_ank'),
            't_prg' => $this->request->getVar('t_prg'),
            't_kes' => $this->request->getVar('t_kes')
        ];
        $this->skimModel->insert($data);
        flash('Berhasil', 'Menambah DataSkim..');
        return redirect()->to('/skim');
    }

    public function update($id)
    {
        $data = [
            'golongan' => $this->request->getVar('golongan'),
            'sub_golongan' => $this->request->getVar('sub_golongan'),
            'honor' => $this->request->getVar('honor'),
            'makan' => $this->request->getVar('makan'),
            'transport' => $this->request->getVar('transport'),
            't_jab' => $this->request->getVar('t_jab'),
            't_stt' => $this->request->getVar('t_stt'),
            't_ank' => $this->request->getVar('t_ank'),
            't_prg' => $this->request->getVar('t_prg'),
            't_kes' => $this->request->getVar('t_kes'),
            'acc' => false
        ];
        $this->skimModel->update($id, $data);
        flash('Berhasil', 'Mengubah Data Skim..');
        return redirect()->to('/skim');
    }

    public function delete($id)
    {
        $this->skimModel->delete($id);
        flash('Berhasil', 'Menghapus Data Skim..');
        return redirect()->to('/skim');
    }
}
