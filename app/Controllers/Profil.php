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
        $userId = session()->get('user_id');
        $bookingModel = new BookingModel();
        
        $data = [
            'bookings' => $bookingModel->where('user_id', $userId)->orderBy('id', 'DESC')->findAll(),
            'user'     => (new UserDetailModel())->where('user_id', $userId)->first()
        ];
        return view('profil/index', $data);
    }

    public function edit() 
    {
        $userId = session()->get('user_id');
        $userDetailModel = new UserDetailModel();
        
        $user = $userDetailModel->where('user_id', $userId)->first();

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data user tidak ditemukan");
        }

        $data = [
            'title' => 'Edit Profil',
            'user'  => $user
        ];

        return view('profil/edit', $data);
    }

    public function update()
{
    $userId = session()->get('user_id');
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

    $dataUpdate = array_filter($dataUpdate);

    if (empty($dataUpdate)) {
        return redirect()->back()->with('error', 'Tidak ada data yang diubah.');
    }

    $userDetailModel
        ->where('user_id', $userId)
        ->update(null, $dataUpdate);

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
