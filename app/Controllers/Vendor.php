<?php

namespace App\Controllers;

use App\Models\VendorModel;
use App\Models\PaketModel;

class Vendor extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new VendorModel();
        helper(['form']);
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');

        if ($keyword) {
            $this->model
                ->like('nama', $keyword)
                ->orLike('kategori', $keyword)
                ->orLike('lokasi', $keyword);
        }

        $vendor = $this->model->findAll();

        return view('vendor/index', [
            'vendor' => $vendor,
            'keyword' => $keyword
        ]);
    }

    public function detail($id)
    {
        $vendor = $this->model->find($id);

        if (!$vendor) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Vendor tidak ditemukan");
        }

$deskripsiKategori = [
    'Dekorasi' => 'Kami menyediakan layanan dekorasi modern dan elegan untuk berbagai konsep pernikahan, mulai dari tradisional hingga internasional.',
    'Catering' => 'Layanan catering dengan cita rasa premium, higienis, dan berbagai pilihan menu untuk acara pernikahan kecil maupun besar.',
    'Make Up' => 'Make up artist profesional yang berpengalaman dalam rias pengantin, photoshoot, dan seluruh rangkaian acara pernikahan.',
    'Photography' => 'Tim fotografer berpengalaman yang siap mengabadikan momen terbaik pernikahan Anda dengan kualitas premium.',
    'Videography' => 'Kami menawarkan pembuatan video cinematic wedding dengan hasil elegan dan berkualitas tinggi.',
    'Musik' => 'Penyedia sound system dan lighting berstandar event profesional, cocok untuk acara indoor maupun outdoor.',
    'Wedding Organizer' => 'Tim WO profesional yang siap membantu merencanakan dan menjalankan seluruh rangkaian acara pernikahan Anda.',
    'Full Wedding Organizer' => 'Layanan perencanaan dan pengelolaan pernikahan secara menyeluruh, mulai dari konsep acara, pemilihan vendor, penyusunan anggaran, hingga koordinasi penuh pada hari pelaksanaan.',
    'Half Wedding Organizer' => 'Layanan wedding organizer yang membantu sebagian proses persiapan pernikahan, seperti koordinasi vendor tertentu dan pendampingan teknis, sesuai kebutuhan calon pengantin.',
    'Wedding Day Organizer' => 'Layanan khusus pengelolaan dan koordinasi acara pernikahan pada hari-H, memastikan seluruh rangkaian acara berjalan sesuai jadwal tanpa terlibat dalam proses perencanaan awal.'
];


if (empty($vendor['deskripsi'])) {
    $kategori = $vendor['kategori'] ?? '';

    if (isset($deskripsiKategori[$kategori])) {
        $vendor['deskripsi'] = $deskripsiKategori[$kategori];
    } else {
        $vendor['deskripsi'] = "Vendor ini menyediakan layanan profesional dan terpercaya untuk kebutuhan acara pernikahan Anda.";
    }
}

        $paketModel = new PaketModel();
        $pakets = $paketModel->where('vendor_id', $id)->findAll();

        return view('vendor/detail', [
            'vendor' => $vendor,
            'pakets' => $pakets
        ]);
    }
}
