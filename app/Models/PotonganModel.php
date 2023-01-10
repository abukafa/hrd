<?php

namespace App\Models;

use CodeIgniter\Model;

class PotonganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'potongan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nip', 'nama', 'p_srg', 'p_atr', 'p_kes', 'p_rmh', 'p_bon', 'p_htg', 'p_zkt', 'p_inf', 'p_lin', 'acc'];
}
