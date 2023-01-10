<?php

namespace App\Models;

use CodeIgniter\Model;

class TunjanganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tunjangan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nip', 'nama', 't_jab', 't_stt', 't_ank', 't_rmh', 't_prg', 't_srg', 't_atr', 't_kes', 't_hra', 't_haj', 't_dka', 't_bns', 't_spc', 't_eks', 'acc'];
}
