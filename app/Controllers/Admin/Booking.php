<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;

class Booking extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['booking'] = $this->bookingModel->select('booking.*, vendor.nama AS vendor_nama')
                ->join('vendor', 'vendor.id = booking.vendor_id', 'left')
                ->groupStart()
                    ->like('booking.nama_client', $keyword)
                    ->orLike('booking.id', $keyword)
                ->groupEnd()
                ->where('booking.deleted_at', null)
                ->findAll();
        } else {
            $data['booking'] = $this->bookingModel->getAllWithRelations();
        }

        $data['keyword'] = $keyword;
        return view('admin/booking/index', $data);
    }

    public function detail($id)
    {
        $booking = $this->bookingModel->getBookingPembayaran($id);
        if (!$booking) return redirect()->to('admin/booking')->with('error', 'Data tidak ditemukan.');

        $data['b'] = $booking;
        return view('admin/booking/detail', $data);
    }

    public function delete($id)
    {
        $this->bookingModel->delete($id);
        return redirect()->to('admin/booking')->with('success', 'Data berhasil dihapus dari sistem.');
    }

    public function updateStatus($id)
    {
        $statusbaru = $this->request->getPost('status');
        $this->bookingModel->update($id, ['status' => $statusbaru]);
        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
}