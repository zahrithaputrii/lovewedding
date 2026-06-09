<?php
namespace App\Models;
use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'vendor';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'layanan_id', 'nama', 'slug', 'kategori', 'harga', 'rating', 'jumlah_review',
        'lokasi', 'no_telepon', 'foto', 'deskripsi', 'pengalaman', 'layanan', 'alasan', 
        'catatan', 'is_trend', 'is_wedding_reference', 'wedding_reference_title', 'wedding_reference_foto'
    ];
}
