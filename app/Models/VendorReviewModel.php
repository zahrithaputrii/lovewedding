<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorReviewModel extends Model
{
    protected $table      = 'vendor_review';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'vendor_id',
        'nama_user',
        'rating',
        'komentar',
        'created_at'
    ];

    protected $useTimestamps = false;
}
