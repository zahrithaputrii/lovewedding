<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananApi extends BaseController
{
    public function index()
    {
        $model = new LayananModel();

        $data = $model->findAll();

        return $this->response->setJSON($data);
    }
}