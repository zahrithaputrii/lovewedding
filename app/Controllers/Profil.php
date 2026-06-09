<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\UserDetailModel;

class Profil extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index() 
    {
        $userId = session()->get('user_id') ?? session()->get('id');
        $bookingModel = new BookingModel();
        
        $user = (new UserDetailModel())->where('user_id', $userId)->first();
        if (!$user) {
            $user = [];
        }
        $user['nama_lengkap'] = !empty($user['nama_lengkap']) ? $user['nama_lengkap'] : session()->get('username');
        $user['email']        = !empty($user['email']) ? $user['email'] : session()->get('email');

        $data = [
            'bookings' => $bookingModel->select('booking.*, vendor.nama AS vendor_nama')
                                       ->join('vendor', 'vendor.id = booking.vendor_id', 'left')
                                       ->where('booking.user_id', $userId)
                                       ->orderBy('booking.id', 'DESC')
                                       ->findAll(),
            'user'     => $user
        ];
        return view('profil/index', $data);
    }

    public function edit() 
    {
        $userId = session()->get('user_id') ?? session()->get('id');
        $userDetailModel = new UserDetailModel();
        
        $user = $userDetailModel->where('user_id', $userId)->first();

        if (!$user) {
            // Jika user detail belum ada di database, kita buat data kosong sementara untuk form
            $user = [
                'user_id'            => $userId,
                'nama_lengkap'       => session()->get('username'),
                'email'              => session()->get('email'),
                'nama_pasangan'      => '',
                'no_telepon'         => '',
                'lokasi'             => '',
                'tanggal_pernikahan' => '',
                'foto'               => ''
            ];
        } else {
            $user['nama_lengkap'] = !empty($user['nama_lengkap']) ? $user['nama_lengkap'] : session()->get('username');
            $user['email']        = !empty($user['email']) ? $user['email'] : session()->get('email');
        }

        $data = [
            'title' => 'Edit Profil',
            'user'  => $user
        ];

        return view('profil/edit', $data);
    }

    public function update()
{
        $userId = session()->get('user_id') ?? session()->get('id');
    $userDetailModel = new UserDetailModel();

    $dataUpdate = [
        'nama_lengkap'       => $this->request->getPost('nama_lengkap'),
        'email'              => $this->request->getPost('email'),
        'nama_pasangan'      => $this->request->getPost('nama_pasangan'),
        'no_telepon'         => $this->request->getPost('no_telepon'),
        'lokasi'             => $this->request->getPost('lokasi'),
        'tanggal_pernikahan' => $this->request->getPost('tanggal_pernikahan'),
    ];

    $foto = $this->request->getFile('foto');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads', $namaFoto);
        $dataUpdate['foto'] = $namaFoto;
    }

        // Filter nilai yang null atau empty string
        $dataUpdate = array_filter($dataUpdate, function($val) {
            return $val !== null && $val !== '';
        });

    if (empty($dataUpdate)) {
        return redirect()->back()->with('error', 'Tidak ada data yang diubah.');
    }

        $existing = $userDetailModel->where('user_id', $userId)->first();
        
        if ($existing) {
            $userDetailModel->where('user_id', $userId)->set($dataUpdate)->update();
        } else {
            $dataUpdate['user_id'] = $userId;
            $userDetailModel->insert($dataUpdate);
        }

    return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui!');
}

    public function detail_booking($id) 
    {
        $bookingModel = new BookingModel();
        $booking = $bookingModel->getBookingPembayaran($id);

        if (!$booking || $booking['user_id'] != session()->get('user_id')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('profil/detail_booking', ['booking' => $booking]);
    }
}
