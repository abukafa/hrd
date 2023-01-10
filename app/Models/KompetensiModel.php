<?php

namespace App\Models;

use CodeIgniter\Model;

class KompetensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kompetensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no', 'nip', 'nama', 'jenis', 'bentuk', 'keterangan', 'lokasi', 'tahun'];
}
