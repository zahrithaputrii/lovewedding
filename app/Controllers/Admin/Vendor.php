<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VendorModel;

class Vendor extends BaseController
{
    protected $vendor;

    public function __construct()
    {
        $this->vendor = new VendorModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title'   => 'Data Vendor',
            'vendors' => $this->vendor->findAll()
        ];
        return view('admin/vendor', $data);
    }

    public function create()
    {
        return view('admin/vendor_forms');
    }

    public function store()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
        }

        $fileRefFoto = $this->request->getFile('wedding_reference_foto');
        $namaRefFoto = null;

        if ($fileRefFoto && $fileRefFoto->isValid() && !$fileRefFoto->hasMoved()) {
            $namaRefFoto = $fileRefFoto->getRandomName();
            $fileRefFoto->move('uploads/', $namaRefFoto);
        }

        $this->vendor->insert([
            'nama'                    => $this->request->getPost('nama'),
            'foto'                    => $namaFoto,
            'kategori'                => $this->request->getPost('kategori'),
            'harga'                   => $this->request->getPost('harga'),
            'lokasi'                  => $this->request->getPost('lokasi'),
            'no_telepon'              => $this->request->getPost('no_telepon'),
            'deskripsi'               => $this->request->getPost('deskripsi'),
            'pengalaman'              => $this->request->getPost('pengalaman'),
            'layanan'                 => $this->request->getPost('layanan'),
            'alasan'                  => $this->request->getPost('alasan'),
            'catatan'                 => $this->request->getPost('catatan'),
            'is_trend'                => $this->request->getPost('is_trend') ? 1 : 0,
            'is_wedding_reference'    => $this->request->getPost('is_wedding_reference') ? 1 : 0,
            'wedding_reference_title' => $this->request->getPost('wedding_reference_title'),
            'wedding_reference_foto'  => $namaRefFoto,
        ]);

        return redirect()->to('/admin/vendor')->with('success', 'Vendor & Foto berhasil ditambahkan');
    }

    public function edit($id)
    {
        $vendor = $this->vendor->find($id);
        if (!$vendor) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Vendor tidak ditemukan");
        }
        return view('admin/vendor_forms', ['vendor' => $vendor]);
    }

    public function update($id)
    {
        $vendorLama = $this->vendor->find($id);
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $vendorLama['foto']; 

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);

            if ($vendorLama['foto'] && file_exists('uploads/' . $vendorLama['foto'])) {
                unlink('uploads/' . $vendorLama['foto']);
            }
        }

        $fileRefFoto = $this->request->getFile('wedding_reference_foto');
        $namaRefFoto = $vendorLama['wedding_reference_foto'];

        if ($fileRefFoto && $fileRefFoto->isValid() && !$fileRefFoto->hasMoved()) {
            $namaRefFoto = $fileRefFoto->getRandomName();
            $fileRefFoto->move('uploads/', $namaRefFoto);

            if ($vendorLama['wedding_reference_foto'] && file_exists('uploads/' . $vendorLama['wedding_reference_foto'])) {
                unlink('uploads/' . $vendorLama['wedding_reference_foto']);
            }
        }

        $this->vendor->update($id, [
            'nama'                    => $this->request->getPost('nama'),
            'foto'                    => $namaFoto,
            'kategori'                => $this->request->getPost('kategori'),
            'harga'                   => $this->request->getPost('harga'),
            'lokasi'                  => $this->request->getPost('lokasi'),
            'no_telepon'              => $this->request->getPost('no_telepon'),
            'deskripsi'               => $this->request->getPost('deskripsi'),
            'pengalaman'              => $this->request->getPost('pengalaman'),
            'layanan'                 => $this->request->getPost('layanan'),
            'alasan'                  => $this->request->getPost('alasan'),
            'catatan'                 => $this->request->getPost('catatan'),
            'is_trend'                => $this->request->getPost('is_trend') ? 1 : 0,
            'is_wedding_reference'    => $this->request->getPost('is_wedding_reference') ? 1 : 0,
            'wedding_reference_title' => $this->request->getPost('wedding_reference_title'),
            'wedding_reference_foto'  => $namaRefFoto,
        ]);

        return redirect()->to('/admin/vendor')->with('success', 'Vendor berhasil diperbarui');
    }

    public function delete($id)
    {
        $vendor = $this->vendor->find($id);

        if ($vendor['foto'] && file_exists('uploads/' . $vendor['foto'])) {
            unlink('uploads/' . $vendor['foto']);
        }

        if ($vendor['wedding_reference_foto'] && file_exists('uploads/' . $vendor['wedding_reference_foto'])) {
            unlink('uploads/' . $vendor['wedding_reference_foto']);
        }

        $this->vendor->delete($id);
        return redirect()->to('/admin/vendor')->with('success', 'Vendor & File Foto berhasil dihapus');
    }

    public function show($id)
    {
        $vendor = $this->vendor->find($id);
        if (!$vendor) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Vendor tidak ditemukan");
        }

        $data = [
            'title'  => 'Detail Vendor',
            'vendor' => $vendor,
            'isDetail' => true 
        ];

        return view('admin/vendor_forms', $data); 
    }
}