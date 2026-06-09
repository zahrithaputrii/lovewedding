<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PaketModel;

class PaketApi extends BaseController
{
    public function index()
    {
        $model = new PaketModel();
        $data = $model->findAll();
        return $this->response->setJSON($data);
    }
}
