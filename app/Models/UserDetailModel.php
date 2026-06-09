<?php

namespace App\Models;
use CodeIgniter\Model;

class UserDetailModel extends Model
{
    protected $table            = 'user_detail';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'user_id',
        'nama_lengkap', 
        'email',
        'nama_pasangan',
        'no_telepon',
        'lokasi',
        'tanggal_pernikahan',
        'foto' 
    ];

    protected $useTimestamps = true;
}