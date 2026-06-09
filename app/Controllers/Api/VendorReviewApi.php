<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\VendorReviewModel;

class VendorReviewApi extends BaseController
{
    public function index()
    {
        $model = new VendorReviewModel();

        $data = $model->findAll();

        return $this->response->setJSON($data);
    }
}