<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layanan;

    public function __construct()
    {
        $this->layanan = new LayananModel();
    }

    public function index()
    {
        return view('layanan/index', [
            'layanans' => $this->layanan->findAll()
        ]);
    }
 public function detail($id)
{
    $layananModel = new \App\Models\LayananModel();
    

    $data['layanan'] = $layananModel->find($id);

    if (!$data['layanan']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Layanan tidak ditemukan.");
    }

    $data['vendors'] = []; 

    return view('layanan/detail', $data);
}
}
