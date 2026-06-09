<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserDetailModel;

class UserDetailApi extends BaseController
{
    public function index()
    {
        $model = new UserDetailModel();

        $data = $model->findAll();

        return $this->response->setJSON($data);
    }
}