<?php

namespace App\Models;

use CodeIgniter\Model;

class RemunModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'remun';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama', 'bulan', 'honor', 'makan', 'transport', 't_jab', 't_stt', 't_ank', 't_rmh', 't_prg', 't_srg', 't_atr', 't_kes', 't_hra', 't_haj', 't_dka', 't_bns', 't_spc', 't_eks', 'p_srg', 'p_atr', 'p_kes', 'p_rmh', 'p_bon', 'p_htg', 'p_zkt', 'p_inf', 'p_lin', 'acc'];
}
