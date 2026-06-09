<?php
namespace App\Models;
use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendor';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_vendor', 'kategori', 'harga', 'lokasi', 'no_telepon',
        'deskripsi', 'pengalaman', 'layanan', 'alasan', 'catatan'
    ];
}
