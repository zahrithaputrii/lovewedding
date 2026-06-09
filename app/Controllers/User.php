<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserDetailModel; 

class User extends BaseController
{
    protected $userModel;
    protected $userDetailModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userDetailModel = new UserDetailModel(); 
        helper(['form', 'url']);
    }

    public function index()
    {
        if (!session('logged_in')) {
            return redirect()->to('/login');
        }
        return view('user/dashboard');
    }

    public function profile()
    {
        if (!session('logged_in')) return redirect()->to('/login');

        $userId = session()->get('id');
        
        $data['user_detail'] = $this->userDetailModel->where('user_id', $userId)->first();

        return view('user/profile', $data);
    }

    public function updateProfile()
    {
        if (!session('logged_in')) return redirect()->to('/login');

        $userId = session()->get('id');

        $profile = $this->userDetailModel->where('user_id', $userId)->first();
        
        $dataUpdate = [
            'nama_lengkap' => $this->request->getPost('nama'),
            'no_telepon'   => $this->request->getPost('no_telepon'),
            'lokasi'       => $this->request->getPost('lokasi'),
        ];

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
        }

        $isSame = true;
        foreach ($dataUpdate as $key => $value) {
            if ($value != ($profile[$key] ?? null)) {
                $isSame = false;
                break;
            }
        }

        if ($isSame && !isset($dataUpdate['foto'])) {
            return redirect()->to('/profil')->with('info', 'Tidak ada data yang diubah.');
        }

        try {
            if ($profile) {
                $this->userDetailModel->update($profile['id'], $dataUpdate);
            } else {

                $dataUpdate['user_id'] = $userId;
                $this->userDetailModel->insert($dataUpdate);
            }
            
            session()->set('nama', $dataUpdate['nama_lengkap']);
            
            return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui!');
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            return redirect()->to('/profil')->with('info', 'Data sudah sesuai dengan database.');
        }
    }
}