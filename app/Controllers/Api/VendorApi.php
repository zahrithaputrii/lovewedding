<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\VendorModel;


class VendorApi extends BaseController
{

    public function index()
    {
        $model = new VendorModel();
        $data = $model->findAll();

        foreach ($data as &$vendor) {
            // Format profile photo
            if (!empty($vendor['foto'])) {
                if (str_starts_with($vendor['foto'], 'http')) {
                    // Already absolute URL
                } else if (file_exists(FCPATH . 'uploads/' . $vendor['foto'])) {
                    $vendor['foto'] = base_url('uploads/' . $vendor['foto']);
                } else {
                    $vendor['foto'] = base_url('images/' . $vendor['foto']);
                }
            }

            // Format wedding reference photo
            if (!empty($vendor['wedding_reference_foto'])) {
                if (str_starts_with($vendor['wedding_reference_foto'], 'http')) {
                    // Already absolute URL
                } else if (file_exists(FCPATH . 'uploads/' . $vendor['wedding_reference_foto'])) {
                    $vendor['wedding_reference_foto'] = base_url('uploads/' . $vendor['wedding_reference_foto']);
                } else {
                    $vendor['wedding_reference_foto'] = base_url('images/' . $vendor['wedding_reference_foto']);
                }
            }
        }

        return $this->response->setJSON($data);
    }

}