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

return $this->response->setJSON($data);

}

}