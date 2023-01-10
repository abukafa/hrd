<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'santri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'no_absen', 'ktp', 'gender', 'nama', 'panggilan', 'tmp_lahir', 'tgl_lahir', 'gol_darah', 'status', 'pasangan', 'jml_istri', 'jml_anak', 'pendidikan', 'alamat', 'kec', 'kab', 'kodepos', 'asal', 'handphone', 'email', 'thn_gabung', 'laznah', 'status_rda', 'grade', 'golongan', 'sub_golongan', 'jabatan', 'status_santri', 't_jab', 't_stt', 't_ank', 't_rmh', 't_prg', 't_srg', 't_atr', 't_kes', 't_hra', 't_haj', 't_dka', 't_bns', 't_spc', 't_eks', 'acc'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function search($keyword)
    {
        return $this->table('santri')->like('nip', $keyword)->orLike('nama', $keyword);
    }
}
