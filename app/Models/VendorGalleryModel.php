<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorGalleryModel extends Model
{
    protected $table      = 'vendor_gallery';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'vendor_id',
        'foto',
        'caption',
        'created_at'
    ];

    protected $useTimestamps = false;
}
