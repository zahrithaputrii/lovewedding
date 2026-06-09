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

        $fileRefFotos = $this->request->getFileMultiple('wedding_reference_foto');
        $refFotoNames = [];

        if ($fileRefFotos) {
            foreach ($fileRefFotos as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $namaRefFoto = $file->getRandomName();
                    $file->move('uploads/reference/', $namaRefFoto);
                    $refFotoNames[] = $namaRefFoto;
                }
            }
        }
        $namaRefFotoString = !empty($refFotoNames) ? implode(',', $refFotoNames) : null;

        $fileTrendFoto = $this->request->getFile('trend_foto');
        $namaTrendFoto = null;

        if ($fileTrendFoto && $fileTrendFoto->isValid() && !$fileTrendFoto->hasMoved()) {
            $namaTrendFoto = $fileTrendFoto->getRandomName();
            $fileTrendFoto->move('uploads/trend/', $namaTrendFoto);
        }

        $this->vendor->insert([
            'nama'                          => $this->request->getPost('nama'),
            'foto'                          => $namaFoto,
            'kategori'                      => $this->request->getPost('kategori'),
            'harga'                         => $this->request->getPost('harga'),
            'rating'                        => $this->request->getPost('rating') ? floatval($this->request->getPost('rating')) : 0.0,
            'lokasi'                        => $this->request->getPost('lokasi'),
            'no_telepon'                    => $this->request->getPost('no_telepon'),
            'deskripsi'                     => $this->request->getPost('deskripsi'),
            'pengalaman'                    => $this->request->getPost('pengalaman'),
            'layanan'                       => $this->request->getPost('layanan'),
            'alasan'                        => $this->request->getPost('alasan'),
            'catatan'                       => $this->request->getPost('catatan'),
            'is_trend'                      => $this->request->getPost('is_trend') ? 1 : 0,
            'is_wedding_reference'          => $this->request->getPost('is_wedding_reference') ? 1 : 0,
            'wedding_reference_title'       => $this->request->getPost('wedding_reference_title'),
            'wedding_reference_foto'        => $namaRefFotoString,
            'wedding_reference_description' => $this->request->getPost('wedding_reference_description'),
            'trend_foto'                    => $namaTrendFoto,
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

        $fileRefFotos = $this->request->getFileMultiple('wedding_reference_foto');
        $namaRefFotoString = $vendorLama['wedding_reference_foto'];

        $uploadedRefFotos = [];
        if ($fileRefFotos) {
            foreach ($fileRefFotos as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $namaRefFoto = $file->getRandomName();
                    $file->move('uploads/reference/', $namaRefFoto);
                    $uploadedRefFotos[] = $namaRefFoto;
                }
            }
        }

        if (!empty($uploadedRefFotos)) {
            $namaRefFotoString = implode(',', $uploadedRefFotos);

            // Delete old files
            if (!empty($vendorLama['wedding_reference_foto'])) {
                $oldImages = explode(',', $vendorLama['wedding_reference_foto']);
                foreach ($oldImages as $oldImg) {
                    $oldImg = trim($oldImg);
                    if (!empty($oldImg) && file_exists('uploads/reference/' . $oldImg)) {
                        unlink('uploads/reference/' . $oldImg);
                    }
                }
            }
        }

        $fileTrendFoto = $this->request->getFile('trend_foto');
        $namaTrendFoto = $vendorLama['trend_foto'];

        if ($fileTrendFoto && $fileTrendFoto->isValid() && !$fileTrendFoto->hasMoved()) {
            $namaTrendFoto = $fileTrendFoto->getRandomName();
            $fileTrendFoto->move('uploads/trend/', $namaTrendFoto);

            if ($vendorLama['trend_foto'] && file_exists('uploads/trend/' . $vendorLama['trend_foto'])) {
                unlink('uploads/trend/' . $vendorLama['trend_foto']);
            }
        }

        $this->vendor->update($id, [
            'nama'                          => $this->request->getPost('nama'),
            'foto'                          => $namaFoto,
            'kategori'                      => $this->request->getPost('kategori'),
            'harga'                         => $this->request->getPost('harga'),
            'rating'                        => $this->request->getPost('rating') ? floatval($this->request->getPost('rating')) : 0.0,
            'lokasi'                        => $this->request->getPost('lokasi'),
            'no_telepon'                    => $this->request->getPost('no_telepon'),
            'deskripsi'                     => $this->request->getPost('deskripsi'),
            'pengalaman'                    => $this->request->getPost('pengalaman'),
            'layanan'                       => $this->request->getPost('layanan'),
            'alasan'                        => $this->request->getPost('alasan'),
            'catatan'                       => $this->request->getPost('catatan'),
            'is_trend'                      => $this->request->getPost('is_trend') ? 1 : 0,
            'is_wedding_reference'          => $this->request->getPost('is_wedding_reference') ? 1 : 0,
            'wedding_reference_title'       => $this->request->getPost('wedding_reference_title'),
            'wedding_reference_foto'        => $namaRefFotoString,
            'wedding_reference_description' => $this->request->getPost('wedding_reference_description'),
            'trend_foto'                    => $namaTrendFoto,
        ]);

        return redirect()->to('/admin/vendor')->with('success', 'Vendor berhasil diperbarui');
    }

    public function delete($id)
    {
        $vendor = $this->vendor->find($id);

        if ($vendor['foto'] && file_exists('uploads/' . $vendor['foto'])) {
            unlink('uploads/' . $vendor['foto']);
        }

        if ($vendor['wedding_reference_foto']) {
            $oldImages = explode(',', $vendor['wedding_reference_foto']);
            foreach ($oldImages as $oldImg) {
                $oldImg = trim($oldImg);
                if (!empty($oldImg) && file_exists('uploads/reference/' . $oldImg)) {
                    unlink('uploads/reference/' . $oldImg);
                }
            }
        }

        if ($vendor['trend_foto'] && file_exists('uploads/trend/' . $vendor['trend_foto'])) {
            unlink('uploads/trend/' . $vendor['trend_foto']);
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