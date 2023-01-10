<?php

namespace App\Models;

use CodeIgniter\Model;

class SkimModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'skim';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'golongan', 'sub_golongan', 'honor', 'makan', 'transport', 't_jab', 't_stt', 't_ank', 't_prg', 't_kes', 'acc'];
}
