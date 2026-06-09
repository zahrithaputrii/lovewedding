<?php

namespace App\Controllers;

use App\Models\VendorModel;
use App\Models\BookingModel;
use App\Models\LayananModel;

class Booking extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        helper(['form', 'url']);
    }

    public function form($vendor_id)
    {
        $vendorModel  = new VendorModel();
        $layananModel = new LayananModel();
        $vendor = $vendorModel->find($vendor_id);

        if (!$vendor) {
            return redirect()->to('/vendor')->with('error', 'Vendor tidak ditemukan');
        }

        return view('booking/index', [
            'vendor'   => $vendor,
            'vendors'  => $vendorModel->findAll(),
            'layanans' => $layananModel->findAll()
        ]);
    }

    public function konfirmasi()
    {
        $data = $this->request->getPost();
        $vendorModel = new VendorModel();
        $data['vendor'] = $vendorModel->find($data['vendor_id']);
        $data['harga_dasar'] = $data['vendor']['harga'];

        return view('booking/konfirmasi', $data);
    }

    public function create()
    {
        $this->bookingModel->insert([
            'user_id'            => session()->get('user_id'),
            'vendor_id'          => $this->request->getPost('vendor_id'),
            'layanan_id'         => $this->request->getPost('layanan_id'),
            'nama_client'        => $this->request->getPost('nama_client'), 
            'email_client'       => $this->request->getPost('email_client'),
            'whatsapp_client'    => $this->request->getPost('whatsapp_client'),
            'tanggal_pernikahan' => $this->request->getPost('tanggal_pernikahan'),
            'waktu_konsultasi'   => $this->request->getPost('waktu_konsultasi'),
            'jumlah_tamu'        => $this->request->getPost('jumlah_tamu'),
            'total_harga'        => $this->request->getPost('total_harga'),
            'pesan'              => $this->request->getPost('pesan'),
            'status'             => 'pending'
        ]);

        $id = $this->bookingModel->getInsertID();
        return redirect()->to(base_url('booking/pembayaran/' . $id));
    }

    public function pembayaran($id)
    {
        $booking = $this->bookingModel->find($id);
        if (!$booking) {
            return redirect()->to('/')->with('error', 'Data booking tidak ditemukan');
        }
        return view('booking/pembayaran', ['booking' => $booking]);
    }

    public function proses_pembayaran()
    {
        $bookingId = $this->request->getPost('booking_id');
        $metode    = $this->request->getPost('metode');
        $file      = $this->request->getFile('bukti_pembayaran');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'Pilih file bukti pembayaran yang valid.');
        }

        $namaFile = $file->getRandomName();
        $file->move('uploads/pembayaran', $namaFile);

        $this->bookingModel->update($bookingId, [
            'metode_pembayaran' => $metode,
            'bukti_pembayaran'  => $namaFile,
            'status'            => 'pending' 
        ]);

        return redirect()->to('/profil')->with('success', 'Bukti berhasil diupload!');
    }
}