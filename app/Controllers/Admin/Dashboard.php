<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\VendorModel;
use App\Models\BookingModel;
use App\Models\LayananModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $booking  = new BookingModel();
        $vendor   = new VendorModel();
        $layanan  = new LayananModel();
        $user     = new UserModel();

        $totalBooking  = $booking->countAll();
        $pending       = $booking->where('status', 'pending')->countAllResults();
        $confirmed     = $booking->where('status', 'confirmed')->countAllResults();
        $totalVendor   = $vendor->countAll();
        $totalLayanan  = $layanan->countAll();
        $totalUser     = $user->countAll();

        $saldoResult = $booking
            ->selectSum('total_harga')
            ->where('status', 'confirmed')
            ->first();
        $saldoMasuk = $saldoResult['total_harga'] ?? 0;

        $chartSaldo = $booking
            ->select("MONTH(created_at) as bulan, SUM(total_harga) as total")
            ->where('status', 'confirmed')
            ->groupBy("MONTH(created_at)")
            ->orderBy("bulan", "ASC")
            ->findAll();

        $chartBooking = $booking
            ->select("MONTH(created_at) as bulan, COUNT(id) as total")
            ->groupBy("MONTH(created_at)")
            ->orderBy("bulan", "ASC")
            ->findAll();

        return view('admin/dashboard', [
            'totalBooking' => $totalBooking,
            'pending'      => $pending,
            'confirmed'    => $confirmed,
            'totalVendor'  => $totalVendor,
            'totalLayanan' => $totalLayanan,
            'totalUser'    => $totalUser,
            'saldoMasuk'   => $saldoMasuk,
            'chartSaldo'   => $chartSaldo,
            'chartBooking' => $chartBooking
        ]);
    }
}