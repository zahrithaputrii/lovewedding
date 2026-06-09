<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'id';
    
    protected $useSoftDeletes = true;
    protected $deletedField   = 'deleted_at';

    protected $allowedFields = [
        'user_id', 'vendor_id', 'layanan_id', 'tanggal_pernikahan', 
        'waktu_konsultasi', 'jumlah_tamu', 'total_harga', 'status', 
        'bukti_pembayaran', 'metode_pembayaran', 'pesan',
        'nama_client', 'email_client', 'whatsapp_client', 'deleted_at'
    ];

    public function getAllWithRelations()
    {
        return $this->select('booking.*, vendor.nama AS vendor_nama, users.username AS user_akun')
                    ->join('vendor', 'vendor.id = booking.vendor_id', 'left')
                    ->join('users', 'users.id = booking.user_id', 'left')
                    ->where('booking.deleted_at', null) 
                    ->orderBy('booking.created_at', 'DESC')
                    ->findAll();
    }

    public function getBookingPembayaran($id)
    {
        return $this->select('booking.*, vendor.nama AS vendor_nama, users.username AS user_akun')
                    ->join('vendor', 'vendor.id = booking.vendor_id', 'left')
                    ->join('users', 'users.id = booking.user_id', 'left')
                    ->where('booking.id', $id)
                    ->first();
    }
}