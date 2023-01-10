<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'absensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama', 'bulan', 'hari', 'sakit', 'ijin', 'alpa', 'hadir', 'p_hadir', 'lambat', 'p_lambat', 'lembur', 'p_lembur', 'total', 'total', 'acc'];
}
