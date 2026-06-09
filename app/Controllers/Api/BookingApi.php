<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\BookingaModel;

class BookingApi extends BaseController
{
    public function index()
    {
        $model = new BookingModel();

        $data = $model->findAll();

        return $this->response->setJSON($data);
    }
}