<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layanan;

    public function __construct()
    {
        $this->layanan = new LayananModel();
        helper(['form']);
    }

    public function index()
    {
        return view('admin/layanan', [
            'layanan' => $this->layanan->findAll()
        ]);
    }

    public function create()
    {
        return view('admin/layanan_form');
    }

    public function store()
    {
        $rules = [
            'nama'      => 'required',
            'awalan'    => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('gambar');
        $namaFile = $file->getRandomName();
        $file->move('uploads/layanan', $namaFile);

        $this->layanan->insert([
            'nama'      => $this->request->getPost('nama'),
            'awalan'    => $this->request->getPost('awalan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga'     => $this->request->getPost('harga'),
            'gambar'    => $namaFile
        ]);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/layanan_form', [
            'layanan' => $this->layanan->find($id)
        ]);
    }

    public function update($id)
    {
        $lama = $this->layanan->find($id);

        $rules = [
            'nama'      => 'required',
            'awalan'    => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'if_exist|is_image[gambar]|max_size[gambar,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('gambar');
        $namaFile = $lama['gambar'];

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/layanan', $namaFile);

            if ($lama['gambar'] && file_exists('uploads/layanan/' . $lama['gambar'])) {
                unlink('uploads/layanan/' . $lama['gambar']);
            }
        }

        $this->layanan->update($id, [
            'nama'      => $this->request->getPost('nama'),
            'awalan'    => $this->request->getPost('awalan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga'     => $this->request->getPost('harga'),
            'gambar'    => $namaFile
        ]);


        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil diperbarui');
    }

    public function delete($id)
    {
        $layanan = $this->layanan->find($id);

        if ($layanan && $layanan['gambar'] && file_exists('uploads/layanan/'.$layanan['gambar'])) {
            unlink('uploads/layanan/'.$layanan['gambar']);
        }

        $this->layanan->delete($id);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil dihapus');
    }
}
