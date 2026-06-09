<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table      = 'paket_vendor';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['vendor_id', 'nama_paket', 'harga'];
}