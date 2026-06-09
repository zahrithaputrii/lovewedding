<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\VendorGalleryModel;

class VendorGalleryApi extends BaseController
{
    public function index()
    {
        $model = new VendorGalleryModel();

        $data = $model->findAll();

        return $this->response->setJSON($data);
    }
}